<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeOfTransportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $types = TypeOfTransport::all();

        return view('types.index',  compact('types'));
       
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
    public function store(Request $request)
    {
        //
          \App\TypeOfTransport::create([
          'Type' => $request->get('typeOfTransport'),
          
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
          types = TypeOfTransport::find($id);

        return view('types.edit', compact('types'));
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
        'Type'=>'required',        
      ]);

      $types = TypeOfTransport::find($id);
      $types->type = $request->get('type');
     

      $types->save();

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
         $types = TypeOfTransport::find($id);
     $types->delete();

     return redirect('/types')->with('success', 'Type of transport has been deleted Successfully');
    }
}
