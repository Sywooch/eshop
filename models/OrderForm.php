<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * OrderForm class.
 * OrderForm is the data structure for keeping order form data.
 */
class OrderForm extends Model
{
	public $fio;
	public $phone;
	public $email;
	public $text;
	public $nospam;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return [
			[['fio', 'phone', 'email', 'text'], 'required'],
			['email', 'email'],
			['nospam', 'compare', 'compareValue' => ''],
		];
	} 

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return [
			'fio'=>\Yii::t('app', 'ФИО') ,
			'phone'=>\Yii::t('app', 'Телефон'),
			'email'=>\Yii::t('app', 'Email'),
			'text'=>\Yii::t('app', 'Комментарий') 
		];
	}
	
	public function mail($order_id) {
		if ($this->validate()) {
			/* Yii::$app->mailer->compose()
			->setTo($this->email)
			->setFrom([Yii::$app->params['email'] => Yii::$app->name])
			->setSubject(\Yii::t('app', 'Ваш заказ №{0} успешно отправлен.', $order_id))
			->setTextBody()
			->send(); */
			return true;
		}
		return false;
	}
	
}
