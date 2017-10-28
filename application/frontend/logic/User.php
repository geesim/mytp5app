<?php
namespace app\frontend\logic;

use app\frontend\logic\Common;
use app\frontend\model\User as UserModel;

/** 
* User.php 
* user logic class 
*
* @author      geesim<geesim126@gmail.com> 
* @version     1.0.1
* @since       1
*/ 
class User extends Common
{
    //
    protected $userModel;

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
        $this->userModel = new UserModel;
    } 
	/**   
	* @desc use login
	* 
	* @access public 
	* @param mix $loginField username or email or phone
	* @author geesim<geesim126@gmail.com>
	* @datetime 2017-10-22
	* @return mixed 
	*/ 
	public function signIn($signInField, $pwd)
	{
		$result = false;
		
		$userInfo = $this->userModel->getUserInfoBySignInField($signInField);

		if($userInfo && saltPwd($pwd, $userInfo['salt']) === $userInfo['pwd'])
        {
            //store userInfo in session
            \think\Session::set('userInfo', $userInfo);
			$result = $userInfo;
		}
		
		return $result;	
	}

	/**   
	* @desc rememberMe
	* 
	* @access public
	* @param int arg desc
	* @author geesim<geesim126@gmail.com>
	* @datetime alt+d
	* @return \think\Response 
	*/ 
	public function rememberMe($signInField,$pwd)
	{
        $expireTime = time()+3600*24*7;
		$tc         = md5($signInField.'#'.$expireTime.'#'.$pwd);
		$vrm        = base64_encode($signInField.'#'.$expireTime.'#'.$tc);
        \think\Cookie::set('vrm', $vrm, $expireTime);
	}

    /**   
    * @desc verify the cookie to login
    * 
    * @access protected 
    * @author geesim<geesim126@gmail.com>
    * @datetime alt+d
    * @return \think\Response 
    */ 
    public function verifyRememberMe()
    {
        $result = (boolean)\think\Session::get('userInfo');

        //cookie vrm means  Verify Remember Me (first letter)
        //tc means token code
        if(!$result && \think\Cookie::get('vrm'))
        {
            $rmc = base64_decode(\think\Cookie::get('vrm'));
            list($signInField, $expireTime, $tc) = explode('#', $rmc);
            if($expireTime > time())
            {
                $userInfo = $this->userModel->getUserInfoBySignInField($signInField);
                $result = $userInfo && $tc === md5($signInField.'#'.$expireTime.'#'.$userInfo['pwd']);
                
                //store user infomation
                $result && \think\Session::set('userInfo', $userInfo);
            }
        }

        return $result;
    }

    /**   
     * @desc sign up 
     * 
     * @access public 
     * @param array $data data input
     * @author geesim<geesim126@gmail.com>
     * @datetime alt+d
     * @return \think\Response 
     */ 
     public function signUp($data)
     {  
        $data['salt'] = salt();
        $data['pwd']   = saltPwd($data['pwd'], $data['salt']);
        $result = $this->userModel->signUp($data);
        if($result){
            \think\Session::set('userInfo', $result);
        }
        return $result;
     } 

}