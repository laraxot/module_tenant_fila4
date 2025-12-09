<?php

declare(strict_types=1);

namespace Modules\Tenant\Filament\Resources;

<<<<<<< HEAD
use Override;
use Modules\Tenant\Filament\Resources\DomainResource\Pages\ListDomains;
use Modules\Tenant\Filament\Resources\DomainResource\Pages\CreateDomain;
use Modules\Tenant\Filament\Resources\DomainResource\Pages\EditDomain;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
use Modules\Tenant\Filament\Resources\DomainResource\Pages\ListDomains;
use Modules\Tenant\Filament\Resources\DomainResource\Pages\CreateDomain;
use Modules\Tenant\Filament\Resources\DomainResource\Pages\EditDomain;
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Modules\Tenant\Filament\Resources\DomainResource\Pages;
use Modules\Tenant\Models\Domain;
use Modules\Xot\Filament\Resources\XotBaseResource;

class DomainResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static null|string $model = Domain::class;

    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|string $model = Domain::class;

    #[Override]
=======
    protected static ?string $model = Domain::class;

>>>>>>> a12f125f4a (.)
=======
    protected static null|string $model = Domain::class;

    #[Override]
>>>>>>> b93ef594b4 (.)
=======
    protected static ?string $model = Domain::class;

>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
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
            'description' => RichEditor::make('description')->required()->string(),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'description' => RichEditor::make('description')->required()->string(),
=======
            'description' => RichEditor::make('description')
                ->required()
                ->string(),
>>>>>>> a12f125f4a (.)
=======
            'description' => RichEditor::make('description')->required()->string(),
>>>>>>> b93ef594b4 (.)
=======
            'description' => RichEditor::make('description')
                ->required()
                ->string(),
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[Override]
<<<<<<< HEAD
=======
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public static function getRelations(): array
    {
        return [];
    }

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
    public static function getPages(): array
    {
        return [
            'index' => ListDomains::route('/'),
            'create' => CreateDomain::route('/create'),
            'edit' => EditDomain::route('/{record}/edit'),
<<<<<<< HEAD
=======
=======
    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDomains::route('/'),
            'create' => Pages\CreateDomain::route('/create'),
            'edit' => Pages\EditDomain::route('/{record}/edit'),
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        ];
    }
}
