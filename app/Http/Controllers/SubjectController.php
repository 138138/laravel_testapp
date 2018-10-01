<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
  public function index()
  {
    $subjects = Subject::all();
    return view('subject.subject_list',compact('subjects'));
  }

    public function create()
    {
        return view('subject.subject_add_edit');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'code'=>'required|string|unique:subjects',
        'name'=>'required|string|unique:subjects'
      ]);

      Subject::create($request->all());

      return redirect('/subject');
    }

    public function show($id)
    {
        return 'show called';
    }

    public function edit($id)
    {
      $subject = Subject::findOrFail($id);
      return view('subject.subject_add_edit',compact('subject'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'code'=>'required|string|unique:subjects,code,'.$id,
        'name'=>'required|string|unique:subjects,name,'.$id
      ]);

      $subject = Subject::findOrFail($id);
      $subject->update($request->all());
      return redirect('/subject');
    }

    public function destroy($id)
    {
      Subject::where('id',$id)->delete();
      return redirect('/subject');
    }
}
