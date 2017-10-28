<?php

namespace app\frontend\controller;

use app\frontend\controller\Common;
use app\frontend\service\User as UserService;
/** 
* User.php 
* user controller class 
*
* @author      geesim<geesim126@gmail.com> 
* @version     1.0.1
* @since       1
*/ 
class User extends Common
{
    private $userService;

    /**   
    * @desc initialize
    * 
    * @access protected 
    * @author geesim<geesim126@gmail.com>
    * @datetime alt+d
    */ 
    protected function initialize()
    {
        parent::initialize();
        $this->userService = new UserService;
    }
    /**   
    * @desc user login action
    * 
    * @access public
    * @author geesim<geesim126@gmail.com>
    * @datetime 2017-10-24
    * @return \think\Response 
    */
    public function signIn()
    {
        //redirect user to userCenter when has login
        //rememberMe verify
        if(\think\Session::get('userInfo'))
        {
        	$this->redirect('frontend/User/userCenter');
        }

        // get post data
        $data['signInField']  = input('post.signInField/s');
        $data['pwd']        = input('post.pwd/s');
        $data['rememberMe'] = input('post.rememberMe/b');
        $data['token']      = input('post.__token__/s');
        $data['loginType']  = input('post.loginType');

		if($data['token']){

			//user service model identify user
			$userInfo = $this->userService->signInService($data);

			if($userInfo){

				if(\think\Request::instance()->isAjax()){

					return ['code' => '1', 'data' => '', 'message' => 'Sign in success'];
				}

				$this->success('Sign in success!', 'frontend/User/userCenter');
			}
				
			$this->error('User name or password error');
			
		}
		

		return view('signIn');
	}

	/**   
	 * @desc sign up page
	 * 
	 * @access public
	 * @author geesim<geesim126@gmail.com>
	 * @datetime 2017-10-24
	 * @return \think\Response 
	 */
	public function signUp()
	{
		//get post data
		$data['username']  = input('post.username');
		$data['pwd']       = input('post.pwd');
		$data['email']     = input('post.email');
		$data['captcha']   = input('post.captcha');

		$randKey           = input('post.randKey');
		if($randKey)
		{
			$userService = new UserService;
			if($userService->signUpService($data)){
				if(\think\Request::instance()->isAjax()){
					return ['code' => 1, 'data' => '', 'message' => 'Sign Up success'];
				}
				$this->success('sign up sucess', 'frontend/User/usercenter');

			}

			$this->error('User registration failure');
		}
		return view('signUp', ['randKey' => randomToken()]);
	}

	/**   
	 * @desc user center page
	 * 
	 * @access public
	 * @author geesim<geesim126@gmail.com>
	 * @datetime 2017-10-24
	 * @return \think\Response 
	 */
	public function userCenter()
	{
		if(!\think\Session::get('userInfo'))
		{
			$this->error('You haven\'t login yet','frontend/User/signIn');
		}

		return view('userCenter');
	}

	/**   
	* @desc favorite page
	* 
	* @access public 
	* @author geesim<geesim126@gmail.com>
	* @datetime 2017-10-24
	* @return \think\Response 
	*/ 
	public function myFavorite()
	{
		return view('myFavorite');
	}

	/**   
	* @desc 
	* 
	* @access  
	* @param int arg desc
	* @author geesim<geesim126@gmail.com>
	* @datetime 2017-10-24
	* @return \think\Response 
	*/ 
	public function addressList()
	{
		return view('addressList');
	}  
}
