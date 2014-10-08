<?php
return array(
	'language'=>'ru',
	'basePath'=>dirname(dirname(__FILE__)),
	'name'=>'eshop',
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=dbname',
			'emulatePrepare' => true,
			'username' => '',
			'password' => '',
			'charset' => 'utf8',
		),
		'session'=>array(
			'timeout' => 3600 * 24
		)
	),
	'params' => array(
		'phone' => '',
		'email' => '',
		'VK.init.apiId' => '""',
		'VK.Widgets.Group' => '""',
		'VK.group' => '',
	),
);
