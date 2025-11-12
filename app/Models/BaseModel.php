<?php

declare(strict_types=1);

namespace Modules\Tenant\Models;

<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Models\XotBaseModel;

/**
 * Base Model for Tenant module.
 *
 * Extends XotBaseModel which provides:
 * - Standard properties (snakeAttributes, incrementing, timestamps, perPage, etc.)
 * - Common casts (id, uuid, timestamps, audit fields)
 * - Traits (HasXotFactory, RelationX, Updater)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @see \Modules\Xot\Models\XotBaseModel
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModel.
 *
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
>>>>>>> 0f9bf43 (.)
 */
abstract class BaseModel extends XotBaseModel
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'tenant';

    /**
     * Get the attributes that should be cast.
     *
     * Only adds module-specific casts.
     * Common casts (id, uuid, published_at, created_at, updated_at, deleted_at, audit fields)
     * are inherited from XotBaseModel.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'verified_at' => 'datetime', // ✅ Tenant-specific cast
        ]);
    }
}
