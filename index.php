<?php
ob_start();
require_once 'chunks/head.php';
require_once 'chunks/menu.php';

if(is_file("views/{$route}.php")) {
	require_once "views/{$route}.php";
} elseif($route == '') {
	require_once 'views/index.php';
}
else {
	throw new \yii\web\HttpException(404, 'Страница не найдена');
}

require_once 'chunks/footer.php';
