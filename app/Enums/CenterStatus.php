<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum CenterStatus: string implements HasLabel, HasColor
{
    case Active = 'active';
    case Deactivated = 'deactivated';
    case Closed = 'closed';

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Deactivated => 'warning',
            self::Active => 'success',
            self::Closed => 'danger',
        };
    }
}
