    <?php
if (!defined('APP_ROOT')) define('APP_ROOT', dirname(dirname(__DIR__)));

return array(
    'application' => array(
        'environment'    => \Vegas\Constants::DEV_ENV,
        'serviceDir'   =>  APP_ROOT . '/app/services/',
        'configDir'     => dirname(__FILE__) . DIRECTORY_SEPARATOR,
        'libraryDir'     => dirname(APP_ROOT) . DIRECTORY_SEPARATOR,
        'pluginDir'      => APP_ROOT . '/app/plugins/',
        'moduleDir'      => APP_ROOT . '/app/modules/',
        'baseUri'        => '/',
        'language'       => 'nl_NL',
        'view'  => array(
            'cacheDir'  =>  APP_ROOT . '/cache/',
            'layout'    =>  'main.volt',
            'layoutsDir'    =>  APP_ROOT . '/app/layouts'
        )
    ),

    'auth'  =>  array(
        'authUser'  =>  array(
            'route'    =>  'login'
        ),
        'authAdmin' =>  array(
            'route' =>  'admin_login'
        )
    ),

    'mongo' => array(
        'db' => 'vegas_test',
    ),

    'session' => array(
        'cookie_name'   =>  'sid',
        'cookie_lifetime'   =>  36*3600, //day and a half
        'cookie_secure' => 0,
        'cookie_httponly' => 1
    ),

    'plugins' => array(
        'security' => array(
            'class' => 'SecurityPlugin',
            'attach' => 'dispatch'
        )
    )
);