<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $password = $this->faker->unique()->password(8); // Generate a unique password

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'username' => $this->faker->userName,
            'password' => $password,
            'role' => $this->faker->randomElement(['student', 'teacher', 'admin']),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date(),
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'token' => Str::random(60), // Generate a random string for token
            'joining_date' => $this->faker->date(),
            'department_id' => $this->faker->randomElement([1, 2, 3]), // Assuming department IDs are 1, 2, or 3
            'remember_token' => Str::random(60), // Generate a random string for remember_token
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
