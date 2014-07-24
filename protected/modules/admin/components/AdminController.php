<?php

//namespace AdminController;

class AdminController extends Controller {
    
    /**
     * 
     * This method send message
     * 
     * @param string $to to email address
     * @param string $from from email address
     * @param string $subject subject message 
     * @param string $message text message
     * @throws Exception
     */
    
    public $layout = '';
    
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        $this->layout = 'application.modules.admin.views.layouts.main';
    }
    
    private function mailsend($to, $from, $subject, $message) {
        $mail = Yii::app()->Smtpmail;
        $mail->SetFrom($from, 'From NAme');
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($to, "");
        if (!$mail->Send()) {
            throw new Exception();
        }
    }
    
    /**
     * Return email users how have role menager
     * 
     * 
     * @return array
     */
    public function getManagerEmail() {

        $role = Role::model()->find('role=:role', array(":role" => "menager"));
        $userrole = Userrole::model()->findAll('role_id=:id_role', array(":id_role" => $role->id));
        $menager = array();
        for ($i = 0; $i < count($userrole); $i++) {
            $menager[] = Apiusers::model()->findByPk($userrole[$i]->id_user)->email;
        }
        return $menager;
    }

    
    /**
     * Method send message all menagers
     *  
     * @param string $from email
     * @param string $subject message
     * @param string $message text message
     * @return boolean
     */
    public function sendMessageManager($from, $subject, $message) {

        $toEmail = $this->getManagerEmail();
        try {
            for ($i = 0; $i < count($toEmail); $i++) {
                $this->mailsend($toEmail[$i], $from, $subject, $message);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    
    /**
     * return email user for set id this user
     * 
     * @param integer $id id user
     * @return string email users 
     */
    public function getUserEmail($id) {
        return Apiusers::model()->findByPk($id)->email;
    }

    /**
     * Retirn name user for get ID
     * @param integer $id user ID
     * @return string user name
     */
    public function getUserName($id) {
        return Apiusers::model()->findByPk($id)->username;
    }

}
