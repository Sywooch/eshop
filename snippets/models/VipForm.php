<?php
/**
 * VipForm class.
 * VipForm is the data structure for keeping vip form data.
 */
class VipForm extends CFormModel
{
	public $fio;
	public $email;
	public $phone;
	public $text;
	public $math;
	
	public $nospam;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('fio, email, phone, text, math', 'required'),
			array('email', 'email'),
			array('math', 'mathOperation'),
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
			'text'=>'Сообщение',
			'math'=>'Защита от спама',
		);
	}

	public function mathOperation($attribute, $params) {
		if(Yii::app()->session['math'] != $this->$attribute) {
			$this->addError($attribute, 'Вы неправильно заполнили ответ в поле защиты от спама.');
		}
	}
	
	public function mathInit() {
		$math = array(
			'op1' => mt_rand(50, 100),
			'op2' => mt_rand(1, 49),
			'operator' => mt_rand(0, 1),
		);
		Yii::app()->session['math'] = $math['operator'] == 0 ? $math['op1'] - $math['op2'] : $math['op1'] + $math['op2'];
		return $math;
	}
}
