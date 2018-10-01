<?php

namespace App\Http\Controllers;

use App\StudentCommon;
use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.student_list',compact('students'));
    }

    public function create()
    {
        return view('student.student_add_edit');   
    }

    public function store(Request $request)
    {
        $this->validate($request,[
                                    'roll_no'=>'required|string|unique:students',
                                    'name'=>'required|string|max:255',
                                    'marks'=>'required|integer'
                                ]);

        Student::create($request->all());

        return redirect('/student')->with('status-add', 'Student added successfully!');
    }

    public function show($id)
    {
        return 'Show Called';
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.student_add_edit',compact('student'));
    }

    public function update(Request $request, $id)
    {
			$this->validate($request,[
				'roll_no'=>'required|string|unique:students,roll_no,'.$id,
				'name'=>'required|string|max:255',
				'marks'=>'required|integer'
			]);

			$student = Student::findOrFail($id);
			$student->update($request->all());
            return redirect('/student')->with('status-update', 'Student updated successfully!');
    }

    // public function destroy($id)  // delete function with ajax call
    // {
    //     Student::where('id',$id)->delete();
    //     return response()->json(['status'=>'success']);
    //     // return redirect('/student'); 
    // }

    public function destroy($id) // delete with the normal call
    {
        Student::where('id',$id)->delete();
        return redirect('/student'); 
    }
}
