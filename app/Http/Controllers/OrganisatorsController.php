<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganisatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $organisators = Organisator::all();

        return view('organisators.index',  compact('organisators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('organisators.create');
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
        \App\Organisator::create([
          'Name' => $request->get('name'),
          
        ]);

        return redirect('/organisators')->with('success', 'List of organisators has been added');
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
         organisators = Organisator::find($id);

        return view('organisators.edit', compact('organisators'));
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
        'Name'=>'required',        
      ]);

      $organisators = Organisator::find($id);
      $organisators->organisators = $request->get('organisators');
     

      $organisators->save();

      return redirect('/organisators')->with('success', 'List of organisators has been updated');
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
         $organisators = Organisator::find($id);
     $organisators->delete();

     return redirect('/organisators')->with('success', 'Organisator has been deleted Successfully');
    }
}
