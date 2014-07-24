<?php

class WebUser extends CWebUser {

    private $_model = null;

    public function getRole() {

        if (!Yii::app()->user->isGuest) {
            $user = User::model()->findByPk($this->id);
            $userrole = Userrole::model()->find('user_id=:id_user', array(":id_user" => $this->id));
            $role = Role::model()->find('id=:id_role', array(":id_role" => $userrole->role_id));

            return $role->role;
        } else {
            if ($user = $this->getModel()) {
                // в таблице User есть поле role
                return $user;
            }
        }
    }

    private function getModel() {
        if (!$this->isGuest && $this->_model === null) {

            $user = User::model()->findByPk($this->id);
            $userrole = Userrole::model()->find('user_id=:id_user', array(":id_user" => $this->id));
            if (!empty($userrole)) {
                $role = Role::model()->find('id=:id_role', array(":id_role" => $userrole->id_role));
//                $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
                $this->_model = $userrole; //$role->role;
            } else {
                $this->_model = "user";
            }
        }
        return $this->_model;
    }

}
