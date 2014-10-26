<?php
$title = 'Способы оплаты';
require_once 'chunks/head.php';
require_once 'chunks/menu.php';
?>
<script type="text/javascript" src="js/crypt.min.js"></script>
<div class="container">
	<div class="page-header">
		<h1>Способы оплаты</h1>
	</div>
	<h3 id="details">Реквизиты</h3>
	<pre>ОГРНИП <script type="text/javascript">document.write(ebg0('000000000000000'));</script>
ИНН <script type="text/javascript">document.write(ebg0('000000000000'));</script></pre>
	<h5 data-toggle="collapse" data-target="#details-block" class="dropup"><span class="caret"></span> <span>Платежные реквизиты для зачисления денежных средств в российских рублях</span></h5>
	<pre id="details-block">Получатель: <?= CHtml::encode(Yii::app()->name) . "\n"; ?>
Счет получателя: <script type="text/javascript">document.write(ebg0('00000000000000000000'));</script>, Банк получателя: <a href="http://www.avangard.ru/rus/corporate/cashservice/" target="_blank">ОАО АКБ «АВАНГАРД»</a>,
ИНН <script type="text/javascript">document.write(ebg0('0000000000'));</script>, БИК <script type="text/javascript">document.write(ebg0('000000000'));</script>, Корреспондентский счет N <script type="text/javascript">document.write(ebg0('00000000000000000000'));</script>
Адрес банка получателя: 115035, г. Москва, Садовническая ул., д.12, стр. 1</pre>
</div>
<?php require_once 'chunks/footer.php' ?>