<?php
namespace app\frontend\logic;

use app\frontend\logic\Common;
use app\frontend\model\Ad as AdModel;

/** 
* Ad.php 
* advertise logic model
*
* @author      geesim<geesim126@gmail.com> 
* @version     1.0.1
* @since       1
*/ 
class Ad extends Common
{
    /**   
    * @desc get ads data by type id
    * 
    * @access public 
    * @param int $typeId advertise type id
    * @author geesim<geesim126@gmail.com>
    * @datetime alt+d
    * @return \think\Response 
    */  
    public function getIndexAds($typeId)
    {
        $adModel = new AdModel;
        $result  = $adModel->getAdsByTypeId($typeId); 
    }

}