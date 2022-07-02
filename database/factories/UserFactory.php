<?php

namespace Database\Factories;

use App\Enums\UserRoleEnum;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this -> faker -> lastName . ' ' . $this -> faker -> firstName,
            'avatar' => $this -> faker -> imageUrl(),
            'email' => $this -> faker -> email,
            'password' => $this -> faker -> password,
            'phone' => $this -> faker -> phoneNumber,
            'link' => null,
            'role' => $this -> faker -> randomElement(UserRoleEnum ::getValues()),
            'bio' => $this -> faker -> boolean ? $this -> faker -> word : null,
            'position' => $this -> faker -> jobTitle,
            'gender' => $this -> faker -> boolean,
            'city' => $this -> faker -> city,
            'company_id' => Company ::query() -> inRandomOrder() -> value('id'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this -> state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
