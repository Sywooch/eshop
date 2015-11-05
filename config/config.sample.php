<?php
return [
	'id' => 'basic',
	'language' => 'ru',
	'basePath' => dirname(dirname(__FILE__)),
	'name' => 'eshop',
	'components' => [
		'db' => [
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=localhost;dbname=dbname',
			'emulatePrepare' => true,
			'username' => '',
			'password' => '',
			'charset' => 'utf8',
		],
		'session' => [
			'timeout' => 3600 * 24
		],
		'urlManager' => [
			'urlFormat' => 'path',
			'showScriptName' => false,
			'urlSuffix' => '.html'
		],
	],
	'params' => [
		'phone' => '',
		'email' => '',
		'VK.init.apiId' => 0, // http://vk.com/dev/Like
		'VK.Widgets.Group' => 0, // http://vk.com/dev/Community
		'VK.group' => '', // example: https://vk.com/dev.earthperson
		'description' => 'Простой каркас для интернет-магазина',
		'pages' => [
			'/' => 'Каталог',
			'cart' => 'Корзина',
			'how-to-buy' => 'Где и как купить футболку',
			'shipping' => 'Условия и способы доставки',
			'vip' => 'Заказать свой вариант дизайна',
			'payment' => 'Способы оплаты',
			'help' => 'Таблицы размеров футболок',
			'about' => 'О компании',
			'public-offer' => 'Публичная оферта',
			'feedback' => 'Обратная связь',
			'sitemap' => 'Карта сайта',
		]
	],
];
