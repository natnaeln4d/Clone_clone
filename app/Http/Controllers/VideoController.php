<?php

namespace App\Http\Controllers;

use App\Models\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Stringable;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function upload()
    {
        return view('folder.uploadvideo');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   $request->validate([
        //     'file'=>['required','mimes:mp4,avi,m4a,webm'],
        //     'title' => ['required', 'string', 'max:255'],
        //     'discription' => ['required', 'string', 'max:1000']

        //  ]);
        if ($request->has('file')) {
        $file=$request->file('file');
        // $destinationPath = Storage::makeDirectory('/uploads/videos');
        // $file_name=$file->extension();
        // $file->move($destinationPath,$file_name);
        $name = 1;
        $url = Storage::putFileAs('file', $file, $name . '.' . $file->extension());
        $insert=new video(
            [
            'file' => env('APP_URL') . '/' . $url,
            'title'       =>  $request->get('title'),
            'discription'          =>  $request->get('discription'),
            'thumbnail'        =>  $request->get('thumbnail'),]
        );
    
       $insert->save();
        return redirect()->route('home')->with('message','New video uploaded successfully');
    }
    else {
        dd('Request Has No File');
        }
        
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
    }
}
