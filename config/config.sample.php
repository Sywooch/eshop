<?php
return [
	'language' => 'ru',
	'basePath' => dirname(dirname(__FILE__)),
	'name' => 'eshop',
	'components' => [
		'db' => [
			'connectionString' => 'mysql:host=localhost;dbname=dbname',
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
