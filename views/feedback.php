<?php
use yii\helpers\Html;
use app\models\FeedbackForm;
$model = new \app\models\FeedbackForm;
$model->attributes = \Yii::$app->request->post('FeedbackForm');
?>
<div class="container">
	<div class="page-header">
		<h1><?= \Yii::t('app', 'Обратная связь') ?></h1>
	</div>
	<?php if(empty($_POST) or !$model->validate()) { ?>
	<p><?= \Yii::t('app', 'Способы обратной связи:') ?></p>
	<ol>
		<li><?= \Yii::t('app', 'Воспользовавшись формой обратной связи на этой странице') ?>;</li>
		<li><?= \Yii::t('app', 'Написать сообщение администраторам') ?> <a href="<?= Yii::$app->params['VK.group'] ?>" target="_blank"><img src="images/vk.com.jpg" width="16" height="16" alt="" title="<?= \Yii::t('app', 'Группа ВКонтакте') ?>"></a> <a href="<?= Yii::$app->params['VK.group'] ?>" target="_blank"><?= \Yii::t('app', 'группы ВКонтакте') ?></a>;</li>
		<li><?= \Yii::t('app', 'Позвонить по телефону') ?> <em><?= Yii::$app->params['phone'] ?></em>;</li>
		<li><?= \Yii::t('app', 'Написать письмо на почту {0} в свободной форме с указанием Ваших координат и ФИО', Yii::$app->params['email']) ?>.</li>
	</ol>
	<div class="well">
		<h3 class="text-info"><?php echo \Yii::t('app', 'Форма обратной связи') ?></h3>
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
		$math_init = $model->mathInit();
		?>
		<form role="form" action="" method="post">
			<input type="hidden" name="FeedbackForm[nospam]" value="">
  			<div class="form-group<?= isset($errors['fio']) ? ' has-error' : '' ?>">
  				<label class="control-label" for="controlFio"><?= $model->getAttributeLabel('fio') ?><small></small></label>
				<input type="text" class="form-control" name="FeedbackForm[fio]" id="controlFio" value="">
			</div>
			<div class="form-group<?= isset($errors['phone']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlPhone"><?= $model->getAttributeLabel('phone') ?><small></small></label>
				<input type="tel" class="form-control" name="FeedbackForm[phone]" id="controlPhone" value="">
			</div>
			<div class="form-group<?= isset($errors['email']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlEmail"><?= $model->getAttributeLabel('email') ?><small></small></label>
				<input type="email" class="form-control" name="FeedbackForm[email]" id="controlEmail" value="">
			</div>
			<div class="form-group<?= isset($errors['text']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlText"><?= $model->getAttributeLabel('text') ?><small></small></label>
				<textarea class="form-control" name="FeedbackForm[text]" id="controlText" rows="4"></textarea>
			</div>
			<div class="form-group<?= isset($errors['math']) ? ' has-error' : '' ?>">
				<label class="control-label" for="controlMath"><small><?= \Yii::t('app', 'Защита от спама, напишите сколько будет: {0, number} {1} {2, number}?', [$math_init['op1'], $math_init['operator'] ? \Yii::t('app', 'плюс')  : \Yii::t('app', 'минус'), $math_init['op2']]) ?></small></label>
				<input type="number" class="form-control" name="FeedbackForm[math]" id="controlMath" value="">
			</div>
			<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-send"></span> <?= \Yii::t('app', 'Отправить') ?></button>
		</form>
	</div>
	<?php } else { ?>
	<div class="alert alert-success"><?= \Yii::t('app', 'Спасибо! Обратная связь с Клиентами помогает улучшить наш сервис.') ?></div>
	<?php
		$model->mail();
	} ?>
</div>
