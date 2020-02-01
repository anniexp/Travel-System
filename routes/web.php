<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Input;
use App\Holiday;
use App\TypeOfTransport;
use App\Organisator;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'welcome');*/
/*Auth::routes();*/
Route::get('/home', 'HomeController@index')    
    ->name('home');
Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');
Route::resource('/organisators', 'admin\OrganisatorsController');
Route::resource('/types', 'admin\TypeOfTransportsController');
Route::resource('/holidays', 'admin\HolidaysController');
Route::resource('/holidayusers', 'user\UserHollidaysController');
Route::resource('/images', 'admin\ImagesController');

Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $holiday = Holiday::where('name','LIKE','%'.$q.'%')->orWhere('date','LIKE','%'.$q.'%')->get();
   /* $typeOfTransport = TypeOfTransport::where('typeoftransport','LIKE','%'.$q.'%')->get();
    $organisator = Organisator::where('organisatorName','LIKE','%'.$q.'%')->get();*/

   // if(count($holiday) > 0 ||count($organisator) > 0 || count($typeOfTransport) > 0)
       if(count($holiday) > 0 )

       // return view('welcome')->withDetails($holiday && $organisator && $typeOfTransport)->withQuery ( $q );
        return view('welcome')->withDetails($holiday)->withQuery ( $q );
    else return view ('welcome')->withMessage('No Holidays found. Try to search again !');
});

