<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        return view('admin.class.class');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = new Classes();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('class.read')->with('success', 'Class Added Successfully');
    }

    public function read()
    {

        $data['class'] = Classes::get();
        return view('admin.class.class_list', $data);
    }


    public function edit($id)
    {

        $data['class'] = Classes::find($id);
        return view('admin.class.edit_class',$data);

    }


    public function update(Request $request)
    {
        $data= classes::find($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('class.read')->with('success', 'Class Udated  Successfully');

    }
    // vdfkgjhfkgdhrkge

    // public function edit($id)
    // {

    //     $data['academic_year'] = AcademicYear::find($id);
    //     return view('admin.edit_academic_year', $data);

    // }


    // public function update(Request $request)
    // {
    //     $data = AcademicYear::find($request->id);
    //     $data->name = $request->name;
    //     $data->update();
    //     return redirect()->route('academic-year.read')->with('success', 'Academic Year Udated  Successfully');

    // }


    // // gnkdfhjnggdf
    // public function delete($id)
    // {

    //     $data = classes::find($id);
    //     $data->delete();
    //     return redirect()->route('class.read')->with('success', 'Academic Year Deleted  Successfully');

    // }

    public function delete($id)
    {

        $data = classes::find($id);
        $data->delete();
        return redirect()->route('class.read')->with('success', 'Class Deleted  Successfully');

    }

}
