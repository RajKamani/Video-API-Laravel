<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommnetRequest;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\Comment as CommentResource;
use App\Models\Comment;
use App\Models\Video;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{

    public function index(Video $video)
    {
        return new CommentCollection($video->Comments);
    }

    public function store(CommnetRequest $request,Video $video)
    {

       $request= $this->naming_Conflict($request);
        $comment = New Comment($request->all());
        $video->Comments()->save($comment);
        return response(
            ['data'=> new CommentResource($comment)]
            , Response::HTTP_CREATED);

    }

    public function update(Request $request,Video $video, Comment $comment)
    {

        $request=$this->naming_Conflict($request);
        $comment->update($request->all());

        return response(
            ['data'=> new CommentResource($comment)]
            ,Response::HTTP_CREATED);
    }

    public function destroy(Video $video,Comment $comment)
    {
        $comment->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
    private  function naming_Conflict(Request $request)
    {
        $request['comment_text']=$request->Comment_text;
        unset($request->Comment_text);
        return $request;
    }

}
