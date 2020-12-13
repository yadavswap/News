<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\Json;

class CategoryResource extends Json
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
            // 'cid'=>$this->cid,
            'title'=>$this->title,
            'slug'=>$this->slug,

            'status'=>$this->status

        ];
    }
}
