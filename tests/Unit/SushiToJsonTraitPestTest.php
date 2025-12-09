<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests\Unit;

<<<<<<< HEAD
use Exception;
=======
<<<<<<< HEAD
use Exception;
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
use Illuminate\Support\Facades\File;
use Modules\Tenant\Models\TestSushiModel;
use Modules\Tenant\Services\TenantService;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    // Configura il modello di test
    $this->model = new TestSushiModel();

    // Configura percorsi di test
    $this->testDirectory = storage_path('tests/sushi-json');
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
    $this->testJsonPath = $this->testDirectory . '/test_sushi.json';

    // Crea directory di test
    if (!File::exists($this->testDirectory)) {
        File::makeDirectory($this->testDirectory, 0o755, true, true);
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    $this->testJsonPath = $this->testDirectory.'/test_sushi.json';

    // Crea directory di test
    if (! File::exists($this->testDirectory)) {
        File::makeDirectory($this->testDirectory, 0755, true, true);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    $this->testJsonPath = $this->testDirectory . '/test_sushi.json';

    // Crea directory di test
    if (!File::exists($this->testDirectory)) {
        File::makeDirectory($this->testDirectory, 0o755, true, true);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    }

    // Mock TenantService per i test
    $this->mock(TenantService::class, function ($mock) {
<<<<<<< HEAD
        $mock->shouldReceive('filePath')->with('database/content/test_sushi.json')->andReturn($this->testJsonPath);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $mock->shouldReceive('filePath')->with('database/content/test_sushi.json')->andReturn($this->testJsonPath);
=======
        $mock->shouldReceive('filePath')
            ->with('database/content/test_sushi.json')
            ->andReturn($this->testJsonPath);
>>>>>>> a12f125f4a (.)
=======
        $mock->shouldReceive('filePath')->with('database/content/test_sushi.json')->andReturn($this->testJsonPath);
>>>>>>> b93ef594b4 (.)
=======
        $mock->shouldReceive('filePath')
            ->with('database/content/test_sushi.json')
            ->andReturn($this->testJsonPath);
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    });
});

afterEach(function () {
    // Cleanup file di test
    if (File::exists($this->testJsonPath)) {
        File::delete($this->testJsonPath);
    }

    if (File::exists($this->testDirectory)) {
        File::deleteDirectory($this->testDirectory);
    }
});

describe('SushiToJson Trait', function () {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    it('returns correct json file path', function () {
        $path = $this->model->getJsonFile();

        expect($path)->toBe($this->testJsonPath);
        expect($path)->toEndWith('test_sushi.json');
    })->group('getJsonFile', 'traits', 'sushi-json');

    it('loads existing data from json file', function () {
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

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        $rows = $this->model->loadExistingData();

        expect($rows)->toBeArray();
        expect($rows)->toHaveCount(2);
        expect($rows['1']['name'])->toBe('Test Item 1');
        expect($rows['2']['name'])->toBe('Test Item 2');
    })->group('getSushiRows', 'traits', 'sushi-json');

    it('returns empty array when file not exists', function () {
        $rows = $this->model->getSushiRows();

        expect($rows)->toBeArray();
        expect($rows)->toBeEmpty();
    })->group('getSushiRows', 'traits', 'sushi-json');

    it('throws exception with malformed json', function () {
        File::put($this->testJsonPath, 'invalid json content');

        $this->model->getSushiRows();
<<<<<<< HEAD
    })
        ->throws(Exception::class, 'Syntax error')
        ->group('getSushiRows', 'traits', 'sushi-json');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    })
        ->throws(Exception::class, 'Syntax error')
        ->group('getSushiRows', 'traits', 'sushi-json');
=======
    })->throws(Exception::class, 'Syntax error')
      ->group('getSushiRows', 'traits', 'sushi-json');
>>>>>>> a12f125f4a (.)
=======
    })
        ->throws(Exception::class, 'Syntax error')
        ->group('getSushiRows', 'traits', 'sushi-json');
>>>>>>> b93ef594b4 (.)
=======
    })->throws(\Exception::class, 'Syntax error')
      ->group('getSushiRows', 'traits', 'sushi-json');
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)

    it('throws exception with non array data', function () {
        File::put($this->testJsonPath, json_encode('not an array'));

<<<<<<< HEAD
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'JSON file must contain an array');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'JSON file must contain an array');
=======
        expect(fn() => $this->model->getSushiRows())
            ->toThrow(Exception::class, 'JSON file must contain an array');
>>>>>>> a12f125f4a (.)
=======
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'JSON file must contain an array');
>>>>>>> b93ef594b4 (.)
=======
        expect(fn() => $this->model->getSushiRows())
            ->toThrow(\Exception::class, 'JSON file must contain an array');
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    })->group('getSushiRows', 'traits', 'sushi-json');

    it('validates json file structure', function () {
        $validData = [
            '1' => [
                'id' => 1,
                'name' => 'Test Item',
                'status' => 'active',
            ],
        ];
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        File::put($this->testJsonPath, json_encode($validData));

        $rows = $this->model->getSushiRows();

        expect($rows)->toBeArray();
        expect($rows)->toHaveKey('1');
        expect($rows['1'])->toHaveKey('id');
        expect($rows['1'])->toHaveKey('name');
        expect($rows['1'])->toHaveKey('status');
    })->group('getSushiRows', 'validation', 'traits', 'sushi-json');
});

describe('Business Logic Tests', function () {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    it('handles large datasets efficiently', function () {
        $largeData = [];
        for ($i = 1; $i <= 1000; $i++) {
            $largeData[(string) $i] = [
                'id' => $i,
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
                'name' => "Item {$i}",
                'status' => ($i % 2) === 0 ? 'active' : 'inactive',
                'created_at' => now()->toISOString(),
            ];
        }

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
                'name' => "Item $i",
                'status' => $i % 2 === 0 ? 'active' : 'inactive',
                'created_at' => now()->toISOString(),
            ];
        }
        
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
                'name' => "Item {$i}",
                'status' => ($i % 2) === 0 ? 'active' : 'inactive',
                'created_at' => now()->toISOString(),
            ];
        }

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        File::put($this->testJsonPath, json_encode($largeData));

        $rows = $this->model->getSushiRows();

        expect($rows)->toHaveCount(1000);
        expect($rows['1']['name'])->toBe('Item 1');
        expect($rows['1000']['name'])->toBe('Item 1000');
    })->group('performance', 'traits', 'sushi-json');

    it('preserves data types correctly', function () {
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

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        File::put($this->testJsonPath, json_encode($testData));

        $rows = $this->model->getSushiRows();

        expect($rows['1']['id'])->toBeInt();
        expect($rows['1']['name'])->toBeString();
        expect($rows['1']['active'])->toBeBool();
        expect($rows['1']['price'])->toBeFloat();
        expect($rows['1']['metadata'])->toBeArray();
        expect($rows['1']['created_at'])->toBeString();
    })->group('data-types', 'traits', 'sushi-json');
<<<<<<< HEAD
});
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
});
=======
});
>>>>>>> a12f125f4a (.)
=======
});
>>>>>>> b93ef594b4 (.)
=======
});
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
