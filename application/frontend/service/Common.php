<?php
namespace app\frontend\service;

use think\Model;

/** 
* comon.php 
* common class  
*
* @author      geesim<geesim126@gmail.com> 
* @version     1.0.1
* @since       1
*/ 
class Common extends Model
{
    /**   
    * @desc initialize :load redis server config settings
    * 
    * @access protected
    * @param int arg desc
    * @author geesim<geesim126@gmail.com>
    * @datetime alt+d
    * @return \think\Response 
    */
    protected function initialize()
    {
        parent::initialize();
   	}
   	
}