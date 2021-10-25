<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserList;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();

        return [
            'title'        => $this->faker->text(50),
            'user_id'      => $user->id,
            'completed_at' => $this->faker->boolean(30) ? now() : null,
        ];
    }
}
