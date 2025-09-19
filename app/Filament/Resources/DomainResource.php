<?php

declare(strict_types=1);

namespace Modules\Tenant\Filament\Resources;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> 15079c8 (.)
=======
use Override;
>>>>>>> 764bbef (.)
use Modules\Tenant\Filament\Resources\DomainResource\Pages\ListDomains;
use Modules\Tenant\Filament\Resources\DomainResource\Pages\CreateDomain;
use Modules\Tenant\Filament\Resources\DomainResource\Pages\EditDomain;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Modules\Tenant\Filament\Resources\DomainResource\Pages;
use Modules\Tenant\Models\Domain;
use Modules\Xot\Filament\Resources\XotBaseResource;

class DomainResource extends XotBaseResource
{
<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|string $model = Domain::class;

    #[Override]
=======
    protected static ?string $model = Domain::class;

>>>>>>> 15079c8 (.)
=======
    protected static null|string $model = Domain::class;

    #[Override]
>>>>>>> 764bbef (.)
    public static function getFormSchema(): array
    {
        return [
            'title' => TextInput::make('title')
                ->required()
                ->string()
                ->maxLength(255),
            'brand' => TextInput::make('brand')
                ->required()
                ->string()
                ->maxLength(255),
            'category' => TextInput::make('category')
                ->required()
                ->string()
                ->maxLength(255),
<<<<<<< HEAD
<<<<<<< HEAD
            'description' => RichEditor::make('description')->required()->string(),
=======
            'description' => RichEditor::make('description')
                ->required()
                ->string(),
>>>>>>> 15079c8 (.)
=======
            'description' => RichEditor::make('description')->required()->string(),
>>>>>>> 764bbef (.)
            'price' => TextInput::make('price')
                ->required()
                ->numeric()
                ->prefix('$'),
            'rating' => TextInput::make('rating')
                ->required()
                ->numeric()
                ->minValue(0)
                ->maxValue(5),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[Override]
<<<<<<< HEAD
=======
    public static function getRelations(): array
    {
        return [
        ];
    }

>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
    public static function getPages(): array
    {
        return [
            'index' => ListDomains::route('/'),
            'create' => CreateDomain::route('/create'),
            'edit' => EditDomain::route('/{record}/edit'),
        ];
    }
}
