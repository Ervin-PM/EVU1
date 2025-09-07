<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Proyectos;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProyectoApiTest extends TestCase
{
    use RefreshDatabase;

    protected function getAuthHeaderForUser(User $user)
    {
        $token = JWTAuth::fromUser($user);
        return ['Authorization' => 'Bearer ' . $token];
    }

    public function test_list_projects_returns_empty_array_when_none()
    {
        $user = User::factory()->create();
        $headers = $this->getAuthHeaderForUser($user);

        $response = $this->getJson('/api/proyectos', $headers);

        $response->assertStatus(200)
                 ->assertExactJson([]);
    }

    public function test_create_project_returns_201_and_stores()
    {
        $user = User::factory()->create();
        $headers = $this->getAuthHeaderForUser($user);

        $payload = [
            'nombre' => 'Proyecto Test',
            'fecha_inicio' => '2025-09-07',
            'estado' => 'planificado',
            'responsable' => 'Tester',
            'monto' => 1234.56,
        ];

        $response = $this->postJson('/api/proyectos', $payload, $headers);

        $response->assertStatus(201)
                 ->assertJsonFragment([ 'nombre' => 'Proyecto Test' ]);

        $this->assertDatabaseHas('proyectos', [ 'nombre' => 'Proyecto Test', 'created_by' => $user->id ]);
    }

    public function test_show_returns_200_or_404()
    {
        $user = User::factory()->create();
        $headers = $this->getAuthHeaderForUser($user);

        // create proyecto
        $pro = Proyectos::create([
            'nombre' => 'Show Test',
            'fecha_inicio' => '2025-09-07',
            'estado' => 'activo',
            'responsable' => 'Tester',
            'monto' => 100,
            'created_by' => $user->id,
        ]);

        $response = $this->getJson('/api/proyectos/' . $pro->id, $headers);
        $response->assertStatus(200)
                 ->assertJsonFragment([ 'nombre' => 'Show Test' ]);

        // non existing
        $response2 = $this->getJson('/api/proyectos/9999', $headers);
        $response2->assertStatus(404);
    }

    public function test_update_project_returns_200_and_updates()
    {
        $user = User::factory()->create();
        $headers = $this->getAuthHeaderForUser($user);

        $pro = Proyectos::create([
            'nombre' => 'To Update',
            'fecha_inicio' => '2025-09-01',
            'estado' => 'activo',
            'responsable' => 'Tester',
            'monto' => 500,
            'created_by' => $user->id,
        ]);

        $payload = [
            'nombre' => 'Updated',
            'fecha_inicio' => '2025-09-02',
            'estado' => 'finalizado',
            'responsable' => 'Tester2',
            'monto' => 750.5,
        ];

        $response = $this->putJson('/api/proyectos/' . $pro->id, $payload, $headers);
        $response->assertStatus(200)
                 ->assertJsonFragment([ 'nombre' => 'Updated', 'responsable' => 'Tester2' ]);

        $this->assertDatabaseHas('proyectos', [ 'id' => $pro->id, 'nombre' => 'Updated', 'monto' => 750.5 ]);

        // non-existing
        $response2 = $this->patchJson('/api/proyectos/9999', $payload, $headers);
        $response2->assertStatus(404);
    }

    public function test_delete_project_returns_204_and_removes()
    {
        $user = User::factory()->create();
        $headers = $this->getAuthHeaderForUser($user);

        $pro = Proyectos::create([
            'nombre' => 'To Delete',
            'fecha_inicio' => '2025-09-01',
            'estado' => 'activo',
            'responsable' => 'Tester',
            'monto' => 100,
            'created_by' => $user->id,
        ]);

        $response = $this->deleteJson('/api/proyectos/' . $pro->id, [], $headers);
        $response->assertStatus(204);

        $this->assertDatabaseMissing('proyectos', [ 'id' => $pro->id ]);

        $response2 = $this->deleteJson('/api/proyectos/9999', [], $headers);
        $response2->assertStatus(404);
    }
}
