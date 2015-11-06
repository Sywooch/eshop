<?php 
use yii\helpers\Html; 
use app\helpers\EshopHelper;
$bestsellers = Yii::$app->db->createCommand("SELECT * FROM item WHERE bestsellers <> 0 ORDER BY id LIMIT 20")->queryAll();
?>
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="page-header">
				<h1>Каталог</h1>
			</div>
		</div>
		<div class="col-md-2" id="like">
			<div id="vk_like" class="pull-right"></div>
			<script type="text/javascript">
			VK.Widgets.Like("vk_like", {type: "button"});
			</script>
			<br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div id="carousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<div class="carousel-control-extra-wrapper">
					<span class="glyphicon glyphicon-pause carousel-control-extra"></span>
					<span class="glyphicon glyphicon-play carousel-control-extra" style="display: none;"></span>
				</div>
				<ol class="carousel-indicators">
					<?php foreach ($bestsellers as $k => $row) { ?>
					<li data-target="#carousel" data-slide-to="<?= $k ?>"<?= $k == 0 ? ' class="active"' : '' ?>></li>
					<?php } ?>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<?php foreach ($bestsellers as $k => $row) { ?>
					<div class="item<?= $k == 0 ? ' active' : '' ?>">
						<img src="images/gallery/<?= $row['id'] ?>.png" alt="<?= Html::encode($row['name']) ?>" width="600">
						<div class="carousel-caption">
							<h4><?= Html::encode($row['name']) ?></h4>
							<h4><?= EshopHelper::priceFormat($row['price']) ?> руб.</h4>
							<button type="button" class="btn btn-sm btn-primary" id="item-id-a-<?= $row['id'] ?>" data-loading-text="Добавляю&hellip;">
								<span class="glyphicon glyphicon-shopping-cart"></span> Положить в корзину
							</button>
						</div>
					</div>
					<?php } ?>
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
			<br>
		</div>
		<div class="col-md-6">
			<p><a href="<?= EshopHelper::createUrl('cart') ?>">В Вашей корзине</a>: 
			Позиций: <span class="badge" id="cart-count"><?= Yii::$app->db->createCommand("SELECT COUNT(id) FROM cart WHERE hash = {$hash}")->queryScalar() ?></span>,
			Футболок: <span class="badge" id="cart-sum"><?= (int)Yii::$app->db->createCommand("SELECT SUM(amount) FROM cart WHERE hash = {$hash}")->queryScalar() ?></span>.</p>
			<p><a href="#shop" class="dashed-link">Перейти в основной каталог</a></p>
			<p><span class="label label-info">Внимание!</span> Вы можете заказать <a href="<?= EshopHelper::createUrl('vip') ?>"><span class="glyphicon glyphicon-link"></span> свой вариант</a> дизайна футболки <span style="white-space: nowrap;">с предоплатой <em>50%</em>.</span></p>
			<hr>
			<h3>Хиты продаж: &nbsp; <span class="chevron-left" title="Предыдущая">&laquo;</span> <span id="item_name"><?= Html::encode(Yii::$app->db->createCommand("SELECT name FROM item WHERE bestsellers <> 0 ORDER BY id LIMIT 1")->queryScalar()) ?></span>  <span class="chevron-right" title="Следующая">&raquo;</span></h3>
			<form class="form-inline" role="form">
				<input type="hidden" id="item_id" value="1">
				<div class="form-group">
					<select class="form-control" id="cart-item-size">
						<option>--- Выберите размер ---</option>
						<?php foreach (EshopHelper::getClothingSizes() as $value) {?>
							<option><?= $value ?></option>
						<?php } ?>
					</select>
					<a href="#" id="help" class="dashed-link" title="Таблица размеров футболок" data-content='Вы можете перейти на <a href="<?= EshopHelper::createUrl('help') ?>">страницу с памяткой</a> по размерам футболок, если сомневаетесь что выбрать.'><span class="glyphicon glyphicon-flag"></span></a> &nbsp;
				</div>
				<div class="form-group">
					<input class="form-control cart-item-amount" type="number" id="cart-item-amount" placeholder="0" min="1" step="1" value=""> <label class="text-muted" for="cart-item-amount">Укажите количество</label></span>
				</div>
			</form>
			<form role="form">
				<div class="form-group">
					<div class="checkbox">
						<label>
							<input type="checkbox" value="inscription" id="inscription"> Добавить свою надпись.
						</label>
					</div>
				</div>
				<div class="form-group" style="display: none;" id="inscription-text-wrapper">
					<textarea class="form-control" placeholder="Ваша надпись на футболке" id="cart-item-inscription"></textarea><br>
				</div>
				<div class="form-group">
					<div class="checkbox">
						<label>
							<input type="checkbox" id="cart-item-printpromolink"> Ссылка на <a href="<?= Yii::$app->params['VK.group'] ?>" target="_blank">группу ВКонтакте</a> в правом нижнем углу футболки (<span style="white-space: nowrap;"><em>-10%</em> стоимости</span>).
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class="checkbox">
						<label>
							<input type="checkbox" id="promo-code"> Ввести <a href="#" id="promo-code-link" class="dashed-link" title="Промо-код" data-content='Промо-код Вы можете найти на флаере полученном у наших распространителей. Промо-код представляет собой буквенно-цифровую последовательность длинной 8 символов. Регистр значения не имеет. Пример промо-кода: <code>m7cxc2qm</code>'>промо-код <span class="glyphicon glyphicon-flag"></span></a> (<span style="white-space: nowrap;"><em>-30%</em> стоимости</span>).
						</label>
					</div>
				</div>
			</form>
			<form class="form-inline" role="form" style="display: none;" id="promo-code-wrapper">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Промо-код" id="cart-item-promocode" value="">
				</div>
				<button type="button" class="btn btn-default">Проверить</button>
				<br><br>
			</form>
			<button type="button" class="btn btn-primary" id="push-to-cart" data-loading-text="Добавляю&hellip;">
				<span class="glyphicon glyphicon-shopping-cart"></span> Положить в корзину
			</button>
			<hr>
			<p><a href="<?= EshopHelper::createUrl('cart') ?>" class="pull-right"><span class="glyphicon glyphicon-link"></span> Просмотреть и обновить корзину</a></p>
		</div>
	</div>
	<!-- Marketing messaging and featurettes -->
	<div class="marketing">
		<a href="#shop" id="shop"></a>
		<h2>Основной каталог</h2>
		<hr class="featurette-divider">
		<div id="links">
			<?php 
			$shop = Yii::$app->db->createCommand("SELECT * FROM item WHERE bestsellers = 0 ORDER BY id")->queryAll();
			foreach ($shop as $k => $row) { ?>
			<a href="images/gallery/<?= $row['id'] ?>.png?<?= $row['id'] ?>" title="Артикул: <?= Html::encode($row['name']) ?>. Цена: <?= EshopHelper::priceFormat($row['price']) ?> руб." data-gallery class="zoom-in">
		        <img src="images/gallery/thumbs/<?= $row['id'] ?>.png" alt="<?= Html::encode($row['name']) ?>">
		    </a>
			<?php } ?>
		</div>
		<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
		<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
			<!-- The container for the modal slides -->
			<div class="slides"></div>
			<!-- Controls for the borderless lightbox -->
			<h3 class="title"></h3>
			<a class="prev">‹</a>
			<a class="next">›</a>
			<a class="close">&times;</a>
			<a class="play-pause"></a>
			<ol class="indicator"></ol>
			<!-- The modal dialog, which will be used to wrap the lightbox content -->
			<div class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" aria-hidden="true">&times;</button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body next"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary add-to-cart" data-loading-text="Добавляю&hellip;">
								<span class="glyphicon glyphicon-shopping-cart"></span> Положить в корзину
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<!-- start the featurettes -->
		<a href="#bestsellers" id="bestsellers"></a>
		<h2>Хиты продаж</h2>
		<?php 
		foreach ($bestsellers as $k => $row) { 
		?>
		<hr class="featurette-divider">
		<div class="row featurette">
			<?php 
			if($k % 2 == 0) {
				include 'chunks/featurettes/left.php';
				include 'chunks/featurettes/right.php';
			}
			else {
				include 'chunks/featurettes/right.php';
				include 'chunks/featurettes/left.php';
			}
			?>
		</div>
		<?php } ?>
		<hr class="featurette-divider">
		<!-- /end the featurettes -->
	</div>
	<div id="ya_share"></div>
	<br>
	<div class="text-center">
    	<a href="#top" class="label label-default" id="back-to-top">Перейти наверх</a>
    	<a href="<?= EshopHelper::createUrl('cart') ?>" class="label label-primary">Перейти в корзину</a>
    </div>
	<br>
</div>
<!-- Modal cart -->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="modalCartLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="modalCartLabel">Добавление в корзину</h4>
			</div>
			<div class="modal-body">
				<div class="var-success" style="display: none;">
					<div class="alert alert-success"></div>
				</div>
				<div class="var-error" style="display: none;">
					<div class="alert alert-danger"></div>
				</div>
				<p class="help-block">Перед оформлением заказа Вы всегда можете просмотреть и в случае необходимости обновить позиции <a href="<?= EshopHelper::createUrl('cart') ?>" style="white-space: nowrap;"><span class="glyphicon glyphicon-shopping-cart"></span>в Вашей корзине</a> нажимая соответствующие кнопки <span style="white-space: nowrap;">«<span class="glyphicon glyphicon-pencil"></span> Обновить»</span> или <span style="white-space: nowrap;">«<span class="glyphicon glyphicon-remove"></span> Удалить»</span> позицию.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
