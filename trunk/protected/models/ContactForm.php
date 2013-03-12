<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $subject;
	public $body;
	public $verifyCode;

    public $address;
    public $company;
    public $mobile;
    public $zip;

    public function attributeLabels()
    {
        return array(
            'name' => '姓　　名',
            'email' => '电子邮箱',
            'subject' => '主　　题',
            'body' => '信件内容',
            'verifyCode' => '验证码',
            'address' => '通讯地址',
            'company' => '单　　位',
            'mobile' => '联系电话',
            'zip' => '邮政编码',
        );
    }

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, subject, body', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd')),
            array('name, email, subject, body, verifyCode, address, company, mobile, zip', 'safe'),
		);
	}

}