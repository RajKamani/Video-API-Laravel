<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
{
    public function toArray($request)
    {
        return [
            'User' => $this->user,
            'Comment' => $this->comment_text,
            'Commented_at'=>$this->created_at->diffForHumans()
        ];
    }
}
