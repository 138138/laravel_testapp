<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConstructorMiddlewareController extends Controller
{
  public function __construct()
  {
    $this->middleware('myroutemid2:arguments1,arguments1'); // call every time while class call
    $this->middleware('myroutemid1',['only'=>'testfunc_only']); // call only while 'test_func' call
    $this->middleware('myroutemid2:arg1,arg2',['except'=>'testfunc_except']); // call for all function until except function call
  }

  public function testfunc()
  {
    echo "TestController and Function : testfunc1 <br>";
  }

  public function testfunc_only()
  {
    echo "TestController and Function : testfunc_only <br>";
  }

  public function testfunc_except()
  {
    echo "TestController and Function : testfunc_except <br>";
  }
}
