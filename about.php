<?php
$title = 'О компании';
require_once 'chunks/head.php';
require_once 'chunks/menu.php';
?>
<script type="text/javascript">
<?php require_once 'chunks/crypt.min.js' ?>
</script>
<div class="container">
	<div class="page-header">
		<h1>О компании</h1>
	</div>
	<h3>О дизайне</h3>
	<p>В основном, если только Вы не заказали <a href="vip.php">свой вариант</a> дизайна,
	футболки от <?php echo CHtml::encode(Yii::app()->name); ?> - это футболки с различными персонажами из живой природы.</p>
	<h3 id="details">Реквизиты</h3>
	<pre>ОГРНИП <script type="text/javascript">document.write(ebg0('000000000000000'));</script>
ИНН <script type="text/javascript">document.write(ebg0('000000000000'));</script></pre>
	<h5 data-toggle="collapse" data-target="#details-block" class="dropup"><span class="caret"></span> <span>Платежные реквизиты для зачисления денежных средств в российских рублях</span></h5>
	<pre id="details-block">Получатель: <?php echo CHtml::encode(Yii::app()->name) . "\n"; ?>
Счет получателя: <script type="text/javascript">document.write(ebg0('00000000000000000000'));</script>, Банк получателя: <a href="http://www.avangard.ru/rus/corporate/cashservice/" target="_blank">ОАО АКБ «АВАНГАРД»</a>,
ИНН <script type="text/javascript">document.write(ebg0('0000000000'));</script>, БИК <script type="text/javascript">document.write(ebg0('000000000'));</script>, Корреспондентский счет N <script type="text/javascript">document.write(ebg0('00000000000000000000'));</script>
Адрес банка получателя: 115035, г. Москва, Садовническая ул., д.12, стр. 1</pre>
	<br>
	<!-- VK Widget -->
	<div id="vk_groups"></div>
	<script type="text/javascript">
	VK.Widgets.Group("vk_groups", {mode: 0, width: "220", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, <?php echo Yii::app()->params['VK.Widgets.Group']; ?>);
	</script>
	<br><br>
</div>
<?php require_once 'chunks/footer.php' ?>