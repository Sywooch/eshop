<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * VipForm class.
 * VipForm is the data structure for keeping vip form data.
 */
class VipForm extends Model
{
	public $fio;
	public $phone;
	public $email;
	public $text;
	public $math;
	public $nospam;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return [
			[['fio', 'phone', 'email', 'text', 'math'], 'required'],
			['email', 'email'],
			['math', function ($attribute, $params) {
				if(Yii::$app->session['math'] != $this->$attribute) {
					$this->addError($attribute, \Yii::t('app', 'Вы неправильно заполнили ответ в поле защиты от спама.'));
				}
			}],
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
			'text'=>\Yii::t('app', 'Сообщение'),
			'math'=>\Yii::t('app', 'Защита от спама'),
		];
	}

	public function mathInit() {
		$math = [
			'op1' => mt_rand(50, 100),
			'op2' => mt_rand(1, 49),
			'operator' => mt_rand(0, 1),
		];
		Yii::$app->session['math'] = $math['operator'] == 0 ? $math['op1'] - $math['op2'] : $math['op1'] + $math['op2'];
		return $math;
	}
	
	public function mail() {
		if ($this->validate()) {
			/* Yii::$app->mailer->compose()
			->setTo(Yii::$app->params['email'])
			->setFrom([$this->email => $this->fio])
			->setSubject(\Yii::t('app', 'Заполнена форма заказа своего варианта футболки'))
			->setTextBody($this->text)
			->send();  */
			return true;
		}
		return false;
	}
}
