<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ServiceType: string implements HasLabel
{
    case TotalLifeProsperityService = 'total_life_prosperity_service';
    case ConnectToLifeService = 'connect_to_life_service';
    case TivConectToLifeService = 'tiv_conect_to_life_service';
    case BelieversService = 'believers_service';
    case BaptismService = 'baptism_service';
    case SpecialService = 'special_service';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
