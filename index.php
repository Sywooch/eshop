<?php
ob_start();
require_once 'chunks/head.php';
require_once 'chunks/menu.php';
ob_end_flush();

if(is_file("views/{$route}.php")) {
	require_once "views/{$route}.php";
} elseif($route == '') {
	require_once 'views/index.php';
}
else {
	throw new CHttpException(404, 'Страница не найдена');
}

require_once 'chunks/footer.php';
