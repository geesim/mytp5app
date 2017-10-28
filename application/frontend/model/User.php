<?php
namespace app\frontend\model;

use app\frontend\model\Common;
use app\component\model\cache\User as UserCache;
/** 
* User.php 
* user model 
*
* @author      geesim<geesim126@gmail.com> 
* @version     1.0.1
* @since       1
*/ 
class User extends Common
{
    //
    private $sserCache;
    /**   
    * @desc initialize
    * 
    * @access protected 
    * @author geesim<geesim126@gmail.com>
    * @datetime alt+d
    * @return \think\Response 
    */ 
    public function initialize()
    {
        parent::initialize();
        $this->userCache = new UserCache;        
    }

    /**   
    * @desc get userInfo by id
    * 
    * @access public 
    * @param int $id id primary key of user table
    * @author geesim<geesim126@gmail.com>
    * @datetime alt+d
    * @return \think\Response 
    */ 
    public function getUserInfoById($id)
    {
        $userInfo  = $this->userCache->cacheInfoById($id);
        if(!$userInfo){
            $userInfo = User::get(['id' => $id]);
            if($userInfo){
                $this->userCache->cacheInfoById(md5($id), $userInfo);
            }
        }
        return $userInfo;
    }
    /**   
    * @desc get user infomation by username or email or phone
    *       return Object or Null
    * 
    * @access pubiic
    * @param mix $value (username|email|phone)
    * @author geesim<geesim126@gmail.com>
    * @datetime 2017-10-23
    * @return mixed 
    */ 
    public function getUserInfoBySignInField($value)
    {
        $userInfo = $this->userCache->cacheInfoBySignInField(md5($value));
        if(!$userInfo){
            $userInfo = User::get(['username|email|phone' => $value]);
            if($userInfo){
                $this->userCache->cacheInfoBySignInField(md5($value), $userInfo);
            }
        }
    	return $userInfo;
    }

    /**   
    * @desc signUp
    * 
    * @access public 
    * @param array $data signUp data
    * @author geesim<geesim126@gmail.com>
    * @datetime alt+d
    * @return \think\Response 
    */ 
    public function signUp($data = [])
    {
        $userModel = new User;
        //validate data
        $result = $userModel->validate('User.signUp')->allowField(true)->save($data);
        if($result){
            $result = $userModel->getUserInfoById($userModel->id);
        }
        return $result;
    }
}
