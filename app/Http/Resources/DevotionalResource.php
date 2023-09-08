<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DevotionalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'             => $this->title,
            'content'           => $this->content,
            'date'              => $this->date,
            'key_scripture'     => $this->key_scripture,
            'devotional_author' => new DevotionalAuthorResource($this->author),
        ];
    }
}
