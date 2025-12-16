<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests\Unit;

use Exception;
use Illuminate\Support\Facades\File;
use Modules\Tenant\Models\TestSushiModel;
use Modules\Tenant\Services\TenantService;
use Tests\TestCase;

use function Safe\json_encode;

uses(TestCase::class);

beforeEach(function (): void {
    // Configura il modello di test
    $this->model = new TestSushiModel;

    // Configura percorsi di test
    $this->testDirectory = storage_path('tests/sushi-json');
    $this->testJsonPath = $this->testDirectory.'/test_sushi.json';

    // Crea directory di test
    /** @phpstan-ignore-next-line property.notFound */
    if (! File::exists($this->testDirectory)) {
        /** @phpstan-ignore-next-line property.notFound */
        File::makeDirectory($this->testDirectory, 0o755, true, true);
    }

    // Mock TenantService per i test
    /** @phpstan-ignore-next-line property.notFound, method.nonObject */
    $this->mock(TenantService::class, function ($mock): void {
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $mock->shouldReceive('filePath')->with('database/content/test_sushi.json')->andReturn($this->testJsonPath);
    });
});

afterEach(function (): void {
    // Cleanup file di test
    /** @phpstan-ignore-next-line property.notFound */
    if (File::exists($this->testJsonPath)) {
        /** @phpstan-ignore-next-line property.notFound */
        File::delete($this->testJsonPath);
    }

    /** @phpstan-ignore-next-line property.notFound */
    if (File::exists($this->testDirectory)) {
        /** @phpstan-ignore-next-line property.notFound */
        File::deleteDirectory($this->testDirectory);
    }
});

describe('SushiToJson Trait', function (): void {
    it('returns correct json file path', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $path = $this->model->getJsonFile();

        /** @phpstan-ignore-next-line property.notFound */
        expect($path)->toBe($this->testJsonPath);
        expect($path)->toEndWith('test_sushi.json');
    })->group('getJsonFile', 'traits', 'sushi-json');

    it('loads existing data from json file', function (): void {
        $testData = [
            '1' => [
                'id' => 1,
                'name' => 'Test Item 1',
                'description' => 'Description 1',
                'status' => 'active',
                'metadata' => ['key1' => 'value1', 'key2' => 'value2'],
                'created_at' => now()->toISOString(),
                'updated_at' => now()->toISOString(),
            ],
            '2' => [
                'id' => 2,
                'name' => 'Test Item 2',
                'description' => 'Description 2',
                'status' => 'inactive',
                'metadata' => ['key3' => 'value3'],
                'created_at' => now()->toISOString(),
                'updated_at' => now()->toISOString(),
            ],
        ];

        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        /** @phpstan-ignore-next-line property.notFound */
        $rows = $this->model->loadExistingData();

        expect($rows)->toBeArray();
        expect($rows)->toHaveCount(2);
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1']['name'])->toBe('Test Item 1');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['2']['name'])->toBe('Test Item 2');
    })->group('getSushiRows', 'traits', 'sushi-json');

    it('returns empty array when file not exists', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $rows = $this->model->getSushiRows();

        expect($rows)->toBeArray();
        expect($rows)->toBeEmpty();
    })->group('getSushiRows', 'traits', 'sushi-json');

    it('throws exception with malformed json', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, 'invalid json content');

        /** @phpstan-ignore-next-line property.notFound */
        $this->model->getSushiRows();
    })
        ->throws(Exception::class, 'Syntax error')
        ->group('getSushiRows', 'traits', 'sushi-json');

    it('throws exception with non array data', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, json_encode('not an array'));

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'JSON file must contain an array');
    })->group('getSushiRows', 'traits', 'sushi-json');

    it('validates json file structure', function (): void {
        $validData = [
            '1' => [
                'id' => 1,
                'name' => 'Test Item',
                'status' => 'active',
            ],
        ];

        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, json_encode($validData));

        /** @phpstan-ignore-next-line property.notFound */
        $rows = $this->model->getSushiRows();

        expect($rows)->toBeArray();
        expect($rows)->toHaveKey('1');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1'])->toHaveKey('id');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1'])->toHaveKey('name');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1'])->toHaveKey('status');
    })->group('getSushiRows', 'validation', 'traits', 'sushi-json');
});

describe('Business Logic Tests', function (): void {
    it('handles large datasets efficiently', function (): void {
        $largeData = [];
        for ($i = 1; $i <= 1000; $i++) {
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            $largeData[(string) $i] = [
                'id' => $i,
                'name' => "Item {$i}",
                'status' => ($i % 2) === 0 ? 'active' : 'inactive',
                'created_at' => now()->toISOString(),
            ];
        }

        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, json_encode($largeData));

        /** @phpstan-ignore-next-line property.notFound */
        $rows = $this->model->getSushiRows();

        expect($rows)->toHaveCount(1000);
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1']['name'])->toBe('Item 1');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1000']['name'])->toBe('Item 1000');
    })->group('performance', 'traits', 'sushi-json');

    it('preserves data types correctly', function (): void {
        $testData = [
            '1' => [
                'id' => 1, // integer
                'name' => 'Test Item', // string
                'active' => true, // boolean
                'price' => 19.99, // float
                'metadata' => ['key' => 'value'], // array
                'created_at' => '2024-01-01T10:00:00Z', // string datetime
            ],
        ];

        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, json_encode($testData));

        /** @phpstan-ignore-next-line property.notFound */
        $rows = $this->model->getSushiRows();

        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1']['id'])->toBeInt();
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1']['name'])->toBeString();
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1']['active'])->toBeBool();
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1']['price'])->toBeFloat();
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1']['metadata'])->toBeArray();
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1']['created_at'])->toBeString();
    })->group('data-types', 'traits', 'sushi-json');
});
