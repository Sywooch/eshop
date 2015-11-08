<?php 
use yii\helpers\Html; 
use app\helpers\EshopHelper;
?>
<div class="container">
	<div class="page-header">
		<h1><?= \Yii::t('app', 'Где и как купить футболку') ?></h1>
	</div>
	<p><?= \Yii::t('app', 'Приобрести футболку можно следующими способами:') ?></p>
	<ol>
		<li><?= \Yii::t('app', 'Воспользовавшись этим сайтом (подробные инструкции см. ниже)') ?>;</li>
		<li><?= \Yii::t('app', 'Написать сообщение администраторам') ?> <a href="<?= Yii::$app->params['VK.group'] ?>" target="_blank"><img src="images/vk.com.jpg" width="16" height="16" alt="" title="<?= \Yii::t('app', 'Группа ВКонтакте') ?>"></a> <a href="<?= Yii::$app->params['VK.group'] ?>" target="_blank"><?= \Yii::t('app', 'группы ВКонтакте') ?></a>;</li>
		<li><?= \Yii::t('app', 'Позвонить по телефону') ?> <em><?= Yii::$app->params['phone'] ?></em>;</li>
		<li><?= \Yii::t('app', 'Написать письмо на почту {0} в свободной форме с указанием Ваших координат и ФИО', Yii::$app->params['email']) ?>.</li>
	</ol>
	<p><?= \Yii::t('app', 'Отзывы о нас читайте на стене') ?> <a href="<?= Yii::$app->params['VK.group'] ?>" target="_blank"><img src="images/vk.com.jpg" width="16" height="16" alt="" title="<?= \Yii::t('app', 'Группа ВКонтакте') ?>"></a> <a href="<?= Yii::$app->params['VK.group'] ?>" target="_blank"><?= \Yii::t('app', 'группы ВКонтакте') ?></a>.</p>
	<h2><?= \Yii::t('app', 'Подробные инструкции по использованию сайта') ?></h2>
	<p><span class="label label-info"><?= \Yii::t('app', 'Внимание!') ?></span> <?= \Yii::t('app', 'Вы можете просмотреть') ?> <a href="#" class="how-to-buy-video"><span class="glyphicon glyphicon-flag"></span> <?= \Yii::t('app', 'видео') ?></a> <?= \Yii::t('app', 'и') ?> <a href="#" class="how-to-buy-gallery"><span class="glyphicon glyphicon-flag"></span> <?= \Yii::t('app', 'галерею скриншотов') ?></a> <?= \Yii::t('app', 'процесса покупки.') ?></p>
	<ul>
		<li><?= \Yii::t('app', 'Положите футболки <a href="{0}">в корзину</a> выбрав те, которые Вам нравятся. Для футболок относящихся к хитам продаж вы можете листая влево и вправо список вверху главной страницы указать количество и размер и затем нажать на кнопку «Положить в корзину». Остальные футболки можно положить одним нажатем на кнопку «Положить в корзину», а количество и размер отредактировать уже в корзине;', EshopHelper::createUrl('cart')) ?></li>
		<li><?= \Yii::t('app', 'Просмотрите и в случае необходимости обновите корзину нажимая кнопки «<span class="glyphicon glyphicon-pencil"></span> Обновить» или «<span class="glyphicon glyphicon-remove"></span> Удалить» позицию. Здесь же Вы можете отредактировать надпись на футболке нажав на <span class="glyphicon glyphicon-pencil"></span> в колонке «Надпись» напротив каждой позиции и указать хотите ли Вы, чтобы в правом нижнем углу футболки была ссылка на группу ВКонтакте (это дает <em>10%</em> скидку) отметив соответствующий чекбокс в колонке «Печатать ссылку» напротив каждой позиции. Ваши футболки хранятся в корзине в течении одного дня;') ?></li>
		<li><?= \Yii::t('app', 'Нажмите «Оформить заказ»;') ?></li>
		<li><?= \Yii::t('app', 'Заполните свои контактные данные, ФИО и желательное время для звонка менеджера в случае доставки курьером;') ?></li>
		<li><?= \Yii::t('app', 'Нажмите «Отправить заказ» и Ваш заказ будет отправлен менеджеру. В случае, если Вы верно указали свои контактные данные и ФИО менеджер перезвонит или отпишется Вам в удобное для Вас время;') ?></li>
		<li><?= \Yii::t('app', 'Также вы можете оформить заказ у наших партнеров и распространителей флаеров;') ?></li>
		<li><?= \Yii::t('app', 'Вы можете внести предоплату через этот сайт. Подробнее читайте на странице <a href="{0}">способы оплаты</a>.', EshopHelper::createUrl('payment')) ?></li>
		<li><?= \Yii::t('app', 'Спасибо, что выбрали футболки от {0}. В этих футболках у Вас всегда будет хорошее настроение!', Html::encode(Yii::$app->name)) ?></li>
	</ul>
</div>
<div id="links" style="display: none;">
	<?php for($i = 1; $i < 10; $i++) { ?>
    	<a href="images/presentation/<?= $i ?>.png" title="<?= $i ?>" data-gallery></a>
    <?php } ?>
</div>
<!-- Modal screencast -->
<div class="modal fade" id="modalScreencast" tabindex="-1" role="dialog" aria-labelledby="modalScreencastLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="modalScreencastLabel"><?= \Yii::t('app', 'Видео') ?></h4>
			</div>
			<div class="modal-body">
				<video controls width="800" height="600" poster="http://earthperson.github.io/eshop/images/presentation/2.png">
					<source src="http://earthperson.github.io/eshop/images/presentation/screencast/eshop.webm" type="video/webm">
					<source src="http://earthperson.github.io/eshop/images/presentation/screencast/eshop.mp4" type="video/mp4">
					<source src="http://earthperson.github.io/eshop/images/presentation/screencast/eshop.ogv" type="video/ogv">
					<?= \Yii::t('app', 'Очень жаль, но Ваш браузер не поддерживает HTML5 видео в формате WebM с VP8 или MP4 с H.264.') ?>
				</video>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?= \Yii::t('app', 'Закрыть') ?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery"  class="blueimp-gallery blueimp-gallery-controls" data-use-bootstrap-modal="false">
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
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        	<?= \Yii::t('app', 'Предыдущее') ?>
                    </button>
                    <button type="button" class="btn btn-primary next">
                        	<?= \Yii::t('app', 'Следующее') ?>
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
			</div>
		</div>
	</div>
</div>
