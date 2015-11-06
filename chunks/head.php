<?php 
require_once 'config/init.php';
use yii\helpers\EshopHelper;
use yii\helpers\Html;
$hash = EshopHelper::getHashForSql();
/* $route = Yii::$app->getUrlManager()->parseUrl(Yii::$app->getRequest());
if(isset(Yii::$app->params['pages'][$route])) {
	$title = Yii::$app->params['pages'][$route];
} */
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= Html::encode(Yii::$app->name) . (isset($title) ? Html::encode(' | ' . $title) : '') ?></title>
		<meta name="description" content="<?= Html::encode(isset(Yii::$app->params['description']) ? Yii::$app->params['description'] : Yii::$app->name) ?>">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		<!-- Bootstrap -->
		<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="vendors/bootstrap/vendor/js/jquery.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="vendors/bootstrap/vendor/js/html5shiv.js"></script>
			<script src="vendors/bootstrap/vendor/js/respond.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="vendors/blueimp-gallery/css/blueimp-gallery.min.css">
		<link rel="stylesheet" href="vendors/blueimp-bootstrap-image-gallery/css/bootstrap-image-gallery.min.css">
		<link href="css/output.min.css" rel="stylesheet">
		<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?113"></script>
		<script type="text/javascript">
		VK.init({apiId: <?= Yii::$app->params['VK.init.apiId'] ?>, onlyWidgets: true});
		</script>
		<script type="text/javascript">
			var eshop = {"order": "<?= EshopHelper::createUrl('order') ?>"};
		</script>
	</head>
		<body>
		