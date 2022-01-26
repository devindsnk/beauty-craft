<?php

// Loading config
require_once 'config/config.php';

// Loading helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/Session_helper.php';
require_once 'helpers/data_validation_helper.php';
require_once 'helpers/sms_helper.php';
require_once 'helpers/dateTimeExtended_helper.php';
require_once 'helpers/toast_helper.php';
require_once 'helpers/systemLog_helper.php';

spl_autoload_register(function ($className)
{
   require_once 'core/' . $className . '.php';
});


// require_once 'core/Application.php';
// require_once 'core/Controller.php';
// require_once 'core/Database.php';
