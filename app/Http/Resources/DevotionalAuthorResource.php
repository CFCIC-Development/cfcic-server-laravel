<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DevotionalAuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'author_name'   => $this->author_name,
            'biography'     => $this->biography,
            'contact_email' => $this->contact_email,
            'website'       => $this->website,
        ];;
    }
}
