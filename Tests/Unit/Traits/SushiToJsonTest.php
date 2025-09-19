<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests\Unit\Traits;

use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Mockery;
use Modules\Tenant\Models\TestSushiModel;
use Modules\Tenant\Services\TenantService;
use Tests\TestCase;

/**
 * Test unitari per il trait SushiToJson.
 */
class SushiToJsonTest extends TestCase
{
    use RefreshDatabase;

    private TestSushiModel $model;
    private string $testJsonPath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->model = new TestSushiModel();
        $this->testJsonPath = TenantService::filePath('database/content/test_sushi.json');

        // Pulisce eventuali file di test esistenti
        if (File::exists($this->testJsonPath)) {
            File::delete($this->testJsonPath);
        }

        // Rimuove la directory se esiste
        $directory = dirname($this->testJsonPath);
        if (File::exists($directory)) {
            File::deleteDirectory($directory);
        }
    }

    protected function tearDown(): void
    {
        // Pulisce i file di test
        if (File::exists($this->testJsonPath)) {
            File::delete($this->testJsonPath);
        }

        $directory = dirname($this->testJsonPath);
        if (File::exists($directory)) {
            File::deleteDirectory($directory);
        }

        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_returns_correct_json_file_path(): void
    {
        $expectedPath = TenantService::filePath('database/content/test_sushi.json');
        $actualPath = $this->model->getJsonFile();

        expect($actualPath)->toBe($expectedPath);
    }

    /** @test */
    public function it_returns_empty_array_when_json_file_not_exists(): void
    {
        $rows = $this->model->getSushiRows();

        expect($rows)->toBe([]);
    }

    /** @test */
    public function it_throws_exception_when_json_data_is_invalid(): void
    {
        // Crea un file JSON con dati non validi
        $directory = dirname($this->testJsonPath);
        File::makeDirectory($directory, 0755, true, true);
        File::put($this->testJsonPath, 'invalid json content');

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid JSON data in file');

        $this->model->getSushiRows();
    }

    /** @test */
    public function it_returns_data_from_valid_json_file(): void
    {
        $testData = [
            '1' => ['id' => 1, 'name' => 'Test Item 1'],
            '2' => ['id' => 2, 'name' => 'Test Item 2'],
        ];

        // Crea il file JSON
        $directory = dirname($this->testJsonPath);
        File::makeDirectory($directory, 0755, true, true);
        File::put($this->testJsonPath, json_encode($testData));

        $rows = $this->model->getSushiRows();

        expect($rows)->toBe($testData);
    }

    /** @test */
    public function it_creates_json_file_from_model_data(): void
    {
        $testData = [
            '1' => ['id' => 1, 'name' => 'Test Item 1'],
            '2' => ['id' => 2, 'name' => 'Test Item 2'],
        ];

        // Simula i dati nel modello
        $this->model->setTestData($testData);

        // Genera il file JSON
        $this->model->toJsonFile();

        // Verifica che il file sia stato creato
        expect(File::exists($this->testJsonPath))->toBeTrue();

        // Verifica il contenuto
        $jsonContent = File::get($this->testJsonPath);
        $decodedData = json_decode($jsonContent, true);

        expect($decodedData)->toBe($testData);
    }

    /** @test */
    public function it_handles_empty_data_array(): void
    {
        $this->model->setTestData([]);
        $this->model->toJsonFile();

        expect(File::exists($this->testJsonPath))->toBeTrue();

        $jsonContent = File::get($this->testJsonPath);
        $decodedData = json_decode($jsonContent, true);

        expect($decodedData)->toBe([]);
    }

    /** @test */
    public function it_creates_directory_if_not_exists(): void
    {
        $this->model->setTestData(['1' => ['id' => 1, 'name' => 'Test']]);
        $this->model->toJsonFile();

        $directory = dirname($this->testJsonPath);
        expect(File::exists($directory))->toBeTrue();
    }

    /** @test */
    public function it_overwrites_existing_file(): void
    {
        // Crea un file esistente
        File::put($this->testJsonPath, json_encode(['old' => 'data']));

        // Genera nuovo contenuto
        $newData = ['1' => ['id' => 1, 'name' => 'New Data']];
        $this->model->setTestData($newData);
        $this->model->toJsonFile();

        // Verifica che il contenuto sia stato sovrascritto
        $jsonContent = File::get($this->testJsonPath);
        $decodedData = json_decode($jsonContent, true);

        expect($decodedData)->toBe($newData);
        expect($decodedData)->not->toHaveKey('old');
    }

    /** @test */
    public function it_handles_large_datasets_efficiently(): void
    {
        $largeData = [];
        for ($i = 1; $i <= 1000; $i++) {
            $largeData[$i] = [
                'id' => $i,
                'name' => "Item {$i}",
                'data' => str_repeat('x', 100),
            ];
        }

        $this->model->setTestData($largeData);
        $this->model->toJsonFile();

        expect(File::exists($this->testJsonPath))->toBeTrue();

        $jsonContent = File::get($this->testJsonPath);
        $decodedData = json_decode($jsonContent, true);

        expect($decodedData)->toHaveCount(1000);
        expect($decodedData['500']['name'])->toBe('Item 500');
    }

    /** @test */
    public function it_validates_json_structure(): void
    {
        $invalidData = [
            '1' => ['id' => 1, 'name' => 'Test'],
            'invalid_key' => 'not_an_array',
        ];

        $this->model->setTestData($invalidData);
        $this->model->toJsonFile();

        // Il file dovrebbe essere creato anche con dati parzialmente invalidi
        expect(File::exists($this->testJsonPath))->toBeTrue();

        $jsonContent = File::get($this->testJsonPath);
        $decodedData = json_decode($jsonContent, true);

        expect($decodedData)->toBe($invalidData);
    }
}