<?php
namespace app\frontend\controller;

use app\frontend\controller\Common;
use app\frontend\service\Index as IndexService;
/** 
* Index.php 
* index contoller 
*
* @author      geesim<geesim126@gmail.com> 
* @version     1.0.1
* @since       1
*/ 
class Index extends Common
{
    //index service model
    private $indexService;

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
        $this->indexService = new IndexService;
    }
	
	/**   
	* @desc index action
	* 
	* @access public
	* @param int arg desc
	* @author geesim<geesim126@gmail.com>
	* @datetime 2017-10-21
	* @return \think\Response 
	*/ 
    public function index()
    {

        $info = \think\Loader::model('User','model')->get(['username|email|phone'=>'test@local.com'],'',true);
       
        
        return view('index');
    }


}
