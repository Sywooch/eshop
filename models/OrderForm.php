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
	public $email;
	public $phone;
	public $text;
	
	public $nospam;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return [
			['fio, email, phone, text', 'required'],
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
			'fio'=>'ФИО',
			'phone'=>'Телефон',
			'text'=>'Комментарий'
		];
	}
	
}
