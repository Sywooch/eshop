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
			<a class="navbar-brand" href="<?= create_url('/') ?>" title="<?= CHtml::encode(Yii::app()->name) ?>">
				<img src="images/logo.png" alt="<?= CHtml::encode(Yii::app()->name) ?>" width="72" height="32">
			</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-home"></span> Каталог <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php if(is_current('index')) { ?>
							<li><a href="#top">Главная страница</a></li>
							<li><a href="#bestsellers">Хиты продаж</a></li>
							<li><a href="#shop">Основной каталог</a></li>
						<?php } else { ?>
							<li><a href="<?= create_url('/') ?>">Главная страница</a></li>
							<li><a href="<?= create_url('/', '#bestsellers') ?>">Хиты продаж</a></li>
							<li><a href="<?= create_url('/', '#shop') ?>">Основной каталог</a></li>
						<?php } ?>
					</ul>
				</li>
				<?php if(!is_current('cart')) { ?>
				<li><a href="<?= create_url('cart') ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</a></li>
				<?php } ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Навигация по сайту <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php if(!is_current('index')) { ?>
						<li><a href="<?= create_url('/') ?>"><span class="glyphicon glyphicon-home"></span> Главная страница</a></li>
						<li><a href="<?= create_url('/', '#bestsellers') ?>">Хиты продаж</a></li>
						<li><a href="<?= create_url('/', '#shop') ?>">Основной каталог</a></li>
						<?php } else { ?>
						<li><a href="#bestsellers">Хиты продаж</a></li>
						<li><a href="#shop">Основной каталог</a></li>
						<?php } if(!is_current('cart')) { ?>
						<li><a href="<?= create_url('cart') ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</a></li>
						<?php } if(!is_current('how-to-buy')) { ?>
						<li><a href="<?= create_url('how-to-buy') ?>">Где и как купить футболку</a></li>
						<?php } if(!is_current('shipping')) { ?>
						<li><a href="<?= create_url('shipping') ?>">Условия и способы доставки</a></li>
						<?php } if(!is_current('vip')) { ?>
						<li><a href="<?= create_url('vip') ?>">Заказать свой вариант дизайна</a></li>
						<?php } if(!is_current('payment')) { ?>
						<li><a href="<?= create_url('payment') ?>">Способы оплаты</a></li>
						<?php } if(!is_current('help')) { ?>
						<li><a href="<?= create_url('help') ?>"><span class="glyphicon glyphicon-flag"></span> Таблицы размеров футболок</a></li>
						<?php } ?>
						<li class="divider"></li>
						<?php if(!is_current('about')) { ?>
						<li><a href="<?= create_url('about') ?>">О компании</a></li>
						<?php } ?>
						<li><a href="<?= Yii::app()->params['VK.group']; ?>" target="_blank">Группа ВКонтакте</a></li>
						<?php if(!is_current('sitemap')) { ?>
						<li class="divider"></li>
						<li><a href="<?= create_url('sitemap') ?>">Карта сайта</a></li>
						<?php } ?>
					</ul>
				</li>
			</ul>
			<span class="pull-right">Телефон: <?= Yii::app()->params['phone']; ?></span>
		</div><!--/.nav-collapse -->
	</div>
</div>
