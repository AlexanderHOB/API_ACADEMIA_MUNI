<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoucherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voucher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code'           => $this->faker->isbn10 ,
            'image'          => $this->faker->randomElement(['1.jpg','2.jpg','3.jpg']),
            'date'           => now(),
            'state'          => Voucher::STATE_PENDIENTE,
            'enrollment_id'     =>Enrollment::all()->random()->id
        ];
    }
}
