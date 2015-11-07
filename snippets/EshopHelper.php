<?php 
namespace app\helpers;

use Yii;
use yii\helpers\Url;

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
		if($needle == '/' && Yii::$app->urlManager->suffix != null) {
			$needle = 'index';
		}
		$route = Yii::$app->urlManager->parseRequest(Yii::$app->request)[0];
		return $route == $needle || strrpos($route, $needle) !== false;
	}
	
	public static function createUrl($page, $hash = null) {
		if($page == '/' && Yii::$app->urlManager->suffix != null) {
			$page = 'index';
		}
		$params[] = $page;
		if($hash !== null) {
			$params['#'] = ltrim($hash, '#');
		}
		return Yii::$app->request->hostInfo . Yii::$app->urlManager->createUrl($params);
	}
	
}
