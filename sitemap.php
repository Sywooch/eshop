<?php
$title = 'Карта сайта';
require_once 'chunks/head.php';
require_once 'chunks/menu.php';
?>
<div class="container">
	<div class="page-header">
		<h1>Карта сайта</h1>
	</div>
	<ul>
		<li><a href="/<?php echo get_base_url($page); ?>">Каталог</a></li>
		<li><a href="cart.php">Корзина</a></li>
		<li><a href="how-to-buy.php">Где и как купить футболку</a></li>
		<li><a href="shipping.php">Условия и способы доставки</a></li>
		<li><a href="vip.php">Заказать свой вариант дизайна</a></li>
		<li><a href="payment.php">Способы оплаты</a></li>
		<li><a href="help.php">Таблицы размеров футболок</a></li>
		<li><a href="about.php">О компании</a></li>
		<li><a href="public-offer.php">Публичная оферта</a></li>
		<li><a href="feedback.php">Обратная связь</a></li>
		<li><a href="sitemap.php">Карта сайта</a></li>
		<li><a href="sitemap.xml">sitemap.xml</a></li>
	</ul>
</div>
<?php require_once 'chunks/footer.php' ?>