<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Base test case for Tenant module tests.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // Additional setup for Tenant module tests
    }
}
