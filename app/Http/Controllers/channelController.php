<?php

namespace App\Http\Controllers;

use App\Models\channel;
use App\Models\video;
use Illuminate\Http\Request;

class channelController extends Controller
{
    public function edit(channel $channel)
    {
       return view('channels.edit',compact('channel'));
    }
    public function index()
    {
       return view('layouts.main');
    }
    public function singlevideo($id)
    {
      $video=video::find($id);
     return view('fol.singlevideo',compact('video'));
    }
}
