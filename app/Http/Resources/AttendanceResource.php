<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'event_id'               => $this->event_id,
            'user_id'                => $this->user_id,
            'in_person'              => $this->in_person,
            'requires_feeding'       => $this->requires_feeding,
            'requires_accommodation' => $this->requires_accommodation,
            'requires_transport'     => $this->requires_transport,
            'services_required'      => $this->services_required,
            'children'               => $this->children,
            'dates_attending'        => $this->dates_attending,
            'checked_in'             => $this->checked_in,
        ];
    }
}
