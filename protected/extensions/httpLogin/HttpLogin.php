<?php

class HttpLogin extends CComponent
{

    public $realm = 'Enter login and password';
    /* login => password */
    public $users = array("pass", 'login');

    public function init()
    {
//            header('HTTP/1.0 401 Unauthorized');
//            return true;
        if (isset($_SERVER['HTTP_AUTHORIZATION']) && $_SERVER['HTTP_AUTHORIZATION']) {
            $auth_params = explode(":", base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));
            $_SERVER['PHP_AUTH_USER'] = $auth_params[0];
            unset($auth_params[0]);
            $_SERVER['PHP_AUTH_PW'] = implode('', $auth_params);
        }
// maybe we have caught authentication data in $_SERVER['Authorization']

        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header('WWW-Authenticate: Basic realm="' . $this->realm . '"');
            header('HTTP/1.0 401 Unauthorized');
            die("Authentication Failed1!");
        } elseif (!isset($this->users[$_SERVER['PHP_AUTH_USER']]) || $this->users[$_SERVER['PHP_AUTH_USER']] != $_SERVER['PHP_AUTH_PW']) {
            header('HTTP/1.0 401 Unauthorized');
            die("Authentication Failed2!");
        }
    }

}

?>
