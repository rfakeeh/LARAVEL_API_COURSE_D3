<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'thumbnail' => $this->resource->thumbnail,
            'visible' => $this->resource->visible,
            'updated_at' => $this->resource->updated_at,
            'body' => $this->resource->body,
            'album_size' => $this->resource->images()->count(),
            'album' => ImageResource::collection($this->images),
            'categories_count' => $this->resource->categories()->count(),
            'categories' => CategoryResource::collection($this->categories)
        ];
    }
}
