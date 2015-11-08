<div class="container">
	<div class="page-header">
		<h1><?= \Yii::t('app', 'Условия и способы доставки') ?></h1>
	</div>
	<p><?= \Yii::t('app', 'Доставка осуществляется следующими способами:') ?></p>
	<?php if(Yii::$app->language == 'ru-RU') { ?>
	<ol>
		<li>Курьером по Санкт-Петербургу. Стоимость доставки <em>150 руб.</em>;</li>
		<li>
			<a href="https://pochta.ru/" target="_blank">Почтой Росии</a> в остальные регионы.
			<a href="https://pochta.ru/support/popular-questions/delivery-time-cost" target="_blank">Стоимость доставки</a> 
			смотрите на официальном сайте почты России. Там же Вы сможете при помощи 
			<a href="https://pochta.ru/support/popular-questions/products-location" target="_blank">трек-номера</a> <a href="https://pochta.ru/tracking" target="_blank">отслеживать</a> почтовое отправление.
			Примерный вес футболки <em>150–200</em> грамм.
		</li>
	</ol>
	<?php } else { ?>
		Courier of the United States. Cost <em>1 USD</em>
	<?php } ?>
</div>
