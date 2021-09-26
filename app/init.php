<?php
require_once 'config/config.php';

spl_autoload_register(function ($className) {
   require_once 'core/' . $className . '.php';
});


// require_once 'core/Application.php';
// require_once 'core/Controller.php';
// require_once 'core/Database.php';
