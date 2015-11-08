<?php 
use yii\helpers\Html; 
use app\helpers\EshopHelper;
?>
<div class="col-md-7">
	<h2 class="featurette-heading"><?= Html::encode($row['name']) ?>. <span class="text-muted"><?= Html::encode($row['announcement']) ?></span></h2>
	<p class="lead"><?= Html::encode($row['description']) ?></p>
	<h3 class="price"><?= EshopHelper::priceFormat($row['price']) ?> <?= \Yii::t('app', 'руб.') ?></h3>
	<p>
		<button type="button" class="btn btn-lg btn-primary" id="item-id-b-<?= $row['id'] ?>" data-loading-text="<?= \Yii::t('app', 'Добавляю') ?>&hellip;">
			<span class="glyphicon glyphicon-shopping-cart"></span> <?= \Yii::t('app', 'Положить в корзину') ?>
		</button>
	</p>
</div>
