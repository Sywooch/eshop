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
		]
	],
	'params' => [
		'phone' => '',
		'email' => '',
		'VK.init.apiId' => 0, // http://vk.com/dev/Like
		'VK.Widgets.Group' => 0, // http://vk.com/dev/Community
		'VK.group' => '', // example: https://vk.com/dev.earthperson
	],
];
