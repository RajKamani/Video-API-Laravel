<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentCollection;
use App\Models\Comment;
use App\Models\Video;

use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index(Video $video)
    {
        return new CommentCollection($video->Comments);
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {

    }
}
