<?php

namespace Tests\Feature;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HabitAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    // Usuário não pode excluir hábito de outra pessoa
    public function test_user_cannot_delete_another_users_habit(): void
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        $habit = Habit::create([
            'user_id' => $userA->id,
            'name' => 'Estudar Laravel',
        ]);

        $response = $this->actingAs($userB)
    ->delete(route('habits.destroy', $habit));

        $response->assertForbidden();

        $this->assertDatabaseHas('habits', [
            'id' => $habit->id,
            'user_id' => $userA->id,
        ]);
    }

    // Usuário pode excluir o próprio hábito
    public function test_user_can_delete_own_habit(): void
    {
        $user = User::factory()->create();

        $habit = Habit::create([
            'user_id' => $user->id,
            'name' => 'Estudar Laravel',
        ]);

        $response = $this->actingAs($user)
            ->delete(route('habits.destroy', $habit));

        $response->assertRedirect(route('site.dashboard'));

        $this->assertDatabaseMissing('habits', [
            'id' => $habit->id,
        ]);
    }

    // Visitante não pode excluir hábitos
    public function test_guest_cannot_delete_habit(): void
    {
        $user = User::factory()->create();

        $habit = Habit::create([
            'user_id' => $user->id,
            'name' => 'Estudar Laravel',
        ]);

        $response = $this->delete(route('habits.destroy', $habit));

        $response->assertRedirect('/login');

        $this->assertDatabaseHas('habits', [
            'id' => $habit->id,
        ]);
    }
}
