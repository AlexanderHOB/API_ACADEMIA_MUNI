<?php

namespace Database\Factories;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->randomElement(['Recurso 1','Recurso 2','Recurso 3','Recurso 4','Recurso 5']),
            'description'         => $this->faker->text($maxNbChars = 80),
            'type'               => $this->faker->randomElement(['Equipo','Servicio']),
        ];
    }
}
