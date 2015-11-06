<?php 
use yii\helpers\Html; 
use app\helpers\EshopHelper;
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
			<a class="navbar-brand" href="<?= EshopHelper::createUrl('/') ?>" title="<?= Html::encode(Yii::$app->name) ?>">
				<img src="images/logo.png" alt="<?= Html::encode(Yii::$app->name) ?>" width="72" height="32">
			</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-home"></span> Каталог <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php if(EshopHelper::isCurrent('')) { ?>
							<li><a href="#top">Главная страница</a></li>
							<li><a href="#bestsellers">Хиты продаж</a></li>
							<li><a href="#shop">Основной каталог</a></li>
						<?php } else { ?>
							<li><a href="<?= EshopHelper::createUrl('/') ?>">Главная страница</a></li>
							<li><a href="<?= EshopHelper::createUrl('/', '#bestsellers') ?>">Хиты продаж</a></li>
							<li><a href="<?= EshopHelper::createUrl('/', '#shop') ?>">Основной каталог</a></li>
						<?php } ?>
					</ul>
				</li>
				<?php if(!EshopHelper::isCurrent('cart')) { ?>
				<li><a href="<?= EshopHelper::createUrl('cart') ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</a></li>
				<?php } ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Навигация по сайту <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php if(!EshopHelper::isCurrent('')) { ?>
						<li><a href="<?= EshopHelper::createUrl('/') ?>"><span class="glyphicon glyphicon-home"></span> Главная страница</a></li>
						<li><a href="<?= EshopHelper::createUrl('/', '#bestsellers') ?>">Хиты продаж</a></li>
						<li><a href="<?= EshopHelper::createUrl('/', '#shop') ?>">Основной каталог</a></li>
						<?php } else { ?>
						<li><a href="#bestsellers">Хиты продаж</a></li>
						<li><a href="#shop">Основной каталог</a></li>
						<?php } if(!EshopHelper::isCurrent('cart')) { ?>
						<li><a href="<?= EshopHelper::createUrl('cart') ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</a></li>
						<?php } if(!EshopHelper::isCurrent('how-to-buy')) { ?>
						<li><a href="<?= EshopHelper::createUrl('how-to-buy') ?>">Где и как купить футболку</a></li>
						<?php } if(!EshopHelper::isCurrent('shipping')) { ?>
						<li><a href="<?= EshopHelper::createUrl('shipping') ?>">Условия и способы доставки</a></li>
						<?php } if(!EshopHelper::isCurrent('vip')) { ?>
						<li><a href="<?= EshopHelper::createUrl('vip') ?>">Заказать свой вариант дизайна</a></li>
						<?php } if(!EshopHelper::isCurrent('payment')) { ?>
						<li><a href="<?= EshopHelper::createUrl('payment') ?>">Способы оплаты</a></li>
						<?php } if(!EshopHelper::isCurrent('help')) { ?>
						<li><a href="<?= EshopHelper::createUrl('help') ?>"><span class="glyphicon glyphicon-flag"></span> Таблицы размеров футболок</a></li>
						<?php } ?>
						<li class="divider"></li>
						<?php if(!EshopHelper::isCurrent('about')) { ?>
						<li><a href="<?= EshopHelper::createUrl('about') ?>">О компании</a></li>
						<?php } ?>
						<li><a href="<?= Yii::$app->params['VK.group'] ?>" target="_blank">Группа ВКонтакте</a></li>
						<?php if(!EshopHelper::isCurrent('sitemap')) { ?>
						<li class="divider"></li>
						<li><a href="<?= EshopHelper::createUrl('sitemap') ?>">Карта сайта</a></li>
						<?php } ?>
					</ul>
				</li>
			</ul>
			<span class="pull-right">Телефон: <?= Yii::$app->params['phone'] ?></span>
		</div><!--/.nav-collapse -->
	</div>
</div>
