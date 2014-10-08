<?php
/**
 * OrderForm class.
 * OrderForm is the data structure for keeping order form data.
 */
class OrderForm extends CFormModel
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
		return array(
			array('fio, email, phone, text', 'required'),
			array('email', 'email'),
			array('nospam', 'compare', 'compareValue' => ''),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'fio'=>'ФИО',
			'phone'=>'Телефон',
			'text'=>'Комментарий'
		);
	}
	
}
