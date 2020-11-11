<?php

namespace Database\Factories;

use App\Models\Representative;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepresentativeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Representative::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name'              => $this->faker->name,
        'lastname'         => $this->faker->lastName,
        'dni'               => $this->faker->ean8,
        ];
    }
}
