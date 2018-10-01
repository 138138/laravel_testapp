<?php

namespace App\Http\Controllers\TestNamespace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestNamespaceController extends Controller
{
	public function index(Request $request)
	{
		echo 'TestNamespaceController function called....!!!';
	}
}
