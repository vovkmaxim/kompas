#Http login mode for Yii framework.
#Mode closes site for guest on development period

##Install
Copy extension to your folder path/to/extensions.
Add to config/main.php:

    'preload' => array('log','httpLogin'),
    ...
    'components' => array(
                'httpLogin' => array(
                    'class' => 'application.extensions.httpLogin.HttpLogin',
                    'enabled' => TRUE,
                    'users' => array('admin' => '84aBuTag')
                ),
            ...
    ),

##Options
    'httpLogin' => array(
        'class' => 'application.extensions.httpLogin.HttpLogin',
        //enable/disable mode
        'enabled' => TRUE,
        //user list for access  (login => password)
        'users' => array(
                'user1' => 'pass1',
                'user2' => 'pass2'
            )
    ),


## if $_SERVER['PHP_AUTH_USER'] doesn't exist add this to your .htaccess
RewriteRule ^.*$ - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization},NC,L]
RewriteRule ^.*$ index.php [E=HTTP_AUTHORIZATION:%{HTTP:Authorization},NC,L]
