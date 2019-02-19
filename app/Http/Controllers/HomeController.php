<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WatchedVideo;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $watched_videos = WatchedVideo::orderBy('created_at', 'desc')->get();
        return view('home', compact('watched_videos'));
    }

    public function detail()
    {
        return view('detail');
    }

    public function save_to_watched(Request $request)
    {
        $video = collect($request->all())->forget('_token');
        $video_id = $request->input('video_id');
        $existing_videos = WatchedVideo::where('video_id', $video_id)->get();

        if(count($existing_videos) < 1){
            $result = WatchedVideo::create($video->toArray());
            return response()->json([
                "status" => "success",
                "message" => "Video added to watched!"
            ]);
        }else{
            return response()->json([
                "status" => "false",
                "message" => "Video already saved to watched!"
            ]);
        }

    }
}
