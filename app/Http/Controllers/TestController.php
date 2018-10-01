<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\TestModel;
use App\User;
use App\Phone;
use App\Comment;


class TestController extends Controller
{
    private $myvar;

    public function __construct(\MyClass $myvar)
    {
        $this->myvar = $myvar;
    }

    public function test_function(Request $request)
    {
        echo "Test function called...!!!.<br>";
    }

    public function constructore_injector()
    {
        var_dump($this->myvar);
        echo "<br>".$this->myvar->var1;
    }

    public function method_injector(\MyClass $myvar)
    {
        var_dump($myvar);
        echo "<br> ".$myvar	->var1;
    }

    public function page_info(Request $request)
    {
        echo "Mycontroller <br>";
        echo 'Path -'.$request->path().'<br>';
        echo 'URL -'.$request->url().'<br>';
        echo 'pattern full url - '.$request->fullUrl().'<br>';
        echo 'pattern match - '.$request->is('pag*').'<br>';

        echo url()->current()."<br>";
        echo url()->full()."<br>";
        echo url()->previous()."<br>";
        echo URL::current();

        // echo  Route::current(); // not working
        echo 'current route - '.Route::getFacadeRoot()->current()->uri();
        echo  'current route name - '.Route::currentRouteName()."<br>";
        echo  'current route action - '.Route::currentRouteAction()."<br>";

        echo 'Method -'.$request->method().'<br>';
        if ($request->isMethod('post')) {
        }

        echo 'all params in request - '.print_r($request->all()).'<br>';
    }

    function retrive_arg($xyz)
    {
        echo "Retriving Argurment From url - ".$xyz."<br>";
    }

    function check_view()
    {
        if (view()->exists('emails')) // View::exists('emails') alternative way with static function
        {
            return view('emails');
        }
        else
        {
            return view('test_blade.blade_file');
        }
        $data = '';
        // return view()->first(['email', 'test_blade'], $data);  // check first email if not than look for test_blade
    }

    public function get_env_variable(Request $request)
    {
        echo $_ENV['DB_HOST'];  echo "</br>";
        echo env('DB_HOST');    echo "</br>";
        echo \App::environment();     echo "</br>";
        echo config('app.timezone');  echo "</br>";
    }

    public function test_form(Request $request)
    {
        return view('test_form');
    }

    public function test_form_post(Request $request)
    {
        //Simple Validation
        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'surname' => 'required|string|min:5|max:50',
            'roll_no' => 'required|integer|unique:roll_no',
            'language' => 'required',
        ]);

        echo $request->input('name');                echo "<br>";
        var_dump($request->query('name'));             echo "<br>";
        var_dump($request->name);                echo "<br>";

        $roll_no = $request->input('roll_no');   echo "<br>";
        var_dump($roll_no);                      echo "<br>";

        $not_sent_var = $request->input('not_sent_var','Automatically set this if not set');
        echo $not_sent_var."<br>";

        echo $request->input('language.0');             echo "<br>";
        print_r($request->input('language.*'));         echo "<br>";

        if ($request->has('name')) {
            echo "name passed in request. <br>";
        }

        if ($request->has(['name','surname'])) {
            echo "name and surname both passed in request. <br>";
        }

        session()->flash('flash_key', 'set flash message');
        // return redirect('next_request')->with('flash_key2', 'set flash2 message.');
        // return redirect('next_request')->withInput();
        return redirect('next_request')->withInput($request->except('surname'));
        // return back()->withInput($request->only('password'));
        // return redirect()->away('https://www.google.com');
        // return redirect()->action('TestController@retrive_arg',['id' =>'Pass Argurment']);
        // return redirect()->route('profile', ['id' => 1]);
    }

    public function next_request(Request $request)
    {
        echo "Print Flash session <br>"; 
        print_r(old('name'));               echo "<br>";
        print_r(old('surname'));            echo "<br>";
        print_r(session('flash_key'));      echo "<br>";
    }

    public function form_request(TestModel $obj_testmodel)
    {
        $validated = $obj_testmodel->validated();
        return 'form passed';
    }

    public function erm_select_query(Request $request)
    {   

        /*----- Retriving Models -----*/

        // $test_model1 = TestModel::all();
        // $test_model2 = TestModel::get(); // normal eloquent query where we can put another function

        // TestModel::chunk(200, function ($test_model) {
        //     foreach ($test_model as $tm) {
        //         // echo "<pre>"; print_r($tm->toArray());
        //     }
        // });

        // foreach (TestModel::cursor() as $test_model) {
        //     // echo "<pre>"; print_r($test_model->toArray());
        // }

        /*----- Retriving Single Models -----*/

        // TestModel::find(1);
        // TestModel::find([1,2,3]);
        // TestModel::where('id',1)->first();

        // TestModel::findOrFail(1);
        // TestModel::where('id',1)->firstOrFail();

        /*----- Insert and Update Models -----*/

        // $test_model3 = new TestModel(); // INSERT
        // $test_model3->name = 'asasas';
        // $test_model3->surname = 'asasas';
        // $test_model3->roll_no = 56454;
        // $test_model3->save();

        // $test_model4 = TestModel::find(1); // UPDATE
        // $test_model4->name = 'asasas';
        // $test_model4->surname = 'asasas';
        // $test_model4->roll_no = 56454;
        // $test_model4->save();        

        // TestModel::create(['name'=>'asas','surname'=>'asasas','roll_no'=>23]);

        // TestModel::where('id',1)->where('name','ravi')->update(['name'=>'asas','surname'=>'asasas','roll_no'=>23]);

        // $test_model5 = TestModel::firstOrCreate(['name'=>'abcd','surname'=>'something','roll_no'=>12313]);
        // $test_model51 = TestModel::firstOrCreate(['name'=>'abcd','surname'=>'something'],['roll_no'=>12313]);       

        // $test_model6 = TestModel::firstOrNew(['name'=>'abcd','surname'=>'something','roll_no'=>12313]);
        // $test_model61 = TestModel::firstOrNew(['name'=>'abcd','surname'=>'something'],['roll_no'=>12313]);

        // $test_model7 = TestModel::updateOrCreate(['name'=>'abcda','surname'=>'something'],['roll_no'=>122]); // if name and surname found according to first record it will update roll no otherwise it will creaye record

        /*----- Deleting Model -----*/

        // $test_model8 = TestModel::find(1);
        // $test_model8->delete();

        // TestModel::destroy(1);
        // TestModel::destroy([1,2,3]);

        // TestModel::where('id',1)->delete();
        // TestModel::where('id',1)->forceDelete();

        // $test_model9 = TestModel::withTrashed()->get();
        // $test_model9 = TestModel::onlyTrashed()->get();

        // $test_model10 = TestModel::where('id',2)->restore();

        //DONT KNOW THE USAGE
        // $flight->history()->restore();
        // $flight->history()->forceDelete();


        // echo "<pre>"; print_r($test_model9->toArray()); exit();
    }

    public function erm_one_to_one_relation(Request $request)
    {
        // $user = User::find(2)->phone;
        // echo "<pre>"; print_r($user->toArray()); exit();

        // $phone = Phone::find(3)->user;
        // echo "<pre>"; print_r($phone->toArray()); exit();
    }

    public function erm_one_to_many_relation(Request $request)
    {
        // $comment = User::find(1)->comment;
        // echo "<pre>"; print_r($comment->toArray()); exit();

        // $user = Comment::find(1)->user;
        // echo "<pre>"; print_r($user->toArray()); exit();
    }

    public function erm_many_many_relation(Request $request)
    {
            
    }
}
