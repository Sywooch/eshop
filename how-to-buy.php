<?php
$title = 'Где и как купить футболку';
require_once 'chunks/head.php';
require_once 'chunks/menu.php';
?>
<script type="text/javascript" src="js/crypt.min.js"></script>
<div class="container">
	<div class="page-header">
		<h1>Где и как купить футболку</h1>
	</div>
	<p>Приобрести футболку можно следующими способами:</p>
	<ol>
		<li>Воспользовавшись этим сайтом (подробные инструкции см. ниже);</li>
		<li>Написав сообщение администраторам <a href="<?= Yii::app()->params['VK.group']; ?>" target="_blank"><img src="images/vk.com.jpg" width="16" height="16" alt="" title="Группа ВКонтакте"></a> <a href="<?= Yii::app()->params['VK.group']; ?>" target="_blank">группы ВКонтакте</a>;</li>
		<li>Позвонив по телефону <em><?= Yii::app()->params['phone']; ?></em>;</li>
		<li>Написав письмо на почту <?= Yii::app()->params['email']; ?> в свободной форме с указанием Ваших координат и ФИО.</li>
	</ol>
	<p>Отзывы о нас читайте на стене <a href="<?= Yii::app()->params['VK.group']; ?>" target="_blank"><img src="images/vk.com.jpg" width="16" height="16" alt="" title="Группа ВКонтакте"></a> <a href="<?= Yii::app()->params['VK.group']; ?>" target="_blank">группы ВКонтакте</a>.</p>
	<h2>Подробные инструкции по использованию сайта</h2>
	<p><span class="label label-info">Внимание!</span> Вы можете просмотреть <a href="#" class="how-to-buy-video"><span class="glyphicon glyphicon-flag"></span> видео</a> и <a href="#" class="how-to-buy-gallery"><span class="glyphicon glyphicon-flag"></span> галерею скриншотов</a> процесса покупки.</p>
	<ul>
		<li>Положите футболки <a href="cart.php">в корзину</a> выбрав те, которые Вам нравятся. Для футболок относящихся к хитам продаж 
		вы можете листая влево и вправо список вверху главной страницы указать количество и размер и затем нажать на кнопку «Положить в корзину». Остальные футболки можно положить
		одним нажатем на кнопку «Положить в корзину», а количество и размер отредактировать уже в корзине;</li>
		<li>Просмотрите и в случае необходимости обновите корзину нажимая кнопки «<span class="glyphicon glyphicon-pencil"></span> Обновить» или «<span class="glyphicon glyphicon-remove"></span> Удалить» позицию. Здесь же Вы можете отредактировать надпись на футболке нажав на <span class="glyphicon glyphicon-pencil"></span> в колонке «Надпись» напротив каждой позиции
		 и указать хотите ли Вы, чтобы в правом нижнем углу футболки была ссылка на группу ВКонтакте (это дает <em>10%</em> скидку) отметив соответствующий чекбокс в колонке «Ссылка на группу» напротив каждой позиции. Ваши футболки хранятся в корзине в течении одного дня;</li>
		<li>Нажмите «Оформить заказ»;</li>
		<li>Заполните свои контактные данные, ФИО и желательное время для звонка менеджера в случае доставки курьером;</li>
		<li>Нажмите «Отправить заказ» и Ваш заказ будет отправлен менеджеру. В случае, если Вы верно указали свои контактные данные и ФИО менеджер перезвонит или отпишется Вам в удобное для Вас время;</li>
		<li>Также вы можете оформить заказ у наших партнеров и распространителей флаеров;</li>
		<li>Вы можете внести предоплату через этот сайт. Подробнее читайте на странице <a href="payment.php">Способы оплаты</a>.</li>
		<li>Спасибо, что выбрали футболки от  <?= CHtml::encode(Yii::app()->name); ?>. В этих футболках у Вас всегда будет хорошее настроение!</li>
	</ul>
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
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Предыдущее
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Следующее
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'chunks/footer.php' ?>
