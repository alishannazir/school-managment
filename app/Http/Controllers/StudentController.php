<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use App\Models\Classes;
use App\Models\Student;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        return view('admin.student.student', $data);
    }


public function store(Request $request)
{
    // echo'ok';
    $request->validate(rules: [
        'academic_year_id' => 'required',
        'class_id' => 'required',
        'admission_date' => 'required',
        'name' => 'required',
        'father_name' => 'required',
        'cnic' => 'required',
        'mobno' => 'required',
        'dob' => 'required',
        'address' => 'required',
        'password' => 'required',
        'email' => 'required'

    ]);

    $user = new User();
    $user->academic_year_id = $request->academic_year_id;
    $user->class_id = $request->class_id;
    // dd($user);
    $user->admission_date = $request->admission_date;
    $user->name = $request->name;
    $user->cnic = $request->cnic;
    $user->address = $request->address;
    $user->email = $request->email;
    $user->father_name = $request->father_name;
    $user->mobno = $request->mobno;
    $user->dob = $request->dob;
    $user->password = Hash::make($request->password) ;
    
    $user->save();
    


    return redirect()->route('student.read')->with('success', 'Student Added Successfully');
}

public function read()
{

    $data['student'] = Users::get();
    return view('admin.student.student_list', $data);
}

public function edit($id)
{
    $data['classes'] = Classes::all();
    $data['academic_years'] = AcademicYear::all();
    $data['student'] = Users::find($id);
    return view('admin.student.edit_student',$data);

}
public function update(Request $request)
{
    $data= Users::find($request->id);
    $data->academic_year_id = $request->academic_year_id;
    $data->class_id = $request->class_id;
    $data->admission_date = $request->admission_date;
    $data->name = $request->name;
    $data->cnic = $request->cnic;
    $data->address = $request->address;
    $data->email = $request->email;
    $data->father_name = $request->father_name;
    $data->mobno = $request->mobno;
    $data->dob = $request->dob;
    $data->update();
    return redirect()->route('student.read')->with('success', 'Student Udated  Successfully');

}

public function delete($id)
{

    $data = Users::find($id);
    $data->delete();
    return redirect()->route('student.read')->with('success', 'Student Deleted  Successfully');

}

}