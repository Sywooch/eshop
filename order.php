<?php
$title = 'Оформление заказа';
ob_start();
require_once 'chunks/head.php';
require_once 'chunks/menu.php';
$hash = get_hash_for_sql();
if(Yii::app()->db->createCommand("SELECT COUNT(id) FROM cart WHERE hash = {$hash}")->queryScalar() == 0) {
	Yii::app()->request->redirect('/' . get_base_url($page));
}
ob_end_flush();
Yii::import('application.snippets.models.OrderForm');
$model = new OrderForm;
$model->setAttributes($_POST);
?>
<div class="container">
	<div class="page-header">
		<div class="row">
			<div class="col-md-10">
				<h1>Оформление заказа</h1>
			</div>
			<div class="col-md-2">
				<a href="cart.php" class="pull-right">&laquo; Вернуться в корзину</a>
			</div>
		</div>
	</div>
	<?php if(empty($_POST) or !$model->validate()) { ?>
	<p>Итак, уважаемый Покупатель, вы проделали следующие действия:</p>
	<ul>
		<li>Заполнили <a href="cart.php">Вашу корзину</a> футболками от  <?php echo CHtml::encode(Yii::app()->name); ?> и при необходимости сверились с <a href="help.php">таблицей размеров</a>;</li>
		<li>Ознакомились с <a href="shipping.php">условиями и способами доставки</a>;</li>
		<li>Ознакомились со <a href="payment.php">способами оплаты</a>;</li>
		<li>Прочитали <a href="public-offer.php">публичную оферту</a>.</li>
	</ul>	
	<p>Вам осталось сделать один небольшой шаг на пути Вашей покупки &#8211; расскажите, пожалуйста, немного о себе:</p>
	<div class="well">
		<h3 class="text-info">Форма для заполнения Ваших контактных данных и ФИО</h3>
		<form role="form" action="" method="post">
	 		<input type="hidden" name="nospam:blank" value="" />
	 		<input type="hidden" name="order" value="1" />
			<div class="form-group">
				<label class="control-label" for="controlFio">ФИО<small></small></label>
				<input type="text" class="form-control" name="fio" id="controlFio" value="">
			</div>
			<div class="form-group">
				<label class="control-label" for="controlPhone">Телефон<small></small></label>
				<input type="tel" class="form-control" name="phone" id="controlPhone" value="">
			</div>
			<div class="form-group">
				<label class="control-label" for="controlEmail">Email<small></small></label>
				<input type="email" class="form-control" name="email" id="controlEmail" value="">
			</div>
			<div class="form-group">
				<label class="control-label" for="controlText">Комментарий<small></small></label>
				<textarea class="form-control" name="text" id="controlText" rows="4"></textarea>
			</div>
			<div class="form-group">
				<label class="control-label" for="controlMath"><small>Защита от спама, напишите сколько будет: 27 плюс 34?</small></label>
				<input type="text" class="form-control" name="math:required" id="controlMath" value="">
			</div>
			<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-heart"></span> Отправить заказ</button>
		</form>
	</div>
	<?php } else {  
	Yii::app()->db->createCommand("DELETE FROM cart WHERE hash = {$hash}")->execute();
	?>
	<div class="alert alert-success">Ваш заказ успешно отправлен. Спасибо, что заказали футболки от  <?php echo CHtml::encode(Yii::app()->name); ?>!</div>
	<?php } ?>
</div>
<?php require_once 'chunks/footer.php' ?>