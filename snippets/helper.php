<?php 
function get_size_array() {
	return ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
}
function price_format($price) {
	return number_format($price, 2, ',', ' ');
}
function get_hash_for_sql() {
	return Yii::app()->db->quoteValue(
		sha1(
			Yii::app()->session->sessionID . 
			(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '-') .
			(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '-')
		)
	);
}
function get_absolute_url() {
	return Yii::app()->request->hostInfo;
}
function is_current($needle) {
	$route = Yii::app()->getUrlManager()->parseUrl(Yii::app()->getRequest());
	return $route == $needle || strrpos($route, $needle) !== false;
}
function create_url($page, $hash = null) {
	$params = array();
	if($hash !== null) {
		$params = array(
			'#' => ltrim($hash, '#')
		);
	}
	return get_absolute_url() . Yii::app()->getUrlManager()->createUrl($page, $params);
}
