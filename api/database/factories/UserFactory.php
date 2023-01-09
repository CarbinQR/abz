<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $localeFaker = Faker::create('uk_UA');

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $localeFaker->e164PhoneNumber,
            'password_hash' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
            'position_id' => mt_rand(
                1,
                DB::table((new Position())->getTable())->count()
            ),
        ];
    }
}
