<?php

namespace app\component\model\cache;

use think\Model;

class Common extends Model
{
    //
    protected $writeCache;
    protected $readCache;
    protected $useRedis = true;
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

        if(!extension_loaded('redis')){
            $this->useRedis = false;
            $this->$readCache = $this->writeCache = $this->initCache('file');
        }else{
            $this->writeCache = $this->initCache('writeRedis');
        }
        
    }

    /**   
    * @desc set Redis server
    * 
    * @access protected 
    * @param string $serverName read redis server alias name
    * @author geesim<geesim126@gmail.com>
    * @datetime 2017-10-24
    * @return Object 
    */ 
    public function initCache($serverName)
    {
        return \think\Cache::init(Config('cache.'.$serverName));
    }

    /**   
    * @desc cache data common function
    * 
    * @access public 
    * @param string $keyName cache key
    * @param mixed $data data
    * @param int $expire expire timestamp
    * @author geesim<geesim126@gmail.com>
    * @datetime alt+d
    * @return \think\Response 
    */ 
    public function cacheData($keyName, $data = null, $expire)
    {
        $result = false;
        if($data)
        {
            
            $result = $this->writeCache->set($keyName, $data, $expire);
        }

        if($result)
        {
            return $result;
        }

        $result = $this->readCache->get($keyName);
        return $result;
    }
}
