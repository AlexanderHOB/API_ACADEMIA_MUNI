<?php

namespace Database\Factories;

use App\Models\Cycle;
use App\Models\Career;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enrollment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id'            => Student::all()->random()->id,
            'cycle_id'              => Cycle::all()->random()->id,
            'career_id'             => Career::all()->random()->id,
            'state'                 => Enrollment::STATE_PENDING,
        ];
    }
}
