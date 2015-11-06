<?php
use yii\helpers\Html; 
use yii\helpers\EshopHelper;
Yii::import('application.snippets.Sitemap');
?>
<div class="container">
	<div class="page-header">
		<h1>Карта сайта</h1>
	</div>
	<ul>
		<?php foreach((new Sitemap) as $page => $label) { ?>
		<li><a href="<?= EshopHelper::createUrl($page) ?>"><?= Html::encode($label) ?></a></li>
		<?php } ?>
	</ul>
</div>
