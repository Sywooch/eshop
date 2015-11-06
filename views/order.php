<?php
use yii\helpers\Html;
use yii\helpers\EshopHelper;
if(Yii::$app->db->createCommand("SELECT COUNT(id) FROM cart WHERE hash = {$hash}")->queryScalar() == 0) {
	Yii::$app->request->redirect(EshopHelper::createUrl('/'));
}
Yii::import('application.snippets.models.OrderForm');
$model = new OrderForm;
$model->setAttributes($_POST);
$validate = $model->validate();
?>
<div class="container">
	<div class="page-header">
		<div class="row">
			<div class="col-md-10">
				<h1>Оформление заказа</h1>
			</div>
			<div class="col-md-2">
				<?php if(empty($_POST) or !$validate) { ?>
				<a href="<?= EshopHelper::createUrl('cart') ?>" class="pull-right">&laquo; Вернуться в корзину</a>
				<?php } else { ?>
				<a href="<?= EshopHelper::createUrl('/') ?>" class="pull-right">&laquo; Вернуться в каталог</a>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php if(empty($_POST) or !$validate) { ?>
	<p>Итак, уважаемый Покупатель, вы проделали следующие действия:</p>
	<ul>
		<li>Заполнили <a href="<?= EshopHelper::createUrl('cart') ?>">Вашу корзину</a> футболками от  <?= Html::encode(Yii::$app->name) ?> и при необходимости сверились с <a href="<?= EshopHelper::createUrl('help') ?>">таблицей размеров</a>;</li>
		<li>Ознакомились с <a href="<?= EshopHelper::createUrl('shipping') ?>">условиями и способами доставки</a>;</li>
		<li>Ознакомились со <a href="<?= EshopHelper::createUrl('payment') ?>">способами оплаты</a>;</li>
		<li>Прочитали <a href="<?= EshopHelper::createUrl('public-offer') ?>">публичную оферту</a>.</li>
	</ul>	
	<p>Вам осталось сделать один небольшой шаг на пути Вашей покупки &#8211; расскажите, пожалуйста, немного о себе:</p>
	<div class="well">
		<h3 class="text-info">Форма для заполнения Ваших контактных данных и ФИО</h3>
		<?php 
		if(!empty($_POST)) {
			$errors = $model->getErrors();
			foreach ($errors as $k => $error) {
				if($k == 'nospam') continue; 
				foreach ($error as $item) { ?>
					<p class="text-danger"><?= Html::encode($item) ?></p>
				<?php }
			}
		}
		?>
		<form role="form" action="" method="post">
	 		<input type="hidden" name="nospam" value="">
			<div class="form-group<?= isset($errors['fio']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlFio">ФИО<small></small></label>
				<input type="text" class="form-control" name="fio" id="controlFio" value="">
			</div>
			<div class="form-group<?= isset($errors['phone']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlPhone">Телефон<small></small></label>
				<input type="tel" class="form-control" name="phone" id="controlPhone" value="">
			</div>
			<div class="form-group<?= isset($errors['email']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlEmail">Email<small></small></label>
				<input type="email" class="form-control" name="email" id="controlEmail" value="">
			</div>
			<div class="form-group<?= isset($errors['text']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlText">Комментарий<small></small></label>
				<textarea class="form-control" name="text" id="controlText" rows="4"></textarea>
			</div>
			<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-heart"></span> Отправить заказ</button>
		</form>
	</div>
	<?php } else {  
		require_once 'snippets/order.php';
	?>
	<div class="alert alert-success">Ваш заказ №<?= $order_id ?> успешно отправлен. Спасибо, что заказали футболки от  <?= Html::encode(Yii::$app->name) ?>!</div>
	<?php } ?>
</div>
