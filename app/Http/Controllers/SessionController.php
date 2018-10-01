<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
	// not to use neccessary $request object you can call directly session();

    public function accessSessionData()
    {
    	if(session()->has('my_name')) 
    	{
    		echo 'Session set - '.session()->get('my_name','Default Value');
    	}
    	else
    	{
    		echo "No data in session";
    	}

    // if session value not found than we can set default value
    //	session()->get('my_name','Default Value');

   	// can set anonymous function as second args if we need additional calculation
    //	echo session()->get('my_name',function(){ return 2+3; });

		session()->put('users');     		  // check with put just key and put with key and value
		var_dump(session()->has('users'));    // check with key and value --- if key present and value is not 'NULL' than return true
		var_dump(session()->exists('users')); // check only session key --- if session key is exist than it returns true
   	}

	public function storeSessionData(Request $request)
	{
		$request->session()->put('my_name','Virat Gandhi');
		echo "data has been added to Session.";
	}

	public function deleteSessionData(Request $request)
	{
		$request->session()->forget('my_name');
		echo "Session Data has been successfully removed.";
	}
 
	public function flush_func(Request $request)
	{
		$request->session()->flush(); // with this delete all the app session
	}

	public function flash_func()
	{
		// flash function set data for only next one request
		session()->flash('my_name','flash data set for once');
		echo "flash session data set";
	}

	public function reflash_func()
	{
		// reflash function is skip current requst for remove data from session 
		session()->reflash();
		// $request->session()->keep(['username', 'email']);  // we can store flash data using keep function
		echo "reflash called flash data will not remove with this request...!!!";
	}

	public function all_session()
	{
		session(['session_array' => 'session array value']);

		echo "<pre>"; print_r(session()->all()); echo "<br>";

		// session()->push('cars.make', 'Audi');
		// session()->push('cars.make', 'BMW');
		// session()->push('cars.model', 'A4');
		// session()->push('cars.model', '320D');

		print_r(session()->pull('cars.model', 'default'));

		print_r(session()->all());
	}
}
