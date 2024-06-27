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
        $password = $this->faker->password(8); // Generate a password
        
        $email = $this->faker->unique()->safeEmail; // Generate a unique email
        $username = $this->faker->unique()->userName; // Generate a unique username

        // Check if username exists, retry until unique
        while (User::where('username', $username)->exists()) {

            $username = $this->faker->userName;
        }

        // Check if email exists, retry until unique
        while (User::where('email', $email)->exists()) {
            $email = $this->faker->safeEmail;
        }

        return [
            'name' => $this->faker->name,
            'email' => $email,
            'username' => $username,
            'password' => bcrypt($password), // Assuming password needs to be hashed
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