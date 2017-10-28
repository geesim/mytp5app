<?php
namespace \app\backend\controller;

use think\Controller;
/**
* @author geesim126@gmail.com
*/
class Common extends Controller
{
	public function initialize()
	{
		parent::initialize();
	}

	public function signIn()
	{
		return view('signIn');
	}
}