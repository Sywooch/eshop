<?php
$title = 'Обратная связь';
require_once 'chunks/head.php';
require_once 'chunks/menu.php';
Yii::import('application.snippets.models.FeedbackForm');
$model = new FeedbackForm;
$model->setAttributes($_POST);
?>
<script type="text/javascript" src="js/crypt.min.js"></script>
<div class="container">
	<div class="page-header">
		<h1>Обратная связь</h1>
	</div>
	<?php if(empty($_POST) or !$model->validate()) { ?>
	<p>Способы обратной связи:</p>
	<ol>
		<li>Воспользоваться формой обратной связи на этой странице;</li>
		<li>Написать сообщение администраторам <a href="<?php echo Yii::app()->params['VK.group']; ?>" target="_blank"><img src="images/vk.com.jpg" width="16" height="16" alt="" title="Группа ВКонтакте"></a> <a href="<?php echo Yii::app()->params['VK.group']; ?>" target="_blank">группы ВКонтакте</a>;</li>
		<li>Позвонить по телефону <em><?php echo Yii::app()->params['phone']; ?></em>;</li>
		<li>Написать письмо на почту <?php echo Yii::app()->params['email']; ?> в свободной форме с указанием Ваших координат и ФИО.</li>
	</ol>
	<div class="well">
		<h3 class="text-info">Форма обратной связи</h3>
		<?php 
		if(!empty($_POST)) {
			$errors = $model->getErrors();
			foreach ($errors as $k => $error) {
				if($k == 'nospam') continue; 
				foreach ($error as $item) { ?>
					<p class="text-danger"><?php echo CHtml::encode($item) ?></p>
				<?php }
			}
		}
		$math_init = $model->mathInit();
		?>
		<form role="form" action="" method="post">
			<input type="hidden" name="nospam" value="">
  			<div class="form-group<?php echo isset($errors['fio']) ? ' has-error' : '' ?>">
  				<label class="control-label" for="controlFio">ФИО<small></small></label>
				<input type="text" class="form-control" name="fio" id="controlFio" value="">
			</div>
			<div class="form-group<?php echo isset($errors['phone']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlPhone">Телефон<small></small></label>
				<input type="tel" class="form-control" name="phone" id="controlPhone" value="">
			</div>
			<div class="form-group<?php echo isset($errors['email']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlEmail">Email<small></small></label>
				<input type="email" class="form-control" name="email" id="controlEmail" value="">
			</div>
			<div class="form-group<?php echo isset($errors['text']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlText">Сообщение<small></small></label>
				<textarea class="form-control" name="text" id="controlText" rows="4"></textarea>
			</div>
			<div class="form-group<?php echo isset($errors['math']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlMath"><small>Защита от спама, напишите сколько будет: <?php echo $math_init['op1'] ?> <?php echo $math_init['operator'] ? 'плюс' : 'минус' ?> <?php echo $math_init['op2'] ?>?</small></label>
				<input type="number" class="form-control" name="math" id="controlMath" value="">
			</div>
			<button type="submit" class="btn btn-default">Отправить</button>
		</form>
	</div>
	<?php } else { ?>
	<div class="alert alert-success">Спасибо! Обратная связь с Клиентами помогает улучшить наш сервис.</div>
	<?php } ?>
</div>
<?php require_once 'chunks/footer.php' ?>