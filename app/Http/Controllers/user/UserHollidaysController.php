<?php

namespace App\Http\Controllers\user;
use App\Holiday;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class UserHollidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $holidays = Holiday::all();
           $details = DB::table('holidays')
            ->join('organisators', 'holidays.organisator_id', '=', 'organisators.id')
            ->join('type_of_transports', 'holidays.typeOfTransport_id', '=', 'type_of_transports.id')
            ->select('holidays.*', 'organisators.organisatorName', 'type_of_transports.typeoftransport')
            ->get();
         

        return view('holidayusers.index',  compact('details','holidays')); }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
        
        // $holidayhouse = HolidayHouse::find($id);
      
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
}
