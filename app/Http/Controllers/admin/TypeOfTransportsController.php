<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\TypeOfTransport;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeOfTransports;

class TypeOfTransportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
        //
         $typeoftransports = TypeOfTransport::all();

        return view('types.index',  compact('typeoftransports'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeOfTransports $request)
    {
        //
          \App\TypeOfTransport::create([
          'typeoftransport' => $request->get('typeoftransport'),
          
        ]);

        return redirect('/types')->with('success', 'Type of transport has been added');
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
        //
          $typeoftransport = TypeOfTransport::find($id);

        return view('types.edit', compact('typeoftransport'));
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
        //
          $request->validate([
        'typeoftransport'=>'required',        
      ]);

      $typeoftransport = TypeOfTransport::find($id);
      $typeoftransport->typeoftransport = $request->get('typeoftransport');
     

      $typeoftransport->save();

      return redirect('/types')->with('success', 'Type of transport has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $type = TypeOfTransport::find($id);
     $type->delete();

     return redirect('/types')->with('success', 'Type of transport has been deleted Successfully');
    }
}
