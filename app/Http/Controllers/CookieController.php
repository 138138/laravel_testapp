<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    // Set Cookie
    public function setCookie(Request $request)
    {
        $minutes = 1;
        $response = new  Response();
        $response->withCookie(cookie('name','virat',$minutes));
        return $response;
    }

    public function getCookie(Request $request)
    {
        $value = $request->cookie('name');
        echo "Get Cookie Value : ".$value;
    }

    public function permenentSetCookie(Request $request)
    {
        $response = new Response();
        $response->withCookie(cookie()->forever('rollno','987654'));
        return $response;
    }

    public function permenantGetCookie(Request $request)
    {
        $value = $request->cookie('rollno');
        echo "get Permanant Cookie : ".$value;
    }
}
