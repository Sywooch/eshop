<?php use yii\helpers\Html; ?>
<div class="col-md-5">
	<a href="images/gallery/<?= $row['id'] ?>.png" class="item-image zoom-in" title="<?= Html::encode($row['name']) ?>">
		<img class="featurette-image img-responsive" src="images/gallery/small/<?= $row['id'] ?>.png" alt="<?= Html::encode($row['name']) ?>" width="300"><span class="glyphicon glyphicon-zoom-in"></span>
	</a>
</div>
