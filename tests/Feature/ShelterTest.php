<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Shelter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShelterTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_shelters_list()
    {
        /** @var Collection|Shelter[]  $shelters */
        $shelters = Shelter::factory(2)->create();

        $response = $this->getJson('/api/shelters');

        $response->assertJsonFragment([
            'name' => $shelters->first()->name,
        ]);

        $response->assertJsonCount(2, 'data');
    }

    public function test_shelter_store_successful()
    {
        /** @var Shelter $shelter */
        $shelter = Shelter::factory()->make();

        $response = $this->postJson('/api/shelters', $shelter->attributesToArray());

        $response->assertCreated();
        $response->assertSuccessful();
        $response->assertJsonFragment([
            'name' => $shelter->name,
        ]);
    }

    public function test_shelter_invalid_store_returns_error()
    {
        /** @var Shelter $shelter */
        $shelter = Shelter::factory()->make(['name' => null]);

        $response = $this->postJson('/api/shelters', $shelter->attributesToArray());

        $response->assertUnprocessable();
        $response->assertInvalid('name');
    }

    public function test_shelter_show_successful()
    {
        /** @var Shelter $shelter */
        $shelter = Shelter::factory()->create();

        $response = $this->getJson('/api/shelters/' . $shelter->id);
        $response->assertOk();
        $response->assertJsonPath('data.name', $shelter->name);
        $response->assertJsonMissingPath('data.cats_count');
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'address',
                'created_at',
                'updated_at',
                'cats',
            ]
        ]);
    }

    public function test_shelter_update_successful()
    {
        $shelterData = Shelter::factory()->make()->attributesToArray();

        /** @var shelter $shelter */
        $shelter = Shelter::factory()->create($shelterData);

        $response = $this->putJson('/api/shelters/' . $shelter->id, [
            'name' => 'New name',
        ]);

        $response->assertOk();
        $response->assertJsonMissing($shelterData);
    }

    public function test_shelter_delete()
    {
        /** @var shelter $shelter */
        $shelter = Shelter::factory()->create();

        $response = $this->deleteJson('/api/shelters/' . $shelter->id);

        $response->assertNoContent();

        $this->assertSoftDeleted('shelters', ['id' => $shelter->id]);
    }
}
