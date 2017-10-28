<?php
namespace app\frontend\validate;

use think\validate;

/** 
* User.php 
* user validator class 
*
* @author      geesim<geesim126@gmail.com> 
* @version     1.0.1
* @since       1
*/ 
class User extends Validate
{
	//define rules
	protected $rule = [
		'username' => 'require|max:30',
		'email'    => 'email',
        'pwd'      => 'require',
	];
    
    protected $message  =   [
        'username.require' => '名称必须',
        'username.max'     => '名称最多不能超过25个字符',
        'email'            => '邮箱格式错误',
        'pwd'              => '密码不能为空',    
    ];
    
    protected $scene = [
        'signUp' => ['username', 'email', 'pwd'],
    ];


}