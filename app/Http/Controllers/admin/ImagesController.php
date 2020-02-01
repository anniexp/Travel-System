<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Image;
use App\Http\Requests\ImageUpload;
use Illuminate\Support\Facades\Storage;
class ImagesController extends Controller
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
         $images = Image::all();

        return view('images.index',  compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageUpload $request)
    {
        $path = $request->file('customImage')->store('public/sample-images');

        $image = new Image([
            'fileName' => basename($path),
            'imageDescription' => $request->get('imageDescription')
        ]);
        $image->save();

        return redirect('images');

    }

    public function destroy($id)
    {
        $image = Image::find($id);
        Storage::delete('public/sample-images/' . $image->fileName);
        $image->delete();

        return redirect('/images')->with('success', 'Image was deleted!');
    
    }
}
