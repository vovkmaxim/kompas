<?php

/**
 * Maintenance mode for Yii framework.
 * @author Karagodin Evgeniy (ekaragodin@gmail.com)
 * v 1.0
 */
class MaintenanceMode extends CComponent
{

    public $enabledMode = FALSE;
    public $capUrl = 'maintenance/index';
    public $message = "Sorry, site maintenance work.";
    public $users = array('admin',);
    public $roles = array('Administrator',);
    public $ips = array(); //allowed IP
    public $urls = array();
    public $authrizate = FALSE;

    public function init()
    {
        if ($this->enabledMode) {
            if (Yii::app()->user->isGuest)
                $this->message .= " <a href='/auth/ajaxlogin.html'>login</a>";
            else
                $this->message .= " <a href='/auth/logout.html'>logout</a>";
            $disable = $this->authrizate && Yii::app()->user->isGuest;
//            echo '<pre>';
//            var_dump("authorizate-" . $disable);
            if (count($this->users) > 0) {
                $disable = $disable || !in_array(Yii::app()->user->name, $this->users);
//                var_dump("user-" . $disable);
            }
            foreach ($this->roles as $role) {
                $disable = $disable || !Yii::app()->user->checkAccess($role);
            }
//            var_dump("roles-" . $disable);
            if (count($this->urls) > 0) {
                $disable = $disable && !in_array(Yii::app()->request->getPathInfo(), $this->urls);
//                var_dump("url-" . $disable);
            }
            if (count($this->ips) > 0) {
                $disable = $disable && !in_array($this->getIp(), $this->ips); //check "allowed IP"
//                var_dump("ip-" . $disable);
            }
            if ($disable) {
                if ($this->capUrl === 'maintenance/index') {
                    Yii::app()->controllerMap['maintenance'] = 'application.extensions.maintenanceMode.MaintenanceController';
                }

                Yii::app()->catchAllRequest = array($this->capUrl);
            }
        }
    }

    //get user IP
    protected function getIp()
    {
        $strRemoteIP = $_SERVER['REMOTE_ADDR'];
        if (!$strRemoteIP) {
            $strRemoteIP = urldecode(getenv('HTTP_CLIENTIP'));
        }
        if (getenv('HTTP_X_FORWARDED_FOR')) {
            $strIP = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $strIP = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $strIP = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $strIP = getenv('HTTP_FORWARDED');
        } else {
            $strIP = $_SERVER['REMOTE_ADDR'];
        }

        if ($strRemoteIP != $strIP) {
            $strIP = $strRemoteIP . ", " . $strIP;
        }
        return $strIP;
    }

}
