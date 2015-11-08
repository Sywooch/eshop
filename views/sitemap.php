<?php
use yii\helpers\Html; 
use app\helpers\EshopHelper;
use app\helpers\Sitemap;
?>
<div class="container">
	<div class="page-header">
		<h1><?= \Yii::t('app', 'Карта сайта') ?></h1>
	</div>
	<ul>
		<?php foreach((new Sitemap) as $page => $label) { ?>
		<li><a href="<?= EshopHelper::createUrl($page) ?>"><?= Html::encode(\Yii::t('app', $label)) ?></a></li>
		<?php } ?>
	</ul>
</div>
