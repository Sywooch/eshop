<?php use yii\helpers\Html; ?>
<script type="text/javascript" src="js/crypt.min.js"></script>
<div class="container">
	<div class="page-header">
		<h1><?= \Yii::t('app', 'Способы оплаты') ?></h1>
	</div>
	<h3 id="details"><?= \Yii::t('app', 'Реквизиты') ?></h3>
	<pre><?= \Yii::t('app', 'ОГРНИП') ?> <script type="text/javascript">document.write(ebg0('000000000000000'));</script>
<?= \Yii::t('app', 'ИНН') ?> <script type="text/javascript">document.write(ebg0('000000000000'));</script></pre>
	<h5 data-toggle="collapse" data-target="#details-block" class="dropup"><span class="caret"></span> <span><?= \Yii::t('app', 'Платежные реквизиты для зачисления денежных средств в российских рублях') ?></span></h5>
	<pre id="details-block"><?= \Yii::t('app', 'Получатель:') ?> <?= Html::encode(Yii::$app->name) . "\n" ?>
<?= \Yii::t('app', 'Счет получателя:') ?> <script type="text/javascript">document.write(ebg0('00000000000000000000'));</script>, <?= \Yii::t('app', 'Банк получателя: <a href="http://www.avangard.ru/rus/corporate/cashservice/" target="_blank">ОАО АКБ «АВАНГАРД»</a>,') ?> 
<?= \Yii::t('app', 'ИНН') ?> <script type="text/javascript">document.write(ebg0('0000000000'));</script>, <?= \Yii::t('app', 'БИК') ?> <script type="text/javascript">document.write(ebg0('000000000'));</script>, <?= \Yii::t('app', 'Корреспондентский счет №') ?> <script type="text/javascript">document.write(ebg0('00000000000000000000'));</script>
<?= \Yii::t('app', 'Адрес банка получателя: 115035, г. Москва, Садовническая ул., д.12, стр. 1') ?></pre>
</div>
