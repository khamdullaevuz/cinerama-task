<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $is_single_item_request = $request->routeIs('api.v1.movies.show');

        return [
            'id' => $this->id,
            'poster' => $this->when($is_single_item_request, $this->poster),
            'slug' => $this->when($is_single_item_request, $this->slug),
            'title' => $this->title,
            'is_free' => (bool) $this->is_free,
            'year' => $this->year,
            'genres' => $this->when($is_single_item_request, GenreResource::collection($this->genres)),
            'countries' => $this->when($is_single_item_request, CountryResource::collection($this->countries)),
            'status' => (bool) $this->status,
            'created_at' => $this->when(!$is_single_item_request, $this->created_at->format('Y-m-d H:i:s')),
        ];
    }
}
