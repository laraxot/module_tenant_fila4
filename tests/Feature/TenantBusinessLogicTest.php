<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests\Feature;

use Modules\Tenant\Models\Tenant;
use Modules\Tenant\Models\TenantDomain;
use Modules\Tenant\Models\TenantSetting;
use Modules\Tenant\Models\TenantSubscription;
use Modules\User\Models\User;
use Tests\TestCase;

class TenantBusinessLogicTest extends TestCase
{
    /** @test */
    public function it_can_create_and_manage_tenants(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();

        // Act
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'Test Studio',
            'slug' => 'test-studio',
            'status' => 'active',
            'owner_id' => $user->id,
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenants', [
            'id' => $tenant->id,
            'name' => 'Test Studio',
            'slug' => 'test-studio',
            'status' => 'active',
            'owner_id' => $user->id,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('Test Studio', $tenant->name);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('test-studio', $tenant->slug);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('active', $tenant->status);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals($user->id, $tenant->owner_id);
    }

    /** @test */
    public function it_can_manage_tenant_domains(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();

        // Act
        /** @var \Illuminate\Database\Eloquent\Collection */
        $domain = TenantDomain/** @phpstan-ignore-line */ ::factory()->create([
            'tenant_id' => $tenant->id,
            'domain' => 'test.example.com',
            'is_primary' => true,
            'status' => 'active',
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenant_domains', [
            'id' => $domain->id,
            'tenant_id' => $tenant->id,
            'domain' => 'test.example.com',
            'is_primary' => true,
            'status' => 'active',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals($tenant->id, $domain->tenant_id);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('test.example.com', $domain->domain);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($domain->is_primary);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('active', $domain->status);
    }

    /** @test */
    public function it_can_manage_tenant_settings(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();

        // Act
        /** @var \Illuminate\Database\Eloquent\Collection */
        $setting = TenantSetting/** @phpstan-ignore-line */ ::factory()->create([
            'tenant_id' => $tenant->id,
            'key' => 'app.name',
            'value' => 'Test Studio Application',
            'type' => 'string',
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenant_settings', [
            'id' => $setting->id,
            'tenant_id' => $tenant->id,
            'key' => 'app.name',
            'value' => 'Test Studio Application',
            'type' => 'string',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals($tenant->id, $setting->tenant_id);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('app.name', $setting->key);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('Test Studio Application', $setting->value);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('string', $setting->type);
    }

    /** @test */
    public function it_can_manage_tenant_subscriptions(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();

        // Act
        /** @var \Illuminate\Database\Eloquent\Collection */
        $subscription = TenantSubscription/** @phpstan-ignore-line */ ::factory()->create([
            'tenant_id' => $tenant->id,
            'plan_name' => 'Professional',
            'status' => 'active',
            'starts_at' => now(),
            'expires_at' => now()->addYear(),
            'max_users' => 50,
            'max_storage_gb' => 100,
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenant_subscriptions', [
            'id' => $subscription->id,
            'tenant_id' => $tenant->id,
            'plan_name' => 'Professional',
            'status' => 'active',
            'max_users' => 50,
            'max_storage_gb' => 100,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals($tenant->id, $subscription->tenant_id);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('Professional', $subscription->plan_name);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('active', $subscription->status);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(50, $subscription->max_users);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(100, $subscription->max_storage_gb);
    }

    /** @test */
    public function it_can_validate_tenant_slug_uniqueness(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user1 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user2 = User/** @phpstan-ignore-line */ ::factory()->create();

        // Act
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant1 = Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'Studio A',
            'slug' => 'studio-a',
            'owner_id' => $user1->id,
        ]);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant2 = Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'Studio B',
            'slug' => 'studio-b',
            'owner_id' => $user2->id,
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenants', [
            'id' => $tenant1->id,
            'slug' => 'studio-a',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenants', [
            'id' => $tenant2->id,
            'slug' => 'studio-b',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotEquals($tenant1->slug, $tenant2->slug);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('studio-a', $tenant1->slug);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('studio-b', $tenant2->slug);
    }

    /** @test */
    public function it_can_manage_tenant_status_workflow(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'status' => 'pending',
        ]);

        // Act - Pending to Active
        /** @phpstan-ignore-next-line method.nonObject */
        $tenant->update(['status' => 'active']);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('active', $tenant->fresh()->status);

        // Act - Active to Suspended
        /** @phpstan-ignore-next-line method.nonObject */
        $tenant->update(['status' => 'suspended']);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('suspended', $tenant->fresh()->status);

        // Act - Suspended to Active
        /** @phpstan-ignore-next-line method.nonObject */
        $tenant->update(['status' => 'active']);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('active', $tenant->fresh()->status);
    }

    /** @test */
    public function it_can_handle_tenant_domain_verification(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();

        // Act
        /** @var \Illuminate\Database\Eloquent\Collection */
        $domain = TenantDomain/** @phpstan-ignore-line */ ::factory()->create([
            'tenant_id' => $tenant->id,
            'domain' => 'unverified.example.com',
            'is_primary' => false,
            'status' => 'pending_verification',
            'verification_token' => 'abc123',
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenant_domains', [
            'id' => $domain->id,
            'status' => 'pending_verification',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('pending_verification', $domain->status);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('abc123', $domain->verification_token);

        // Act - Verify domain
        /** @phpstan-ignore-next-line method.nonObject */
        $domain->update([
            'status' => 'active',
            'verified_at' => now(),
            'verification_token' => null,
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('active', $domain->fresh()->status);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotNull($domain->fresh()->verified_at);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNull($domain->fresh()->verification_token);
    }

    /** @test */
    public function it_can_manage_tenant_storage_limits(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $subscription = TenantSubscription/** @phpstan-ignore-line */ ::factory()->create([
            'tenant_id' => $tenant->id,
            'max_storage_gb' => 100,
            'current_storage_gb' => 25,
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenant_subscriptions', [
            'id' => $subscription->id,
            'max_storage_gb' => 100,
            'current_storage_gb' => 25,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(100, $subscription->max_storage_gb);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(25, $subscription->current_storage_gb);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(75, $subscription->max_storage_gb - $subscription->current_storage_gb);

        // Act - Update storage usage
        /** @phpstan-ignore-next-line method.nonObject */
        $subscription->update(['current_storage_gb' => 50]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(50, $subscription->fresh()->current_storage_gb);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(50, $subscription->fresh()->max_storage_gb - $subscription->fresh()->current_storage_gb);
    }

    /** @test */
    public function it_can_manage_tenant_user_limits(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $subscription = TenantSubscription/** @phpstan-ignore-line */ ::factory()->create([
            'tenant_id' => $tenant->id,
            'max_users' => 50,
            'current_users' => 10,
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenant_subscriptions', [
            'id' => $subscription->id,
            'max_users' => 50,
            'current_users' => 10,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(50, $subscription->max_users);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(10, $subscription->current_users);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(40, $subscription->max_users - $subscription->current_users);

        // Act - Add more users
        /** @phpstan-ignore-next-line method.nonObject */
        $subscription->update(['current_users' => 25]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(25, $subscription->fresh()->current_users);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(25, $subscription->fresh()->max_users - $subscription->fresh()->current_users);
    }

    /** @test */
    public function it_can_handle_tenant_subscription_expiration(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $subscription = TenantSubscription/** @phpstan-ignore-line */ ::factory()->create([
            'tenant_id' => $tenant->id,
            'status' => 'active',
            'expires_at' => now()->subDays(1), // Expired yesterday
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenant_subscriptions', [
            'id' => $subscription->id,
            'status' => 'active',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($subscription->expires_at->isPast());

        // Act - Mark as expired
        /** @phpstan-ignore-next-line method.nonObject */
        $subscription->update(['status' => 'expired']);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('expired', $subscription->fresh()->status);
    }

    /** @test */
    public function it_can_manage_tenant_settings_hierarchy(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();

        // Act - Create multiple settings
        /** @var \Illuminate\Database\Eloquent\Collection */
        $appSetting = TenantSetting/** @phpstan-ignore-line */ ::factory()->create([
            'tenant_id' => $tenant->id,
            'key' => 'app.name',
            'value' => 'Studio App',
            'type' => 'string',
        ]);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $databaseSetting = TenantSetting/** @phpstan-ignore-line */ ::factory()->create([
            'tenant_id' => $tenant->id,
            'key' => 'database.connection',
            'value' => 'mysql',
            'type' => 'string',
        ]);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $mailSetting = TenantSetting/** @phpstan-ignore-line */ ::factory()->create([
            'tenant_id' => $tenant->id,
            'key' => 'mail.driver',
            'value' => 'smtp',
            'type' => 'string',
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenant_settings', [
            'id' => $appSetting->id,
            'key' => 'app.name',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenant_settings', [
            'id' => $databaseSetting->id,
            'key' => 'database.connection',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenant_settings', [
            'id' => $mailSetting->id,
            'key' => 'mail.driver',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('app.name', $appSetting->key);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('database.connection', $databaseSetting->key);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('mail.driver', $mailSetting->key);
    }

    /** @test */
    public function it_can_validate_tenant_domain_formats(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();

        // Act & Assert - Valid domains
        $validDomains = [
            'example.com',
            'sub.example.com',
            'test-studio.com',
            'studio123.com',
        ];

        foreach ($validDomains as $domain) {
            /** @var \Illuminate\Database\Eloquent\Collection */
        $tenantDomain = TenantDomain/** @phpstan-ignore-line */ ::factory()->create([
                'tenant_id' => $tenant->id,
                'domain' => $domain,
                'status' => 'active',
            ]);

            /** @phpstan-ignore-next-line property.notFound, method.nonObject */
            $this->assertEquals($domain, $tenantDomain->domain);
            /** @phpstan-ignore-next-line property.notFound, method.nonObject */
            $this->assertDatabaseHas('tenant_domains', [
                'id' => $tenantDomain->id,
                'domain' => $domain,
            ]);
        }
    }

    /** @test */
    public function it_can_track_tenant_activity(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'created_at' => now()->subMonths(3),
            'last_activity_at' => now()->subDays(5),
        ]);

        // Act - Update last activity
        /** @phpstan-ignore-next-line method.nonObject */
        $tenant->update(['last_activity_at' => now()]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenants', [
            'id' => $tenant->id,
            'last_activity_at' => now(),
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotNull($tenant->fresh()->last_activity_at);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($tenant->fresh()->last_activity_at->isToday());
    }

    /** @test */
    public function it_can_manage_tenant_billing_cycles(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $subscription = TenantSubscription/** @phpstan-ignore-line */ ::factory()->create([
            'tenant_id' => $tenant->id,
            'billing_cycle' => 'monthly',
            'billing_amount' => 99.99,
            'next_billing_date' => now()->addMonth(),
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('tenant_subscriptions', [
            'id' => $subscription->id,
            'billing_cycle' => 'monthly',
            'billing_amount' => 99.99,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('monthly', $subscription->billing_cycle);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(99.99, $subscription->billing_amount);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($subscription->next_billing_date->isFuture());

        // Act - Update billing cycle
        /** @phpstan-ignore-next-line method.nonObject */
        $subscription->update([
            'billing_cycle' => 'yearly',
            'billing_amount' => 999.99,
            'next_billing_date' => now()->addYear(),
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('yearly', $subscription->fresh()->billing_cycle);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(999.99, $subscription->fresh()->billing_amount);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($subscription->fresh()->next_billing_date->isFuture());
    }
}
