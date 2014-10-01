<?php 
require_once 'settings.php';
require_once FRAMEWORK_PATH;
Yii::createWebApplication('config.php');
require_once 'snippets/helper.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo CHtml::encode(Yii::app()->name) . (isset($title) ? CHtml::encode(' | ' . $title) : '') ?></title>
		<meta name="description" content="<?php echo CHtml::encode(isset($description) ? $description : Yii::app()->name) ?>">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		<!-- Bootstrap -->
		<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="bootstrap/vendor/js/jquery.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="bootstrap/vendor/js/html5shiv.js"></script>
			<script src="bootstrap/vendor/js/respond.min.js"></script>
		<![endif]-->
		<link href="css/default.min.css" rel="stylesheet">
		<script type="text/javascript" src="colorbox/jquery.colorbox-min.js"></script>
		<script type="text/javascript" src="colorbox/i18n/jquery.colorbox-ru.js"></script>
		<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css" media="screen" />
		<link rel="stylesheet" href="blueimp/css/blueimp-gallery.min.css">
		<link rel="stylesheet" href="blueimp-bootstrap/css/bootstrap-image-gallery.min.css">
		<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
		<script type="text/javascript" src="/js/ya-share.min.js"></script>
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?113"></script>
		<script type="text/javascript">
		  VK.init({apiId: <?php echo Yii::app()->params['VK.init.apiId']; ?>, onlyWidgets: true});
		</script>
	</head>
		<body>
		