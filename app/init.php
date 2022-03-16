<?php

// Loading config
require_once 'config/config.php';

// Loading helpers
require_once 'helpers/URL_helper.php';
require_once 'helpers/Session_helper.php';
require_once 'helpers/DataValidation_helper.php';
require_once 'helpers/SMS_helper.php';
require_once 'helpers/DateTimeExtended_helper.php';
require_once 'helpers/Toast_helper.php';
require_once 'helpers/SystemLog_helper.php';

spl_autoload_register(function ($className)
{
   require_once 'core/' . $className . '.php';
});


// require_once 'core/Application.php';
// require_once 'core/Controller.php';
// require_once 'core/Database.php';
