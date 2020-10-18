<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Http\Resources\Video as VideoResource;
use App\Http\Resources\VideoCollection;
use App\Models\Video;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VideoController extends Controller
{

    public function index()
    {
        return new VideoCollection(Video::all());

    }

    public function store(VideoRequest $request)
    {
        $video = new Video();
        $video->title=$request->title;
        $video->description=$request->description;
        $video->likes=$request->likes;
        $video->save();

        return response(
            ['data'=> new VideoResource($video)]
        ,Response::HTTP_CREATED);
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
