<?php

declare(strict_types=1);

<<<<<<< HEAD
use Tests\TestCase;
=======
<<<<<<< HEAD
use Tests\TestCase;
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Modules\Tenant\Models\TestSushiModel;
use Modules\Tenant\Services\TenantService;

<<<<<<< HEAD
uses(TestCase::class);
=======
<<<<<<< HEAD
uses(TestCase::class);
=======
uses(Tests\TestCase::class);
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)

/**
 * Test unitari per il trait SushiToJson.
 *
 * Testa tutte le funzionalità del trait in isolamento,
 * utilizzando mock per le dipendenze esterne.
 */

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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
        $mock->shouldReceive('filePath')->with('database/content/test_sushi.json')->andReturn($this->testJsonPath);
    });

    // Helper per creare dati di test
    $this->createTestData = fn() => [
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
=======
=======
>>>>>>> origin/develop
        $mock->shouldReceive('filePath')
            ->with('database/content/test_sushi.json')
            ->andReturn($this->testJsonPath);
    });

    // Helper per creare dati di test
    $this->createTestData = function () {
        return [
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
    };
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $mock->shouldReceive('filePath')->with('database/content/test_sushi.json')->andReturn($this->testJsonPath);
    });

    // Helper per creare dati di test
    $this->createTestData = fn() => [
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
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
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
    it('returns correct json file path', function () {
        $path = $this->model->getJsonFile();

<<<<<<< HEAD
        expect($path)->toBe($this->testJsonPath)->and($path)->toEndWith('test_sushi.json');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        expect($path)->toBe($this->testJsonPath)->and($path)->toEndWith('test_sushi.json');
=======
        expect($path)->toBe($this->testJsonPath)
            ->and($path)->toEndWith('test_sushi.json');
>>>>>>> a12f125f4a (.)
=======
        expect($path)->toBe($this->testJsonPath)->and($path)->toEndWith('test_sushi.json');
>>>>>>> b93ef594b4 (.)
=======
        expect($path)->toBe($this->testJsonPath)
            ->and($path)->toEndWith('test_sushi.json');
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    });

    it('loads existing data from json file', function () {
        $testData = ($this->createTestData)();
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        $rows = $this->model->loadExistingData();

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
        expect($rows)
            ->toBeArray()
            ->toHaveCount(2)
            ->and($rows['1']['name'])
            ->toBe('Test Item 1')
            ->and($rows['2']['name'])
            ->toBe('Test Item 2');
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        expect($rows)->toBeArray()
            ->toHaveCount(2)
            ->and($rows['1']['name'])->toBe('Test Item 1')
            ->and($rows['2']['name'])->toBe('Test Item 2');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        expect($rows)
            ->toBeArray()
            ->toHaveCount(2)
            ->and($rows['1']['name'])
            ->toBe('Test Item 1')
            ->and($rows['2']['name'])
            ->toBe('Test Item 2');
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    });

    it('returns empty array when file not exists', function () {
        $rows = $this->model->getSushiRows();

<<<<<<< HEAD
        expect($rows)->toBeArray()->toBeEmpty();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        expect($rows)->toBeArray()->toBeEmpty();
=======
        expect($rows)->toBeArray()
            ->toBeEmpty();
>>>>>>> a12f125f4a (.)
=======
        expect($rows)->toBeArray()->toBeEmpty();
>>>>>>> b93ef594b4 (.)
=======
        expect($rows)->toBeArray()
            ->toBeEmpty();
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    });

    it('throws exception with malformed json', function () {
        File::put($this->testJsonPath, 'invalid json content');

<<<<<<< HEAD
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'Syntax error');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'Syntax error');
=======
        expect(fn () => $this->model->getSushiRows())
            ->toThrow(Exception::class, 'Syntax error');
>>>>>>> a12f125f4a (.)
=======
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'Syntax error');
>>>>>>> b93ef594b4 (.)
=======
        expect(fn () => $this->model->getSushiRows())
            ->toThrow(\Exception::class, 'Syntax error');
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    });

    it('throws exception with non array data', function () {
        File::put($this->testJsonPath, '"string data"');

<<<<<<< HEAD
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'Data is not array');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'Data is not array');
=======
        expect(fn () => $this->model->getSushiRows())
            ->toThrow(Exception::class, 'Data is not array');
>>>>>>> a12f125f4a (.)
=======
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'Data is not array');
>>>>>>> b93ef594b4 (.)
=======
        expect(fn () => $this->model->getSushiRows())
            ->toThrow(\Exception::class, 'Data is not array');
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    });

    it('normalizes nested arrays to json strings', function () {
        $testData = [
            '1' => [
                'id' => 1,
                'name' => 'Test',
                'metadata' => ['nested' => 'value'],
                'tags' => ['tag1', 'tag2'],
            ],
        ];

        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        $rows = $this->model->getSushiRows();

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
        expect($rows['1']['metadata'])
            ->toBeString()
            ->toBe('{"nested":"value"}')
            ->and($rows['1']['tags'])
            ->toBeString()
<<<<<<< HEAD
=======
=======
        expect($rows['1']['metadata'])->toBeString()
            ->toBe('{"nested":"value"}')
            ->and($rows['1']['tags'])->toBeString()
>>>>>>> a12f125f4a (.)
=======
        expect($rows['1']['metadata'])
            ->toBeString()
            ->toBe('{"nested":"value"}')
            ->and($rows['1']['tags'])
            ->toBeString()
>>>>>>> b93ef594b4 (.)
=======
        expect($rows['1']['metadata'])->toBeString()
            ->toBe('{"nested":"value"}')
            ->and($rows['1']['tags'])->toBeString()
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
            ->toBe('["tag1","tag2"]');
    });

    it('saves data successfully to json file', function () {
        $testData = ($this->createTestData)();

        $result = $this->model->saveToJson($testData);

        expect($result)->toBeTrue();
        expect($this->testJsonPath)->toBeFile();

        $savedData = json_decode(File::get($this->testJsonPath), true);
        expect($savedData)->toBe($testData);
    });

    it('creates directory if not exists', function () {
        // Rimuovi directory di test
        if (File::exists($this->testDirectory)) {
            File::deleteDirectory($this->testDirectory);
        }

        $testData = ($this->createTestData)();

        $result = $this->model->saveToJson($testData);

        expect($result)->toBeTrue();
        expect($this->testDirectory)->toBeDirectory();
        expect($this->testJsonPath)->toBeFile();
    });

    it('handles save errors gracefully', function () {
        // Mock File facade per simulare errore di scrittura
<<<<<<< HEAD
        File::shouldReceive('put')->once()->andReturn(false);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        File::shouldReceive('put')->once()->andReturn(false);
=======
        File::shouldReceive('put')
            ->once()
            ->andReturn(false);
>>>>>>> a12f125f4a (.)
=======
        File::shouldReceive('put')->once()->andReturn(false);
>>>>>>> b93ef594b4 (.)
=======
        File::shouldReceive('put')
            ->once()
            ->andReturn(false);
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)

        $testData = ($this->createTestData)();

        $result = $this->model->saveToJson($testData);

        expect($result)->toBeFalse();
    });

    it('handles creating event correctly', function () {
        // Mock Auth per simulare utente autenticato
<<<<<<< HEAD
        Auth::shouldReceive('id')->andReturn(1);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Auth::shouldReceive('id')->andReturn(1);
=======
        Auth::shouldReceive('id')
            ->andReturn(1);
>>>>>>> a12f125f4a (.)
=======
        Auth::shouldReceive('id')->andReturn(1);
>>>>>>> b93ef594b4 (.)
=======
        Auth::shouldReceive('id')
            ->andReturn(1);
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)

        $testData = [
            'name' => 'New Item',
            'description' => 'New Description',
        ];

        $model = new TestSushiModel();
        $model->fill($testData);

        // Test che il modello può essere creato con i dati
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
        expect($model->name)->toBe('New Item')->and($model->description)->toBe('New Description');

        // Test che i metodi del trait funzionano
        expect($model->getJsonFile())->toBeString()->toEndWith('test_sushi.json');
<<<<<<< HEAD
=======
=======
        expect($model->name)->toBe('New Item')
            ->and($model->description)->toBe('New Description');

        // Test che i metodi del trait funzionano
        expect($model->getJsonFile())->toBeString()
            ->toEndWith('test_sushi.json');
>>>>>>> a12f125f4a (.)
=======
        expect($model->name)->toBe('New Item')->and($model->description)->toBe('New Description');

        // Test che i metodi del trait funzionano
        expect($model->getJsonFile())->toBeString()->toEndWith('test_sushi.json');
>>>>>>> b93ef594b4 (.)
=======
        expect($model->name)->toBe('New Item')
            ->and($model->description)->toBe('New Description');
        
        // Test che i metodi del trait funzionano
        expect($model->getJsonFile())->toBeString()
            ->toEndWith('test_sushi.json');
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    });

    it('handles updating event correctly', function () {
        // Mock Auth per simulare utente autenticato
<<<<<<< HEAD
        Auth::shouldReceive('id')->andReturn(1);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Auth::shouldReceive('id')->andReturn(1);
=======
        Auth::shouldReceive('id')
            ->andReturn(1);
>>>>>>> a12f125f4a (.)
=======
        Auth::shouldReceive('id')->andReturn(1);
>>>>>>> b93ef594b4 (.)
=======
        Auth::shouldReceive('id')
            ->andReturn(1);
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)

        $testData = ($this->createTestData)();
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        $model = new TestSushiModel();
        $model->id = 1;
        $model->fill(['name' => 'Updated Name']);

        // Test che il modello può essere aggiornato
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
        expect($model->name)->toBe('Updated Name')->and($model->id)->toBe(1);

        // Test che i dati esistenti possono essere caricati
        $existingData = $model->loadExistingData();
        expect($existingData)->toHaveKey('1')->and($existingData['1']['name'])->toBe('Test Item 1');
<<<<<<< HEAD
=======
=======
        expect($model->name)->toBe('Updated Name')
            ->and($model->id)->toBe(1);

=======
        expect($model->name)->toBe('Updated Name')
            ->and($model->id)->toBe(1);
        
>>>>>>> origin/develop
        // Test che i dati esistenti possono essere caricati
        $existingData = $model->loadExistingData();
        expect($existingData)->toHaveKey('1')
            ->and($existingData['1']['name'])->toBe('Test Item 1');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        expect($model->name)->toBe('Updated Name')->and($model->id)->toBe(1);

        // Test che i dati esistenti possono essere caricati
        $existingData = $model->loadExistingData();
        expect($existingData)->toHaveKey('1')->and($existingData['1']['name'])->toBe('Test Item 1');
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    });

    it('handles deleting event correctly', function () {
        $testData = ($this->createTestData)();
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        $model = new TestSushiModel();
        $model->id = 1;

        // Test che il modello può essere configurato per la cancellazione
        expect($model->id)->toBe(1);
<<<<<<< HEAD

        // Test che i dati esistenti possono essere caricati
        $existingData = $model->loadExistingData();
        expect($existingData)->toHaveKey('1')->toHaveKey('2');

=======
<<<<<<< HEAD

        // Test che i dati esistenti possono essere caricati
        $existingData = $model->loadExistingData();
<<<<<<< HEAD
<<<<<<< HEAD
        expect($existingData)->toHaveKey('1')->toHaveKey('2');
=======
        expect($existingData)->toHaveKey('1')
            ->toHaveKey('2');
>>>>>>> a12f125f4a (.)
=======
        expect($existingData)->toHaveKey('1')->toHaveKey('2');
>>>>>>> b93ef594b4 (.)

=======
        
        // Test che i dati esistenti possono essere caricati
        $existingData = $model->loadExistingData();
        expect($existingData)->toHaveKey('1')
            ->toHaveKey('2');
        
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        // Test che il metodo saveToJson funziona
        $result = $model->saveToJson($existingData);
        expect($result)->toBeTrue();
    });

    it('integrates with tenant service correctly', function () {
        $tenantService = app(TenantService::class);
<<<<<<< HEAD

        expect($tenantService)->toBeInstanceOf(TenantService::class);

=======
<<<<<<< HEAD

        expect($tenantService)->toBeInstanceOf(TenantService::class);

=======
        
        expect($tenantService)->toBeInstanceOf(TenantService::class);
        
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        // Verifica che il mock funzioni correttamente
        $path = $this->model->getJsonFile();
        expect($path)->toBe($this->testJsonPath);
    });

    it('handles large datasets efficiently', function () {
        // Crea dataset grande (1000 record)
        $largeData = [];
        for ($i = 1; $i <= 1000; $i++) {
            $largeData[$i] = [
                'id' => $i,
                'name' => "Item {$i}",
                'description' => "Description for item {$i}",
<<<<<<< HEAD
                'status' => ($i % 2) === 0 ? 'active' : 'inactive',
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'status' => ($i % 2) === 0 ? 'active' : 'inactive',
=======
                'status' => $i % 2 === 0 ? 'active' : 'inactive',
>>>>>>> a12f125f4a (.)
=======
                'status' => ($i % 2) === 0 ? 'active' : 'inactive',
>>>>>>> b93ef594b4 (.)
=======
                'status' => $i % 2 === 0 ? 'active' : 'inactive',
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
                'created_at' => now()->toISOString(),
                'updated_at' => now()->toISOString(),
            ];
        }

        $startTime = microtime(true);
<<<<<<< HEAD

        $result = $this->model->saveToJson($largeData);

=======
<<<<<<< HEAD

        $result = $this->model->saveToJson($largeData);

=======
        
        $result = $this->model->saveToJson($largeData);
        
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;

        expect($result)->toBeTrue();
        expect($executionTime)->toBeLessThan(1.0);
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        // Verifica caricamento
        $startTime = microtime(true);
        $rows = $this->model->getSushiRows();
        $endTime = microtime(true);
        $loadTime = $endTime - $startTime;

        expect($rows)->toHaveCount(1000);
        expect($loadTime)->toBeLessThan(0.5);
    });

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
    it('logs errors appropriately', function () {
        // Mock Log facade per verificare logging
        $this->mock('log', function ($mock) {
            $mock->shouldReceive('error')->once()->with('Failed to save data to JSON file', Mockery::any());
        });

        // Simula errore di salvataggio
        File::shouldReceive('put')->once()->andReturn(false);
<<<<<<< HEAD
=======
=======

=======
>>>>>>> b93ef594b4 (.)
    it('logs errors appropriately', function () {
        // Mock Log facade per verificare logging
        $this->mock('log', function ($mock) {
            $mock->shouldReceive('error')->once()->with('Failed to save data to JSON file', Mockery::any());
        });

        // Simula errore di salvataggio
<<<<<<< HEAD
        File::shouldReceive('put')
            ->once()
            ->andReturn(false);
>>>>>>> a12f125f4a (.)
=======
        File::shouldReceive('put')->once()->andReturn(false);
>>>>>>> b93ef594b4 (.)
=======

    it('logs errors appropriately', function () {
        // Mock Log facade per verificare logging
        $this->mock('log', function ($mock) {
            $mock->shouldReceive('error')
                ->once()
                ->with('Failed to save data to JSON file', \Mockery::any());
        });

        // Simula errore di salvataggio
        File::shouldReceive('put')
            ->once()
            ->andReturn(false);
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)

        $testData = ($this->createTestData)();
        $result = $this->model->saveToJson($testData);

        expect($result)->toBeFalse();
    });

    it('maintains data integrity during operations', function () {
        $originalData = ($this->createTestData)();
        File::put($this->testJsonPath, json_encode($originalData, JSON_PRETTY_PRINT));

        // Verifica che i dati originali siano preservati
        $loadedData = $this->model->loadExistingData();
        expect($loadedData)->toBe($originalData);

        // Aggiorna un record
        $updatedData = $originalData;
        $updatedData['1']['name'] = 'Updated Name';
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        $result = $this->model->saveToJson($updatedData);
        expect($result)->toBeTrue();

        // Verifica che solo il record specifico sia stato aggiornato
        $finalData = $this->model->loadExistingData();
<<<<<<< HEAD
        expect($finalData['1']['name'])->toBe('Updated Name')->and($finalData['2']['name'])->toBe('Test Item 2'); // Non modificato
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        expect($finalData['1']['name'])->toBe('Updated Name')->and($finalData['2']['name'])->toBe('Test Item 2'); // Non modificato
=======
        expect($finalData['1']['name'])->toBe('Updated Name')
            ->and($finalData['2']['name'])->toBe('Test Item 2'); // Non modificato
>>>>>>> a12f125f4a (.)
=======
        expect($finalData['1']['name'])->toBe('Updated Name')->and($finalData['2']['name'])->toBe('Test Item 2'); // Non modificato
>>>>>>> b93ef594b4 (.)
=======
        expect($finalData['1']['name'])->toBe('Updated Name')
            ->and($finalData['2']['name'])->toBe('Test Item 2'); // Non modificato
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    });

    it('handles empty and null values correctly', function () {
        $testData = [
            '1' => [
                'id' => 1,
                'name' => '',
                'description' => null,
                'metadata' => [],
                'status' => false,
            ],
        ];

        $result = $this->model->saveToJson($testData);
        expect($result)->toBeTrue();

        $loadedData = $this->model->getSushiRows();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
        expect($loadedData['1']['name'])
            ->toBe('')
            ->and($loadedData['1']['description'])
            ->toBeNull()
            ->and($loadedData['1']['metadata'])
            ->toBe('[]') // Convertito in stringa JSON
            ->and($loadedData['1']['status'])
            ->toBeFalse();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        expect($loadedData['1']['name'])->toBe('')
            ->and($loadedData['1']['description'])->toBeNull()
            ->and($loadedData['1']['metadata'])->toBe('[]') // Convertito in stringa JSON
            ->and($loadedData['1']['status'])->toBeFalse();
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    });

    it('handles unicode and special characters', function () {
        $testData = [
            '1' => [
                'id' => 1,
                'name' => 'Café & Résumé 🚀',
                'description' => 'Test con caratteri speciali: é, è, ñ, 中文, 🎉',
                'tags' => ['tag-é', 'tag-è', 'tag-ñ'],
            ],
        ];

        $result = $this->model->saveToJson($testData);
        expect($result)->toBeTrue();

        $loadedData = $this->model->getSushiRows();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
        expect($loadedData['1']['name'])
            ->toBe('Café & Résumé 🚀')
            ->and($loadedData['1']['description'])
            ->toBe('Test con caratteri speciali: é, è, ñ, 中文, 🎉')
            ->and($loadedData['1']['tags'])
            ->toBe('["tag-é","tag-è","tag-ñ"]');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        expect($loadedData['1']['name'])->toBe('Café & Résumé 🚀')
            ->and($loadedData['1']['description'])->toBe('Test con caratteri speciali: é, è, ñ, 中文, 🎉')
            ->and($loadedData['1']['tags'])->toBe('["tag-é","tag-è","tag-ñ"]');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        expect($loadedData['1']['name'])->toBe('Café & Résumé 🚀')
            ->and($loadedData['1']['description'])->toBe('Test con caratteri speciali: é, è, ñ, 中文, 🎉')
            ->and($loadedData['1']['tags'])->toBe('["tag-é","tag-è","tag-ñ"]');
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    });
});
