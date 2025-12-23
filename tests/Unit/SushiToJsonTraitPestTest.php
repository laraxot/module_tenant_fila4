<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests\Unit;

<<<<<<< HEAD
=======
use function Safe\json_encode;


>>>>>>> laraxot/develop
use Exception;
use Illuminate\Support\Facades\File;
use Modules\Tenant\Models\TestSushiModel;
use Modules\Tenant\Services\TenantService;
use Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
beforeEach(function () {
=======
beforeEach(function (): void {
>>>>>>> laraxot/develop
    // Configura il modello di test
    $this->model = new TestSushiModel;

    // Configura percorsi di test
    $this->testDirectory = storage_path('tests/sushi-json');
    $this->testJsonPath = $this->testDirectory.'/test_sushi.json';

    // Crea directory di test
<<<<<<< HEAD
    if (! File::exists($this->testDirectory)) {
=======
    /** @phpstan-ignore-next-line property.notFound */
    if (! File::exists($this->testDirectory)) {
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
        File::makeDirectory($this->testDirectory, 0o755, true, true);
    }

    // Mock TenantService per i test
<<<<<<< HEAD
    $this->mock(TenantService::class, function ($mock) {
=======
    /** @phpstan-ignore-next-line property.notFound, method.nonObject */
    $this->mock(TenantService::class, function ($mock): void {
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
>>>>>>> laraxot/develop
        $mock->shouldReceive('filePath')->with('database/content/test_sushi.json')->andReturn($this->testJsonPath);
    });
});

<<<<<<< HEAD
afterEach(function () {
    // Cleanup file di test
    if (File::exists($this->testJsonPath)) {
        File::delete($this->testJsonPath);
    }

    if (File::exists($this->testDirectory)) {
=======
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
>>>>>>> laraxot/develop
        File::deleteDirectory($this->testDirectory);
    }
});

<<<<<<< HEAD
describe('SushiToJson Trait', function () {
    it('returns correct json file path', function () {
        $path = $this->model->getJsonFile();

=======
describe('SushiToJson Trait', function (): void {
    it('returns correct json file path', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $path = $this->model->getJsonFile();

        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
        expect($path)->toBe($this->testJsonPath);
        expect($path)->toEndWith('test_sushi.json');
    })->group('getJsonFile', 'traits', 'sushi-json');

<<<<<<< HEAD
    it('loads existing data from json file', function () {
=======
    it('loads existing data from json file', function (): void {
>>>>>>> laraxot/develop
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

<<<<<<< HEAD
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

=======
        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
        $rows = $this->model->loadExistingData();

        expect($rows)->toBeArray();
        expect($rows)->toHaveCount(2);
<<<<<<< HEAD
        expect($rows['1']['name'])->toBe('Test Item 1');
        expect($rows['2']['name'])->toBe('Test Item 2');
    })->group('getSushiRows', 'traits', 'sushi-json');

    it('returns empty array when file not exists', function () {
=======
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1']['name'])->toBe('Test Item 1');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['2']['name'])->toBe('Test Item 2');
    })->group('getSushiRows', 'traits', 'sushi-json');

    it('returns empty array when file not exists', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
        $rows = $this->model->getSushiRows();

        expect($rows)->toBeArray();
        expect($rows)->toBeEmpty();
    })->group('getSushiRows', 'traits', 'sushi-json');

<<<<<<< HEAD
    it('throws exception with malformed json', function () {
        File::put($this->testJsonPath, 'invalid json content');

=======
    it('throws exception with malformed json', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, 'invalid json content');

        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
        $this->model->getSushiRows();
    })
        ->throws(Exception::class, 'Syntax error')
        ->group('getSushiRows', 'traits', 'sushi-json');

<<<<<<< HEAD
    it('throws exception with non array data', function () {
        File::put($this->testJsonPath, json_encode('not an array'));

        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'JSON file must contain an array');
    })->group('getSushiRows', 'traits', 'sushi-json');

    it('validates json file structure', function () {
=======
    it('throws exception with non array data', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, json_encode('not an array'));

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'JSON file must contain an array');
    })->group('getSushiRows', 'traits', 'sushi-json');

    it('validates json file structure', function (): void {
>>>>>>> laraxot/develop
        $validData = [
            '1' => [
                'id' => 1,
                'name' => 'Test Item',
                'status' => 'active',
            ],
        ];

<<<<<<< HEAD
        File::put($this->testJsonPath, json_encode($validData));

=======
        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, json_encode($validData));

        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
        $rows = $this->model->getSushiRows();

        expect($rows)->toBeArray();
        expect($rows)->toHaveKey('1');
<<<<<<< HEAD
        expect($rows['1'])->toHaveKey('id');
        expect($rows['1'])->toHaveKey('name');
=======
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1'])->toHaveKey('id');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1'])->toHaveKey('name');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
>>>>>>> laraxot/develop
        expect($rows['1'])->toHaveKey('status');
    })->group('getSushiRows', 'validation', 'traits', 'sushi-json');
});

<<<<<<< HEAD
describe('Business Logic Tests', function () {
    it('handles large datasets efficiently', function () {
        $largeData = [];
        for ($i = 1; $i <= 1000; $i++) {
=======
describe('Business Logic Tests', function (): void {
    it('handles large datasets efficiently', function (): void {
        $largeData = [];
        for ($i = 1; $i <= 1000; $i++) {
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
>>>>>>> laraxot/develop
            $largeData[(string) $i] = [
                'id' => $i,
                'name' => "Item {$i}",
                'status' => ($i % 2) === 0 ? 'active' : 'inactive',
                'created_at' => now()->toISOString(),
            ];
        }

<<<<<<< HEAD
        File::put($this->testJsonPath, json_encode($largeData));

        $rows = $this->model->getSushiRows();

        expect($rows)->toHaveCount(1000);
        expect($rows['1']['name'])->toBe('Item 1');
        expect($rows['1000']['name'])->toBe('Item 1000');
    })->group('performance', 'traits', 'sushi-json');

    it('preserves data types correctly', function () {
=======
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
>>>>>>> laraxot/develop
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

<<<<<<< HEAD
        File::put($this->testJsonPath, json_encode($testData));

        $rows = $this->model->getSushiRows();

        expect($rows['1']['id'])->toBeInt();
        expect($rows['1']['name'])->toBeString();
        expect($rows['1']['active'])->toBeBool();
        expect($rows['1']['price'])->toBeFloat();
        expect($rows['1']['metadata'])->toBeArray();
=======
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
>>>>>>> laraxot/develop
        expect($rows['1']['created_at'])->toBeString();
    })->group('data-types', 'traits', 'sushi-json');
});
