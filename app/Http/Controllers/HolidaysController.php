<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $holidays = Holiday::all();

        return view('holidays.index',  compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('holidays.create');
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
         \App\Holiday::create([
         'name' => $request->get('name'),
         'dates' => $request->get('dates'),
         'duration' => $request->get('duration'),       
          'typeOfTransport_id' => $request->get('typeOfTransport_id'),
          'organisator_id' => $request->get('organisator_id'),
          
        ]);

        return redirect('/holidays')->with('success', 'Holiday has been added');
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
        $holidays = Holiday::find($id);

        return view('holidays.edit', compact('holidays'));
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
         $holidays = Holiday::find($id);
     /* $order->PaymentMethod = $request->get('PaymentMethod');
      $order->OrderTotal = $request->get('OrderTotal');
      */
       $holidays ->name = $request->get('name');
          $holidays ->dates = $request->get('dates');
          $holidays ->duration = $request->get('duration'); 

      $holidays->save();

      return redirect('/holidays')->with('success', 'Holiday has been updated');
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
        $holidays = Holiday::find($id);
     $holidays->delete();

     return redirect('/holidays')->with('success', 'Holiday has been deleted Successfully');
    }
}
