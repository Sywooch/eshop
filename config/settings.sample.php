<?php 
// specifies whether the application is running in debug mode. When in debug mode, an application will keep more log information, and will reveal detailed error call stacks if exceptions are thrown. For this reason, debug mode should be used mainly during development. The default value of YII_DEBUG is false
defined('YII_DEBUG') or define('YII_DEBUG', true);

// specifies which environment the application is running in. This will be described in more detail in the Configurations section. The default value of YII_ENV is 'prod', meaning the application is running in production environment
defined('YII_ENV') or define('YII_ENV', 'dev');

// path to Yii Framework from root directory of the entire file system hierarchy!
define('FRAMEWORK_PATH', '/path/to/yiisoft/yii2/Yii.php');
