<?php

// Loading config
require_once 'config/config.php';

// Loading helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/sms_sender.php';

spl_autoload_register(function ($className)
{
   require_once 'core/' . $className . '.php';
});


// require_once 'core/Application.php';
// require_once 'core/Controller.php';
// require_once 'core/Database.php';
