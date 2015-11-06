<?php 
use yii\helpers\Html; 
use yii\helpers\EshopHelper;
?>
<div id="footer">
			<div class="container">
				<p class="text-muted">
					<small class="copy">&copy; <?= date('Y') > 2014 ? date('Y') . '-' : '' ?>2014</small> <a href="https://github.com/earthperson/eshop" target="_blank" class="small"><?= Html::encode(Yii::$app->name) ?></a> <a href="<?= EshopHelper::createUrl('public-offer') ?>" class="small">Публичная оферта</a>, <a href="<?= EshopHelper::createUrl('feedback') ?>" class="small">Обратная связь</a>
					<small class="pull-right">&nbsp;v0.4.5-pl</small><a href="<?= Yii::$app->params['VK.group'] ?>" target="_blank" class="pull-right small">Группа ВКонтакте</a><span class="pull-right">,&nbsp;</span><a href="http://dev.earthperson.info" target="_blank" class="pull-right small">Разработка</a>
				</p>
			</div>
		</div>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="bower_components/blueimp-gallery/js/jquery.blueimp-gallery.min.js"></script>
		<script src="bower_components/blueimp-bootstrap-image-gallery/js/bootstrap-image-gallery.min.js"></script>
		<script type="text/javascript" src="js/output.min.js"></script>
	</body>
</html>
