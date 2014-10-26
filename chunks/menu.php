<?php 
$page = trim($_SERVER['PHP_SELF'], '/\\');
?>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container" id="top-nav">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Навигация по сайту</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/<?= get_base_url($page); ?>" title="<?= CHtml::encode(Yii::app()->name) ?>">
				<img src="images/logo.png" alt="<?= CHtml::encode(Yii::app()->name) ?>" width="72" height="32">
			</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-home"></span> Каталог <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php if(is_current($page, 'index')) { ?>
							<li><a href="#top">Главная страница</a></li>
							<li><a href="#bestsellers">Хиты продаж</a></li>
							<li><a href="#shop">Основной каталог</a></li>
						<?php } else { ?>
							<li><a href="/<?= get_base_url($page); ?>">Главная страница</a></li>
							<li><a href="index.php#bestsellers">Хиты продаж</a></li>
							<li><a href="index.php#shop">Основной каталог</a></li>
						<?php } ?>
					</ul>
				</li>
				<?php if(!is_current($page, 'cart')) { ?>
				<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</a></li>
				<?php } ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Навигация по сайту <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php if(!is_current($page, 'index')) { ?>
						<li><a href="/<?= get_base_url($page); ?>"><span class="glyphicon glyphicon-home"></span> Главная страница</a></li>
						<li><a href="index.php#bestsellers">Хиты продаж</a></li>
						<li><a href="index.php#shop">Основной каталог</a></li>
						<?php } else { ?>
						<li><a href="#bestsellers">Хиты продаж</a></li>
						<li><a href="#shop">Основной каталог</a></li>
						<?php } if(!is_current($page, 'cart')) { ?>
						<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</a></li>
						<?php } if(!is_current($page, 'how-to-buy')) { ?>
						<li><a href="how-to-buy.php">Где и как купить футболку</a></li>
						<?php } if(!is_current($page, 'shipping')) { ?>
						<li><a href="shipping.php">Условия и способы доставки</a></li>
						<?php } if(!is_current($page, 'vip')) { ?>
						<li><a href="vip.php">Заказать свой вариант дизайна</a></li>
						<?php } if(!is_current($page, 'payment')) { ?>
						<li><a href="payment.php">Способы оплаты</a></li>
						<?php } if(!is_current($page, 'help')) { ?>
						<li><a href="help.php"><span class="glyphicon glyphicon-flag"></span> Таблицы размеров футболок</a></li>
						<?php } ?>
						<li class="divider"></li>
						<?php if(!is_current($page, 'about')) { ?>
						<li><a href="about.php">О компании</a></li>
						<?php } ?>
						<li><a href="<?= Yii::app()->params['VK.group']; ?>" target="_blank">Группа ВКонтакте</a></li>
						<?php if(!is_current($page, 'sitemap')) { ?>
						<li class="divider"></li>
						<li><a href="sitemap.php">Карта сайта</a></li>
						<?php } ?>
					</ul>
				</li>
			</ul>
			<span class="pull-right">Телефон: <?= Yii::app()->params['phone']; ?></span>
		</div><!--/.nav-collapse -->
	</div>
</div>