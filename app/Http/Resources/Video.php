<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Video as VideoM;

class Video extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'Title' => $this->title,
            'Description' => $this->description,
            'Likes' => $this->likes,
            'Comments' => function()
            {

                $data = new VideoM();
                return $data->Comments()->count();
            }


        ];
    }
}
