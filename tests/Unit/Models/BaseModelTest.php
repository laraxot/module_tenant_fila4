<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Tenant\Models\BaseModel;
<<<<<<< HEAD
=======
use Tests\TestCase;

>>>>>>> ae7d3a00 (Based on the diff and following the repository's commit style, here's the commit message:)

beforeEach(function (): void {
    $this->baseModel = new class extends BaseModel
    {
        protected $table = 'test_tenant_table';
    };
});

test('base model extends eloquent model', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has correct table name', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel->getTable())->toBe('test_tenant_table');
});

test('base model can be instantiated', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
});

test('base model has proper inheritance chain', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has timestamps enabled', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel->usesTimestamps())->toBeTrue();
});
