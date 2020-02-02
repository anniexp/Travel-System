<?php

namespace App\Http\Controllers\admin;
use App\Holiday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HolidaysController extends Controller
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

    /*protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string',  'max:255'],
            'duration' => ['required', 'string'],
            'typeOfTransport_id' => ['required', 'integer'],
          'organisator_id' => ['required', 'integer'],
          'image_id' => ['required', 'integer'],
                       
        ]);
    }*/
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
         'date' => $request->get('date'),
         'duration' => $request->get('duration'),       
          'typeOfTransport_id' => $request->get('typeOfTransport_id'),
          'organisator_id' => $request->get('organisator_id'),
          'image_id' => $request->get('image_id'),
          
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
        $holiday = Holiday::find($id);

        return view('holidays.edit', compact('holiday'));
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
         $holiday = Holiday::find($id);   
       $holiday ->name = $request->get('name');
          $holiday ->date = $request->get('date');
          $holiday ->duration = $request->get('duration'); 

      $holiday->save();

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
        $holiday = Holiday::find($id);
     $holiday->delete();

     return redirect('/holidays')->with('success', 'Holiday has been deleted Successfully');
    }
}
