<?php

$params = require(__DIR__ . '/params.php');

return [
	'id' => 'basic',
	'language' => 'ru-RU',
	'basePath' => dirname(__DIR__),
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
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'suffix' => '.html'
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
		],
		'i18n' => [
			'translations' => [
				'app*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					//'basePath' => '@app/messages',
					'sourceLanguage' => 'ru-RU',
					'fileMap' => [
						'app' => 'app.php',
						'app/error' => 'error.php',
					],
				],
			],
		],
	],
	'params' => $params,
];
