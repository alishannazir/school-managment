<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.fee-head.fee-head');
    }

    /**
     * Show the form for creating a new resource.
     */

  
    public function store(Request $request)
    {
        $request->validate(rules: [
            'name' => 'required'
        ]);
        $data = new FeeHead();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('fee-head.read')->with('success', 'Fee Head Added Successfully');
    }


    public function read()
    {

        $data['feehead'] = FeeHead::get();
        return view('admin.fee-head.fee-head-list', $data);
    }
        
    public function edit($id)
    {

        $data['feehead'] = FeeHead::find($id);
        return view('admin.fee-head.edit_feehead',$data);

    }


    public function update(Request $request)
    {
        $data= FeeHead::find($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('fee-head.read')->with('success', 'Fee Head Udated  Successfully');

    }

    public function delete($id)
    {

        $data = FeeHead::find($id);
        $data->delete();
        return redirect()->route('fee-head.read')->with('success', 'Fee Head Deleted  Successfully');

    }
}
