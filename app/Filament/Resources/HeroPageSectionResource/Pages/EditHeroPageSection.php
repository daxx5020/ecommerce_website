<?php

namespace App\Filament\Resources\HeroPageSectionResource\Pages;

use App\Filament\Resources\HeroPageSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeroPageSection extends EditRecord
{
    protected static string $resource = HeroPageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
