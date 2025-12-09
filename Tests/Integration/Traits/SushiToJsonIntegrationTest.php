<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests\Integration\Traits;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Modules\Tenant\Models\Tenant;
use Modules\Tenant\Models\TestSushiModel;
use Modules\Tenant\Services\TenantService;
use Tests\TestCase;

/**
 * Test di integrazione per il trait SushiToJson.
 * Verifica il comportamento completo con il sistema multi-tenant.
 */
class SushiToJsonIntegrationTest extends TestCase
{
    use RefreshDatabase;

    private TestSushiModel $model;
    private string $testJsonPath;
    private Tenant $tenant;

    protected function setUp(): void
    {
        parent::setUp();

        // Crea un tenant di test
        $this->tenant = Tenant::factory()->create([
            'name' => 'test-tenant',
            'domain' => 'test.example.com',
        ]);

        // Imposta il tenant corrente
        app('tenant')->setCurrent($this->tenant);

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

        parent::tearDown();
    }

    /** @test */
    public function it_creates_json_file_with_tenant_isolation(): void
    {
        $testData = [
            '1' => [
                'id' => 1,
                'name' => 'Test Item 1',
                'tenant_id' => $this->tenant->id,
            ],
            '2' => [
                'id' => 2,
                'name' => 'Test Item 2',
                'tenant_id' => $this->tenant->id,
            ],
        ];

        // Simula i dati nel modello
        $this->model->setTestData($testData);

        // Genera il file JSON
        $this->model->toJsonFile();

        // Verifica che il file sia stato creato
        $this->assertFileExists($this->testJsonPath);

        // Verifica il contenuto del file
        $jsonContent = File::get($this->testJsonPath);
        $decodedData = json_decode($jsonContent, true);

        $this->assertIsArray($decodedData);
        $this->assertCount(2, $decodedData);
        $this->assertEquals('Test Item 1', $decodedData['1']['name']);
        $this->assertEquals($this->tenant->id, $decodedData['1']['tenant_id']);
    }

    /** @test */
    public function it_handles_empty_data_gracefully(): void
    {
        // Simula dati vuoti
        $this->model->setTestData([]);

        // Genera il file JSON
        $this->model->toJsonFile();

        // Verifica che il file sia stato creato anche con dati vuoti
        $this->assertFileExists($this->testJsonPath);

        $jsonContent = File::get($this->testJsonPath);
        $decodedData = json_decode($jsonContent, true);

        $this->assertIsArray($decodedData);
        $this->assertEmpty($decodedData);
    }

    /** @test */
    public function it_creates_tenant_specific_directory(): void
    {
        $this->model->setTestData(['1' => ['id' => 1, 'name' => 'Test']]);
        $this->model->toJsonFile();

        $directory = dirname($this->testJsonPath);
        $this->assertDirectoryExists($directory);
        $this->assertStringContainsString($this->tenant->name, $directory);
    }

    /** @test */
    public function it_overwrites_existing_file(): void
    {
        // Crea un file esistente
        File::put($this->testJsonPath, json_encode(['old' => 'data']));

        // Genera nuovo contenuto
        $this->model->setTestData(['1' => ['id' => 1, 'name' => 'New Data']]);
        $this->model->toJsonFile();

        // Verifica che il contenuto sia stato sovrascritto
        $jsonContent = File::get($this->testJsonPath);
        $decodedData = json_decode($jsonContent, true);

        $this->assertArrayNotHasKey('old', $decodedData);
        $this->assertEquals('New Data', $decodedData['1']['name']);
    }

    /** @test */
    public function it_handles_large_datasets(): void
    {
        $largeData = [];
        for ($i = 1; $i <= 1000; $i++) {
            $largeData[$i] = [
                'id' => $i,
                'name' => "Item {$i}",
                'tenant_id' => $this->tenant->id,
                'data' => str_repeat('x', 100), // 100 caratteri di dati
            ];
        }

        $this->model->setTestData($largeData);
        $this->model->toJsonFile();

        $this->assertFileExists($this->testJsonPath);
        
        $jsonContent = File::get($this->testJsonPath);
        $decodedData = json_decode($jsonContent, true);

        $this->assertCount(1000, $decodedData);
        $this->assertEquals('Item 500', $decodedData['500']['name']);
    }
}