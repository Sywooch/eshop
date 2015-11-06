<?php 
namespace yii\helpers;

use Yii;

class EshopHelper {
	
	/**
	 * https://en.wikipedia.org/wiki/Clothing_sizes
	 * 
	 */
	public static function getClothingSizes() {
		return ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
	}
	
	public static function priceFormat($price) {
		return number_format($price, 2, ',', ' ');
	}
	
	public static function getHashForSql() {
		return Yii::$app->db->quoteValue(
			sha1(
				Yii::$app->session->id . 
				(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '-') .
				(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '-')
			)
		);
	}
	
	public static function isCurrent($needle) {
		/* $route = Yii::$app->getUrlManager()->parseUrl(Yii::$app->getRequest());
		return $route == $needle || strrpos($route, $needle) !== false; */
	}
	
	public static function createUrl($page, $hash = null) {
		/* $params = array();
		if($hash !== null) {
			$params = array(
				'#' => ltrim($hash, '#')
			);
		}
		return Yii::$app->request->hostInfo . Yii::$app->getUrlManager()->createUrl($page, $params); */
	}
	
}
