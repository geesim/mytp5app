<?php
namespace app\backend\controller;

use app\backend\controller\Common;
class Index extends Common
{
    public function index()
    {
        return view('index');
    }
}
