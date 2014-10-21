<?php
$title = 'Карта сайта';
require_once 'chunks/head.php';
require_once 'chunks/menu.php';
Yii::import('application.snippets.Sitemap');
?>
<div class="container">
	<div class="page-header">
		<h1>Карта сайта</h1>
	</div>
	<ul>
		<?php foreach((new Sitemap) as $href => $label) { ?>
		<li><a href="<?php printf($href, get_base_url($page)) ?>"><?php echo CHtml::encode($label) ?></a></li>
		<?php } ?>
	</ul>
</div>
<?php require_once 'chunks/footer.php' ?>
