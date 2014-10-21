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
function get_base_url($page) {
	return substr($page, 0, strrpos($page, '/'));
}
function is_current($page, $needle) {
	return strrpos($page, $needle) !== false;
}
