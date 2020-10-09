<?php

namespace App\Http\Controllers;

use App\Http\Resources\Video as VideoResource;
use App\Http\Resources\VideoCollection;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        return new VideoCollection(Video::all());

    }

    public function store(Request $request)
    {
        //
    }

    public function show(Video $video)
    {
        return new VideoResource($video);
    }

    public function update(Request $request, Video $video)
    {
        //
    }


    public function destroy(Video $video)
    {
        //
    }
}
