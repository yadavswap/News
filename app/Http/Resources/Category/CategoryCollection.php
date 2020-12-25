<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\Resource;

class CategoryCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'cid'=>$this->cid,
            'title'=>$this->title,
            'slug'=>$this->slug,
            // 'href' => [
            //     'links' => route('category.index',$this->cid)
            // ]

        ];
    }
    
}
