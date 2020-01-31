<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Organisator;
class OrganisatorsController extends Controller
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
          'name' => $request->get('name'),
          
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
         $organisator = Organisator::find($id);

        return view('organisators.edit', compact('organisator'));
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
        'name'=>'required',        
      ]);

      $organisator = Organisator::find($id);
      $organisator->name = $request->get('name');
     

      $organisator->save();

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
         $organisator = Organisator::find($id);
     $organisator->delete();

     return redirect('/organisators')->with('success', 'Organisator has been deleted Successfully');
    }
}
