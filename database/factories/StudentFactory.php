<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Student;
use App\Models\Representative;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'            => User::orderBy('id','desc')->first(),
            'name'          => $this->faker->name,
            'lastname'      => $this->faker->lastName,
            'dni'           => $this->faker->ean8,
            'birthday'      => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'phone'         => $this->faker->numberBetween($min = 900000000, $max = 999999999),
            'province'      => $this->faker->randomElement(['Province1','Province2']),
            'district'      => $this->faker->randomElement(['District1','District2']),
            'relationship'      => $this->faker->randomElement(['Padre','Madre','Hermanos','Tíos','Abuelos']),
            'year_culmination'=> $this->faker->numberBetween($min = 2000, $max = 2050),
            'representative_id' => Representative::all()->random()->id,
        ];
    }
}
