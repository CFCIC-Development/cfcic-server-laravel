<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Member;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $member = Member::find($data['member_id']);
        $data['name'] = $member->fname . ' ' . $member->lname;
        $data['email'] = $member->email;
        $data['email_verified_at'] = now();

        return $data;
    }
}
