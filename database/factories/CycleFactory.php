<?php

namespace Database\Factories;

use App\Models\Cycle;
use Illuminate\Database\Eloquent\Factories\Factory;

class CycleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cycle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->randomElement(['Ciclo Repaso','Ciclo Intensivo','Ciclo Normal']),
            'description'   => $this->faker->realText($maxNbChars = 20, $indexSize = 1),
            'quantity'      => $this->faker->randomElement([12,18]),
            'duration'      => $this->faker->randomElement(['Días','Semanas','Meses']),
            
        ];
    }
}
