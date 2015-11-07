<?php 
use yii\helpers\Html;
use app\helpers\EshopHelper;
?>
<script type="text/javascript" src="js/crypt.min.js"></script>
<div class="container">
	<div class="page-header">
		<h1><?= \Yii::t('app', 'О компании') ?></h1>
	</div>
	<h3><?= \Yii::t('app', 'О дизайне') ?></h3>
	<p><?= \Yii::t('app', 'В основном, если только Вы не заказали <a href="{0}">свой вариант</a> дизайна, футболки от {1} — это футболки с различными персонажами из живой природы.', [EshopHelper::createUrl('vip'), Html::encode(Yii::$app->name)]) ?></p>
	<h3 id="details"><?= \Yii::t('app', 'Реквизиты') ?></h3>
	<pre><?= \Yii::t('app', 'ОГРНИП') ?> <script type="text/javascript">document.write(ebg0('000000000000000'));</script>
<?= \Yii::t('app', 'ИНН') ?> <script type="text/javascript">document.write(ebg0('000000000000'));</script></pre>
	<h5 data-toggle="collapse" data-target="#details-block" class="dropup"><span class="caret"></span> <span><?= \Yii::t('app', 'Платежные реквизиты для зачисления денежных средств в российских рублях') ?></span></h5>
	<pre id="details-block"><?= \Yii::t('app', 'Получатель:') ?> <?= Html::encode(Yii::$app->name) . "\n" ?>
<?= \Yii::t('app', 'Счет получателя:') ?> <script type="text/javascript">document.write(ebg0('00000000000000000000'));</script>, <?= \Yii::t('app', 'Банк получателя: <a href="http://www.avangard.ru/rus/corporate/cashservice/" target="_blank">ОАО АКБ «АВАНГАРД»</a>,') ?> 
<?= \Yii::t('app', 'ИНН') ?> <script type="text/javascript">document.write(ebg0('0000000000'));</script>, <?= \Yii::t('app', 'БИК') ?> <script type="text/javascript">document.write(ebg0('000000000'));</script>, <?= \Yii::t('app', 'Корреспондентский счет №') ?> <script type="text/javascript">document.write(ebg0('00000000000000000000'));</script>
<?= \Yii::t('app', 'Адрес банка получателя: 115035, г. Москва, Садовническая ул., д.12, стр. 1') ?></pre>
	<br>
	<!-- VK Widget -->
	<div id="vk_groups"></div>
	<script type="text/javascript">
	VK.Widgets.Group("vk_groups", {mode: 0, width: "220", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, <?= Yii::$app->params['VK.Widgets.Group'] ?>);
	</script>
	<br><br>
</div>
