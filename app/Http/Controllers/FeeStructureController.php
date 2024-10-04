<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\FeeHead;
use App\Models\AcademicYear;
use App\Models\FeeStructure;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        $data['fee_heads'] = FeeHead::all();
       return view('admin.fee-structure.fee-structure', $data);
    }

   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'academic_year_id' => "required",
        'class_id' => "required",
        'fee_head_id' => "required"
      ]);
    FeeStructure::create($request->all());
  
    return redirect()->route('fee-structure.read')->with('success', 'Fee Structure Added Successfully');


    }

    /**
     * Display the specified resource.
     */
    public function read(Request $request)
    {
       
        $feeStructure = FeeStructure::with(['FeeHead','AcademicYear','Class'])->latest();
       
       if($request->get('class_id')){
        $feeStructure->where('class_id',$request->get('class_id'));
       }
       if($request->get('academic_year_id')) {
        $feeStructure->where('academic_year_id',$request->get('academic_year_id'));
       }

        $data['feeStructure']= $feeStructure->get();

        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        // $data['Fee_heads'] = FeeHead::all();


        return view('admin.fee-structure.fee-structure-list', $data);

// $fee_structure = $FeeStructure::query()->with(['classes' , 'AcademicYear' , 'FeeHead']);

    


    }
    public function delete($id)
    {

        $data = FeeStructure::find($id);
        $data->delete();
        return redirect()->route('fee-structure.read')->with('success', 'Fee Structure Deleted  Successfully');

    }

    public function edit($id)
    {
        
        $data['fee'] = FeeStructure::find($id);
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        $data['fee_heads'] = FeeHead::all();
        return view('admin.fee-structure.edit-fee-structure', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $fee=FeeStructure::find($id);
        $fee->class_id = $request->class_id;
        $fee->academic_year_id = $request->academic_year_id;
        $fee->fee_head_id = $request->fee_head_id;
        $fee->april = $request->april;
        $fee->may = $request->may;
        $fee->june = $request->june;
        $fee->july = $request->july;
        $fee->august = $request->august;
        $fee->september = $request->september;
        $fee->october = $request->october;
        $fee->november = $request->november;
        $fee->december	 = $request->december;
        $fee->january = $request->january;
        $fee->febuary = $request->febuary;
        $fee->march = $request->march;
        $fee->update();
        return redirect()->route('fee-structure.read')->with('success', 'Fee Structure Updated  Successfully');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeStructure $feeStructure)
    {
        //
    }
}
