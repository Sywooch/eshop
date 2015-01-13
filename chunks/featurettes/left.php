<div class="col-md-7">
	<h2 class="featurette-heading"><?= CHtml::encode($row['name']) ?>. <span class="text-muted"><?= CHtml::encode($row['announcement']) ?></span></h2>
	<p class="lead"><?= CHtml::encode($row['description']) ?></p>
	<h3 class="price"><?= price_format($row['price']) ?> руб.</h3>
	<p>
		<button type="button" class="btn btn-lg btn-primary" id="item-id-b-<?= $row['id'] ?>" data-loading-text="Добавляю...">
			<span class="glyphicon glyphicon-shopping-cart"></span> Положить в корзину
		</button>
	</p>
</div>
