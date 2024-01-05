<?php
//load config file
require_once 'config/config.php';
require_once 'helpers/session_helper.php';

//autoload library

spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';

});

?>