<?php

/*----- Default Routes -----*/
Route::get('/', function () {
	return view('home');
    // return view('welcome');
});
Auth::routes();
Route::get('/home','HomeController@index')->name('home');

/*----- Basic Routing -----*/
Route::get('basic_response', function () {
    echo 'Hello World...!!!';
    return 'Hello World...!!!';
});

/*----- Required Parameter  -- Means you must have to give input after ID like >>> ID/5 -----*/
Route::get('my_id/{id}',function($id){
    echo "ID : ".$id;
});

/*----- Optional Parameter -- if you are not giving parameter than it takes by default 'virat' -----*/
Route::get('/user/{name?}',function($name = 'virat'){
    echo "Name : ".$name;
});

/*----- Regular Expression -----*/
Route::get('reg_exp/{name}/{id}', function ($name,$id) {
    echo "name - ".$name.'<br>'.'id -'.$id;
})->where(['name'=>'[A-Za-z]+','id'=>'[0-9]+']);

/*----- Attaching Header -----*/
Route::get('header',function (){
    return response('Hello',200)->header('Content-type','text/html');
});

/*----- Attaching Cookie -----*/
Route::get('cookie',function (){
    //echo Cookie::get('name');  /*--- IF want to print cookie after set that ---*/
    return response("Hello",200)->header('Content-type','text/html')->withCookie('name','virat gandhi');
});

/*----- return json -----*/
Route::get('json',function(){
    return response()->json(['name'=>'virat gandhi','state'=>'gujrat']);
});

/*----- Controller -----*/
Route::get('call_controller1','TestController@test_function');
Route::get('call_controller2',['uses'=>'TestController@test_function']);

/*----- Middleware -----*/
Route::get('middleware_single',['middleware'=>'myroutemid1','uses'=>'TestController@test_function']);
Route::get('middleware_multiple',['middleware'=>['myroutemid1','myroutemid2:abc,abc'],'uses'=>'TestController@test_function']);
Route::get('middleware_function','TestController@test_function')->middleware('myroutemid1')->middleware('myroutemid2:abc,abc');
Route::middleware('myroutemid1')->middleware('myroutemid2:abc,abc')->get('switch_middleware_function','TestController@test_function');
Route::get('middleware_closure', ['middleware'=>'myroutemid2:argument1,argument2',
                                        'uses'=>function (){return 'this is closure function....!!!<br>';}]);

/*----- Prefix -----*/
Route::get('simple_prefix',['prefix'=>'set_prefix','uses'=>'TestController@test_function'])->name('simple_prefix');
Route::get('check1',function(){ echo route('simple_prefix'); /*get url with route name*/ });
Route::prefix('set_prefix')->middleware('myroutemid1')->get('function_prefix','TestController@test_function');

/*----- Namespace -----*/
Route::namespace('TestNamespace')->group(function () {
		Route::get('namespace_function_group','TestNamespaceController@index');
});
Route::group(['namespace'=>'TestNamespace'],
	function(){
		Route::get('namespace_group','TestNamespaceController@index')->name('namespace_name');
	});
//Route::get('namespace_function',['namespace'=>'TestNamespace','uses'=>'TestNamespaceController@index']); // not working

/*----- Name -----*/
Route::get('name_route','TestController@test_function')->name('set_name_route');
Route::get('check_name_route',function (){ echo route('set_name_route'); }); // this is just for check
Route::get('name_route_as',['as'=>'set_name','uses'=>'TestController@test_function']);
Route::get('check_as',function (){ echo route('set_name'); }); // this is just for check

/*---- Route group chain ----*/
Route::group(['prefix'=>'first_pre'],function(){
	Route::group(['prefix'=>'sec_pre'],function(){
		Route::get('group_chain','TestController@test_function')->name('group_chain_name');
	});
});

/*----- Limiting Route Request -----*/

Route::middleware('myroutemid1','throttle:5,1')->group(function () {
	Route::get('/rate_limiting', function () {
		return 'rate_limiting';
	});
});

Route::get('/test_limiting', ['middleware'=>'throttle:3,1',function () {
	return 'test_limiting';
}]);

/*--- Call middleware on Controller Class Constructor ---*/
Route::get('simple_middleware','ConstructorMiddlewareController@testfunc');
Route::get('only_middleware','ConstructorMiddlewareController@testfunc_only');
Route::get('except_middleware','ConstructorMiddlewareController@testfunc_except');

/*--- Access route with any type of http request ---*/
Route::any('all_url',function(){
	echo "with 'any' All Url load with any type of method";
});

/*--- Access with route only defined http request ---*/
Route::match(['put','patch'],'choose_url',function(){
	echo "Choose url load on selected method"; // try with adding 'get'
});

/*----- Redirect url here to there -----*/
Route::redirect('here','there');

/*----- Pattern on pass argument variable -----*/
Route::get('pattern/{pattern_var}',function($pattern){
	return $pattern;
	// if pattern_var only integer than only this route works, pattern defined in routeservice provider file
});

/*--- Model binding in Route file ---*/

Route::get('get_user/{user}',function(App\User $user){
	return $user->email;
	// model binding , pass id of model in url and in code write model name in route where id can get
});

Route::get('get_test/{test_var}',function($test_var){
	return $test_var;
	// model binding , we have bind class in RouteServiceProvider
	// when in route file 'test_var' argument show that means it work as student object
	// try uncomment function 'getRouteKeyName' inside model and pass city name in route args
});

Route::get('get_test2/{test_var2}',function($test_var2){
	echo "<pre>"; print_r($test_var2->toArray()); exit();
	// model binding , pass marks of student table and get info.
	// because check function of getRouteKeyName in Student model
});

/*--- Limiting Route Request ---*/

Route::middleware('myroutemid1','throttle:5,1')->group(function () {
	Route::get('/rate_limiting', function () {
		return 'rate_limiting';
	});
});

Route::get('/test_limiting', ['middleware'=>'throttle:3,1',function () {
	return 'test_limiting';
}]);

/*---- Pass data to view file ----*/

// pass data to view -- note - open view file and uncomment line and check
Route::get('pass_data_view1',function(){
	$data = ['rahul','amit','gaurav','abhishek'];
	return view('view_recieve_data',compact('data'));
//  return View::make('view_recieve_data',compact('data')); // both are same
});

Route::get('pass_data_view2',function(){
	$data = ['rahul','amit','gaurav','abhishek'];
	return view('view_recieve_data',['mydata'=>$data]);
});

Route::get('pass_data_view3',function(){
	$data = ['rahul','amit','gaurav','abhishek'];
	return view('view_recieve_data')->with('names',$data);//->with(key,value); //use more with chain
//  return view('view_recieve_data')->with(['key1'=>$data1,'key2'=>$data2]); //like this can also use
});

Route::get('pass_data_view4',function(){
	$data = ['rahul','amit','gaurav','abhishek'];
	return view('view_recieve_data')->withUsers($data);//->withKey(value); //use more with chain
});

/*--- Basic function that put in TestController ---*/
/*--- Define test class - used in TestController ---*/
class Myclass
{
    public $var1 = "This is Variable1...!!!";
}
Route::get('pass_arg/{arg}','TestController@retrive_arg');
Route::get('check_pass_arg',function(){ echo url('pass_arg',[123]); });
Route::get('get_env_variable','TestController@get_env_variable');
Route::get('page_info','TestController@page_info');
Route::get('check_file','MyController@check_view');

/*---- Constructor & Method injector ----*/
Route::get('con_inj','TestController@constructore_injector');
Route::get('met_inj','TestController@method_injector');

/*----- Session -----*/
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/get','SessionController@accessSessionData');
Route::get('session/remove','SessionController@deleteSessionData');
Route::get('session/flush','SessionController@flush_func');
Route::get('session/flash','SessionController@flash_func');
Route::get('session/reflash','SessionController@reflash_func');
Route::get('session/all','SessionController@all_session');


/*----- Cookie -----*/
Route::get('cookie/set','CookieController@setCookie');
Route::get('cookie/get','CookieController@getCookie');
Route::get('cookie/setpermanent','CookieController@permenentSetCookie');
Route::get('cookie/getpermanent','CookieController@permenantGetCookie');

/*----- Blade file -----*/
Route::get('master_blade',function(){
	return view('test_blade_file.blade_file');
});

Route::get('blade_file1',function(){
	//return view('blade_file1')->with('data','some text data...!!');
	return view('test_blade_file.blade_file1')->with('data','<h1>some text data...!!</h1>')->with('mydata',['ravi','raj','rahul']);
	// try with pass array without value
});

Route::get('grand_child',function(){
	return view('test_blade_file.grand_child')->with('names',['darshan','nirav','ishan']);
	// try with pass array without value
});

Route::get('alert',function(){
	return view('test_blade_file.alert',['slot'=>'lara54','slotvar'=>'Slot Variable','slotvar2'=>'Slot2 Variable','pass_data'=>'Pass Data Variable Data']);
});

Route::get('blade_file2',function(){
	return view('test_blade_file.blade_file2');
});

Route::resource('student','StudentController');
Route::resource('subject','SubjectController');
Route::resource('article','ArticleController');

/*----- Test form request and response -----*/

Route::get('test_form','TestController@test_form');
Route::post('test_form_post','TestController@test_form_post');
Route::get('next_request','TestController@next_request');
Route::get('form_request','TestController@form_request');


/*----- Data retrive function -----*/

Route::get('erm_select_query','TestController@erm_select_query');
Route::get('erm_one_to_one_relation','TestController@erm_one_to_one_relation');
Route::get('erm_one_to_many_relation','TestController@erm_one_to_many_relation');
Route::get('erm_many_many_relation','TestController@erm_many_many_relation');

