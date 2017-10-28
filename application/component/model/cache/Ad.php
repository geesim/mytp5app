<?php
namespace app\component\model\cache;

use app\component\model\cache\Common;

/** 
* Ad.php 
* advertise component cache model 
*
* @author      geesim<geesim126@gmail.com> 
* @version     1.0.1
* @since       1
*/ 
class Ad extends Common
{
    //constant
    const ADS_IN_TYPE_KEY = 'adsInType_';
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
    * @desc cache ads data by type id
    * 
    * @access public
    * @param int $typeId advertise type id
    * @param mixed $data ad data
    * @param int $withCommonAd 1:yes  0:without
    * @author geesim<geesim126@gmail.com>
    * @datetime alt+d
    * @return \think\Response 
    */ 
    public function cacheAdsInType($typeId, $data = null, $withCommonAd = 1, $expire = null)
    {
        return $this->cacheData(ADS_IN_TYPE_KEY.$typeId.'_'.$withCommonAd, $data, $expire);
    }
}