<?php

declare(strict_types=1);

namespace Modules\Tenant\Filament\Resources\DomainResource\Pages;

<<<<<<< HEAD
use Override;
use Filament\Tables\Columns\TextColumn;
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
use Filament\Tables\Columns\TextColumn;
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
use Filament\Tables;
use Modules\Tenant\Filament\Resources\DomainResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListDomains extends XotBaseListRecords
{
    protected static string $resource = DomainResource::class;

<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->numeric()
                ->sortable()
                ->searchable(),
<<<<<<< HEAD
            'domain' => TextColumn::make('domain')->sortable()->searchable(),
=======
<<<<<<< HEAD
<<<<<<< HEAD
            'domain' => TextColumn::make('domain')->sortable()->searchable(),
=======
            'domain' => TextColumn::make('domain')
                ->sortable()
                ->searchable(),
>>>>>>> a12f125f4a (.)
=======
            'domain' => TextColumn::make('domain')->sortable()->searchable(),
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
            'tenant_id' => TextColumn::make('tenant_id')
                ->numeric()
                ->sortable()
                ->searchable(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => TextColumn::make('updated_at')
<<<<<<< HEAD
=======
=======
    public function getTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->numeric()
                ->sortable()
                ->searchable(),
            'domain' => Tables\Columns\TextColumn::make('domain')
                ->sortable()
                ->searchable(),
            'tenant_id' => Tables\Columns\TextColumn::make('tenant_id')
                ->numeric()
                ->sortable()
                ->searchable(),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}

// public static function table(Table $table): Table
// {
//     return $table
//         ->columns([
//             TextColumn::make('name')
//                 ->searchable()
//                 ->sortable()
//                 ->weight('medium')
//                 ->alignLeft(),
//         ]);
// }

// public static function tableOld(Table $table): Table
// {
//     return $table
//         ->columns([
//             // thumbnail
//             ImageColumn::make('thumbnail')
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
//
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
//
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
//                 ->rounded(),

//             // title
//             TextColumn::make('title')
//                 ->searchable()
//                 ->sortable()
//                 ->weight('medium')
//                 ->alignLeft(),

//             // brand
//             TextColumn::make('brand')
//                 ->searchable()
//                 ->sortable()
//                 ->color('gray')
//                 ->alignLeft(),

//             // category
//             TextColumn::make('category')
//                 ->sortable()
//                 ->searchable(),

//             // description
//             TextColumn::make('description')
//                 ->sortable()
//                 ->searchable()
//                 ->limit(30),

//             // price
//             BadgeColumn::make('price')
//                 ->colors(['secondary'])
//                 ->prefix('$')
//                 ->sortable()
//                 ->searchable(),

//             // rating
//             BadgeColumn::make('rating')
//                 ->colors([
//                     'danger' => static fn ($state): bool => $state <= 3,
//                     'warning' => static fn ($state): bool => $state > 3 && $state <= 4.5,
//                     'success' => static fn ($state): bool => $state > 4.5,
//                 ])
//                 ->sortable()
//                 ->searchable(),
//         ])
//         ->filters([
//             // brand
//             SelectFilter::make('brand')
//                 ->multiple()
//                 ->options(Domain::select('brand')
//                     ->distinct()
//                     ->get()
//                     ->pluck('brand', 'brand')
//                 ),

//             // category
//             SelectFilter::make('category')
//                 ->multiple()
//                 ->options(Domain::select('category')
//                     ->distinct()
//                     ->get()
//                     ->pluck('category', 'category')
//                 ),
//         ])
//         ->actions([
//             Tables\Actions\EditAction::make(),
//         ])
//         ->bulkActions([
//             Tables\Actions\BulkActionGroup::make([
//                 Tables\Actions\DeleteBulkAction::make(),
//             ]),
//         ])
//         ->emptyStateActions([
//         ]);
// }
