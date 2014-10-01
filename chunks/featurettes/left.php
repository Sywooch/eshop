<div class="col-md-7">
	<h2 class="featurette-heading"><?php echo CHtml::encode($row['name']) ?>. <span class="text-muted"><?php echo CHtml::encode($row['announcement']) ?></span></h2>
	<p class="lead"><?php echo CHtml::encode($row['description']) ?></p>
	<h3 class="price"><?php echo price_format($row['price']) ?> руб.</h3>
	<p>
		<button type="button" class="btn btn-lg btn-primary" id="dress-id-b-<?php echo $row['id'] ?>">
			<span class="glyphicon glyphicon-shopping-cart"></span> Положить в корзину
		</button>
	</p>
</div>