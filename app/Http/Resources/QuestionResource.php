<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'question'; 

    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'path' => $this->getPath(),
            'body' => $this->body,
            'user' => $this->getUser->name,
            'created_at' =>$this->created_at->diffForHumans(),
        ];
        
    }
}
