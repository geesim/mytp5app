<?php
namespace app\frontend\model;

use app\frontend\model\Common;

/** 
* Ad.php 
* advertise model  
*
* @author      geesim<geesim126@gmail.com> 
* @version     1.0.1
* @since       1
*/ 
class Ad extends Common
{
    /**   
    * @desc getAdsByTypeId
    * 
    * @access public 
    * @param int $typeId advertise type_id
    * @author geesim<geesim126@gmail.com>
    * @datetime alt+d
    * @return \think\Response 
    */ 
    public function getAdsByTypeId($typeId, $withCommonAd = 1)
    {
      
    }
}