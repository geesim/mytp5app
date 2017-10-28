<?php

namespace app\component\model\cache;

use app\component\model\cache\Common;

class User extends Common
{
    //constant
    const USER_INFO_BY_ID  = 'userInfoById_';
    const SIGN_IN_By_FIELD = 'signInByField_';
    /**   
    * @desc initialize
    * 
    * @access protected 
    * @author geesim<geesim126@gmail.com>
    * @datetime 2017-10-25
    */ 
    protected function initialize()
    {
        parent::initialize();
        if($this->useRedis){
            $this->readCache = $this->initCache('readRedis');
        }
    }

    /**   
    * @desc cache/get user infomation 
    * 
    * @access public
    * @param int $id 
    * @param mixed $data
    * @param string $expire expire timestamp   
    * @author geesim<geesim126@gmail.com>
    * @datetime 2017-10-22
    * @return \think\Response 
    */ 
    public function cacheInfoById($keyName, $data = null, $expire = null)
    {
        return $this->cacheData(self::USER_INFO_BY_ID.$keyName, $data, $expire); 
    }

    /**   
    * @desc cache/get user infomation 
    * 
    * @access public
    * @param string $key key name   (.md5($signInField))
    * @param mixed $data 
    * @param string $expire expire timestamp 
    * @author geesim<geesim126@gmail.com>
    * @datetime 2017-10-22
    * @return \think\Response 
    */ 
    public function cacheInfoBySignInField($keyName, $data = null, $expire = null)
    {
        return $this->cacheData(self::SIGN_IN_By_FIELD.$keyName, $data, $expire); 
    }
}
