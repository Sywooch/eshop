<?php 
use yii\helpers\Html; 
use app\helpers\EshopHelper;
Yii::$app->db->createCommand("DELETE FROM cart WHERE created < DATE_SUB(NOW(), INTERVAL 2 DAY)")->execute();
?>
<div class="container">
	<div class="page-header">
		<div class="row">
			<div class="col-md-10">
				<h1><?= \Yii::t('app', 'Корзина') ?></h1>
			</div>
			<div class="col-md-2">
				<a href="<?= EshopHelper::createUrl('/') ?>" class="pull-right">&laquo; <?= \Yii::t('app', 'Вернуться в каталог') ?></a>
			</div>
		</div>
	</div>
	<?php
	$rows = Yii::$app->db->createCommand("
				SELECT *, cart.id as id FROM cart 
					INNER JOIN item ON (cart.item_id = item.id)
				WHERE hash = {$hash}
				ORDER BY cart.id")->queryAll();
	if(!empty($rows)) { ?>
	<div id="cart-wrapper">
		<p>
			<?= \Yii::t('app', 'Позиций:') ?> <span class="badge" id="cart-count"><?= Yii::$app->db->createCommand("SELECT COUNT(id) FROM cart WHERE hash = {$hash}")->queryScalar() ?></span>,
			<?= \Yii::t('app', 'Футболок:') ?> <span class="badge" id="cart-sum"><?= (int)Yii::$app->db->createCommand("SELECT SUM(amount) FROM cart WHERE hash = {$hash}")->queryScalar() ?></span>
		</p>
		<p>
			<button type="button" class="btn btn-info btn-order">
				<span class="glyphicon glyphicon-heart"></span> <?= \Yii::t('app', 'Оформить заказ') ?>
			</button>
		</p>
		<div class="table-responsive">
			<table class="table table-bordered table-condensed table-hover">
		  		<thead>
		  			<tr>
						<th><?= \Yii::t('app', 'Рисунок') ?></th>
						<th style="white-space: nowrap;"><?= \Yii::t('app', '№ Футболки') ?></th>
						<th><?= \Yii::t('app', 'Артикул') ?></th>
						<th><?= \Yii::t('app', 'Надпись') ?></th>
						<th><?= \Yii::t('app', 'Печатать ссылку') ?></th>
						<th><?= \Yii::t('app', 'Размер') ?> <a href="<?= EshopHelper::createUrl('help') ?>"><span class="glyphicon glyphicon-flag"></span></a></th>
						<th><?= \Yii::t('app', 'Цена, руб.') ?></th>
						<th><?= \Yii::t('app', 'Количество') ?></th>
						<th><?= \Yii::t('app', 'Сумма, руб.') ?></th>
						<th><?= \Yii::t('app', 'Обновить / удалить позицию') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$total = 0;
					foreach ($rows as $k => $row) { 
						$total += $row['price'] * $row['amount'];
					?>
					<tr>
						<td>
							<a href="images/gallery/<?= $row['item_id'] ?>.png" class="item-image zoom-in" title="<?= Html::encode($row['name']) ?>">
								<img class="img-responsive" src="images/gallery/thumbs/<?= $row['item_id'] ?>.png" alt="" width="150"><span class="glyphicon glyphicon-zoom-in"></span>
							</a>
						</td>
						<td><?= $row['item_id'] ?></td>
						<td><?= Html::encode($row['name']) ?></td>
						<td id="cart-inscription-<?= $row['id'] ?>">
							<div>
							<?= !empty($row['inscription']) ? nl2br(Html::encode($row['inscription'])) : '&#8211;' ?>
							</div>
							<a href="#">
								<span class="glyphicon glyphicon-pencil"></span> 
							</a>
						</td>
						<td>
							<div class="form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" id="cart-item-printpromolink-<?= $row['id'] ?>"<?= $row['printpromolink'] ? ' checked="checked"' : ''?>>
									</label>
								</div>
							</div>
						</td>
						<td>
							<div class="form-group">
								<select class="form-control" id="cart-item-size-<?= $row['id'] ?>">
									<?php foreach (EshopHelper::getClothingSizes() as $value) {?>
										<option<?= $row['size'] == $value ? ' selected="selected"' : '' ?>><?= $value ?></option>
									<?php } ?>
								</select>
							</div>
						</td>
						<td class="text-right" id="cart-item-price-<?= $row['id'] ?>">
							<div><?= EshopHelper::priceFormat($row['price']) ?></div>
							<?= $row['printpromolink'] ? '<span class="small label label-default">-10%</span>' : '' ?>
						</td>
						<td>
							<div class="form-group">
								<input class="form-control cart-item-amount" type="number" id="cart-item-amount-<?= $row['id'] ?>" placeholder="0" min="1" step="1" value="<?= $row['amount'] ?>">
							</div>
						</td>
						<td class="text-right" id="cart-item-price-amount-<?= $row['id'] ?>"><?= EshopHelper::priceFormat($row['price'] * $row['amount']) ?></td>
						<td>
							<form class="form-inline" role="form">
								<div class="form-group">
									<button class="btn btn-sm btn-primary" type="button" data-loading-text="Обновляю&hellip;" id="cart-idu-<?= $row['id'] ?>">
										<span class="glyphicon glyphicon-pencil"></span> <?= \Yii::t('app', 'Обновить') ?>
									</button>
									<button class="btn btn-sm btn-danger" type="button" data-loading-text="Удаляю&hellip;" id="cart-id-<?= $row['id'] ?>">
										<span class="glyphicon glyphicon-remove"></span> <?= \Yii::t('app', 'Удалить') ?>
									</button>
								</div>
							</form>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<td colspan="9" class="text-right"><b><?= \Yii::t('app', 'Итого') ?></b></td>
						<td><b id="cart-total"><?= EshopHelper::priceFormat($total) ?></b><b> <?= \Yii::t('app', 'руб.') ?></b></td>
					</tr>
		  		</tbody>
			</table>
		</div>
		<p><span class="label label-warning"><?= \Yii::t('app', 'Внимание!') ?></span> <?= \Yii::t('app', 'Уважаемый покупатель, если Вы редактировали позиции, то убедитесь, пожалуйста, что вы нажимали кнопку «<span class="glyphicon glyphicon-pencil"></span> Обновить» напротив каждой отредактированной позиции и если неуверены нажмите ее еще раз. При нажатии этой кнопки параметры футболки, которую вы хотите купить редактируются на сервере, чтобы при переходе на страницу <a href="{0}">оформления заказа</a> они не потерялись.', EshopHelper::createUrl('order')) ?></p>
		<p>
			<button type="button" class="btn btn-info btn-order pull-right">
				<span class="glyphicon glyphicon-heart"></span> <?= \Yii::t('app', 'Оформить заказ') ?>
			</button>
		</p>
		<?php if(count($rows) > 5) { ?>
		<div class="text-center">
	    	<a href="#top" class="label label-default" id="back-to-top"><?= \Yii::t('app', 'Перейти наверх') ?></a>
	    </div>
	    <?php } ?>
	</div>
	<?php } ?>
	<div class="alert alert-info"<?= !empty($rows) ? ' style="display: none;"' : ''?>><?= \Yii::t('app', 'В Вашей корзине пока пусто. Перейдите, пожалуйста, в <a href="{0}" style="white-space: nowrap;"><span class="glyphicon glyphicon-link"></span> каталог</a> для выбора футболки, которая Вам понравится и положите ее в Вашу корзину нажав на кнопку «Положить в корзину» рядом с каждой футболкой.', EshopHelper::createUrl('/')) ?></div>
	<br><br>
</div>
<!-- Modal cart -->
<div class="modal fade" id="modalCartItem" tabindex="-1" role="dialog" aria-labelledby="modalCartItemLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="modalCartItemLabel"><?= \Yii::t('app', 'Редактирование надписи на футболке') ?></h4>
			</div>
			<div class="modal-body">
				<textarea class="form-control" placeholder="<?= \Yii::t('app', 'Ваша надпись на футболке') ?>"></textarea><br>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?= \Yii::t('app', 'Закрыть') ?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
