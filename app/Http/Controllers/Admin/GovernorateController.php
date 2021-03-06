<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\DataTables\GovernorateDatatable;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GovernorateDatatable $model)
    {
        return $model->render('admin.governorate.index' , ['title' => 'Governorate']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.governorate.create' , ['title' => 'Governorate']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $data = $this->validate($request, [

            'name'             => 'required|min:6', 
        ]);
 
        $record = Governorate::create($data);   

        return redirect('dashboard/governorate')->with('success' , 'Record Created');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Governorate::findOrFail($id);
        return view('admin.governorate.edit' , compact('record') , ['title' => 'Governorate']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [

            'name'             => 'required|min:6', 
        ]);
 
        $record = Governorate::find($id); 
        $done   = $record->update($data);   

        return redirect('dashboard/governorate')->with('success' , 'Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $done   = Governorate::destroy($id);  
        return back()->with('success' , 'Record Deleted');
    }
}
