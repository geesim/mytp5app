<?php
namespace app\frontend\service;

use app\frontend\service\Common;
use app\frontend\logic\User as LogicUser;
/** 
* User.php 
* User service model
*
* @author      geesim<geesim126@gmail.com> 
* @version     1.0.1
* @since       1
*/ 
class User extends Common
{

	private $userLogic;

	/**   
	* @desc initialize
	* 
	* @access protected 
	* @author geesim<geesim126@gmail.com>
	* @datetime alt+d
	* @return \think\Response 
	*/ 
	protected function initialize()
	{
		parent::initialize();
		$this->userLogic = new LogicUser;
		$this->userLogic->verifyRememberMe();
	}

	/**   
	* @desc login service 
	* 
	* @access public
	* @param array $data login post data
	* @author geesim<geesim126@gmail.com>
	* @datetime alt+d
	* @return \think\Response 
	*/
	public function signInService($data)
	{
		$result = $this->userLogic->signIn($data['signInField'], $data['pwd']);
		if($result && $data['rememberMe'] === true)
		{
			$this->userLogic->rememberMe($data['signInField'],$data['pwd']);
		}
		return $result;
	}
	
	/**   
	* @desc sign up service
	* 
	* @access public 
	* @param array $data sigu infomation
	* @author geesim<geesim126@gmail.com>
	* @datetime 2017-10-25
	* @return \think\Response 
	*/ 
	public function signUpService($data)
	{
		return $this->userLogic->signUp($data);
	}

	/**   
	* @desc verify Remember me service
	* 
	* @access public
	* @author geesim<geesim126@gmail.com>
	* @datetime alt+d
	* @return \think\Response 
	*/
	public function verifyRememberMeService(){
		return $this->userLogic->verifyRememberMe();
	} 
}
