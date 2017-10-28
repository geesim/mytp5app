<?php

namespace app\frontend\controller;

use think\Controller;

class Common extends Controller
{
    /**   
    * @desc _initialize
    * 
    * @access public
    * @author geesim<geesim126@gmail.com>
    * @datetime 2017-10-21
    * @return viod 
    */
    public function _initialize()
    {
        parent::_initialize();
        
        if(\think\Loader::model('User','service')->verifyRememberMeService()){
            $userInfo = \think\Session::get('userInfo');
            \think\View::share('userInfo', $userInfo);
        }
    } 
    
    /**   
    * @desc public header
    * 
    * @access public
    * @author geesim<geesim126@gmail.com>
    * @datetime 2017-10-21
    * @return \think\Response 
    */
    public function header()
    {
        return view('header');
    }

    /**   
    * @desc public top bar
    * 
    * @access  
    * @param int arg desc
    * @author geesim<geesim126@gmail.com>
    * @datetime alt+d
    * @return \think\Response 
    */
    public function topBar()
    {
        return view('topBar');
    } 
    /**   
     * @desc public nav
     * 
     * @access public 
     * @author geesim<geesim126@gmail.com>
     * @datetime 2017-10-21
     * @return \think\Response 
     */ 
    public function nav()
    {
        return view('nav');
    }

    /**   
     * @desc public footer
     * 
     * @access public 
     * @param int arg desc
     * @author geesim<geesim126@gmail.com>
     * @datetime 2017-10-21
     * @return \think\Response 
     */ 
    public function footer()
    {
        return view('footer');
    } 
}
    