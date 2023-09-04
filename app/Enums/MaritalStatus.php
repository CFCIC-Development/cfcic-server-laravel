<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum MaritalStatus: string implements HasLabel, HasColor
{
    case Single = 'single';
    case Married = 'married';
    case Divorced = 'divorced';
    case Separated = 'separated';

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Single => 'single',
            self::Married => 'married',
            self::Divorced => 'divorced',
            self::Separated => 'separated',
        };
    }
}
