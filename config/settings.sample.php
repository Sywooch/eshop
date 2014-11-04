<?php 
/*
|--------------------------------------------------------------------------
| Debug Mode
|--------------------------------------------------------------------------
|
| A Yii application can run in either debug or production mode, as determined by the value of the constant
| YII_DEBUG. By default, this constant value is defined as false, meaning production mode. To run in debug
| mode, define this constant as true before including the yii.php file. Running the application in debug mode
| is less efficient because it keeps many internal logs. On the other hand, debug mode is also more helpful 
| during the development stage because it provides richer debugging information when an error occurs. 
| 
| Remove or comment out the following line when in production mode
|
*/
defined('YII_DEBUG') or define('YII_DEBUG', true);

/*
|--------------------------------------------------------------------------
| Path to Yii Framework yii.php
|--------------------------------------------------------------------------
|
| From root directory of the entire file system hierarchy!
|
*/
define('FRAMEWORK_PATH', '/path/to/yii/framework/yii.php');
