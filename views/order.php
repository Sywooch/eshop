<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\helpers\EshopHelper;
use app\models\OrderForm;
if(Yii::$app->db->createCommand("SELECT COUNT(id) FROM cart WHERE hash = {$hash}")->queryScalar() == 0) {
	header('Location: ' . Url::home(true));
	exit;
}
$model = new \app\models\OrderForm;
$model->attributes = \Yii::$app->request->post('OrderForm');
$validate = $model->validate();
?>
<div class="container">
	<div class="page-header">
		<div class="row">
			<div class="col-md-10">
				<h1><?= \Yii::t('app', 'Оформление заказа') ?></h1>
			</div>
			<div class="col-md-2">
				<?php if(empty($_POST) or !$validate) { ?>
				<a href="<?= EshopHelper::createUrl('cart') ?>" class="pull-right">&laquo; <?= \Yii::t('app', 'Вернуться в корзину') ?></a>
				<?php } else { ?>
				<a href="<?= EshopHelper::createUrl('/') ?>" class="pull-right">&laquo; <?= \Yii::t('app', 'Вернуться в каталог') ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php if(empty($_POST) or !$validate) { ?>
	<p><?= \Yii::t('app', 'Итак, уважаемый Покупатель, вы проделали следующие действия:') ?></p>
	<ul>
		<li><?= \Yii::t('app', 'Заполнили <a href="{0}">Вашу корзину</a> футболками от {1} и при необходимости сверились с <a href="{2}">таблицей размеров</a>;', [EshopHelper::createUrl('cart'), Html::encode(Yii::$app->name), EshopHelper::createUrl('help')]) ?></li>
		<li><?= \Yii::t('app', 'Ознакомились с <a href="{0}">условиями и способами доставки</a>;', EshopHelper::createUrl('shipping')) ?></li>
		<li><?= \Yii::t('app', 'Ознакомились со <a href="{0}">способами оплаты</a>;', EshopHelper::createUrl('payment')) ?></li>
		<li><?= \Yii::t('app', 'Прочитали <a href="{0}">публичную оферту</a>.', EshopHelper::createUrl('public-offer')) ?></li>
	</ul>	
	<p><?= \Yii::t('app', 'Вам осталось сделать один небольшой шаг на пути Вашей покупки &#8211; расскажите, пожалуйста, немного о себе:') ?></p>
	<div class="well">
		<h3 class="text-info"><?= \Yii::t('app', 'Форма для заполнения Ваших контактных данных и ФИО') ?></h3>
		<?php 
		if(!empty($_POST)) {
			$errors = $model->errors;
			foreach ($errors as $k => $error) {
				if($k == 'nospam') continue; 
				foreach ($error as $item) { ?>
					<p class="text-danger"><?= Html::encode($item) ?></p>
				<?php }
			}
		}
		?>
		<form role="form" action="" method="post">
	 		<input type="hidden" name="OrderForm[nospam]" value="">
			<div class="form-group<?= isset($errors['fio']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlFio"><?= $model->getAttributeLabel('fio') ?><small></small></label>
				<input type="text" class="form-control" name="OrderForm[fio]" id="controlFio" value="">
			</div>
			<div class="form-group<?= isset($errors['phone']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlPhone"><?= $model->getAttributeLabel('phone') ?><small></small></label>
				<input type="tel" class="form-control" name="OrderForm[phone]" id="controlPhone" value="">
			</div>
			<div class="form-group<?= isset($errors['email']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlEmail"><?= $model->getAttributeLabel('email') ?><small></small></label>
				<input type="email" class="form-control" name="OrderForm[email]" id="controlEmail" value="">
			</div>
			<div class="form-group<?= isset($errors['text']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlText"><?= $model->getAttributeLabel('text') ?><small></small></label>
				<textarea class="form-control" name="OrderForm[text]" id="controlText" rows="4"></textarea>
			</div>
			<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-heart"></span> <?= \Yii::t('app', 'Отправить заказ') ?></button>
		</form>
	</div>
	<?php } else {  
		require_once 'snippets/order.php';
	?>
	<div class="alert alert-success"><?= \Yii::t('app', 'Ваш заказ №{0} успешно отправлен. Спасибо, что заказали футболки от {1}!', [$order_id, Html::encode(Yii::$app->name)]) ?></div>
	<?php 
		$model->mail($order_id);
	} ?>
</div>
