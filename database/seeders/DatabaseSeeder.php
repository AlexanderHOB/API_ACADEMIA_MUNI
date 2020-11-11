<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Cycle;
use App\Models\Student;
use App\Models\Resource;
use App\Models\Enrollment;
use App\Models\CycleStudent;
use App\Models\Representative;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $numberCycle = 10;
        $numberRepresentative = 600;
        $numberStudent=1000;

        \App\Models\Representative::factory()->count($numberRepresentative)->create();
        \App\Models\Resource::factory()->count(5)->create();
        for($i=0;$i<1000;$i++){
            \App\Models\User::factory()->count(1)->create()->each(
                function($user){
                    \App\Models\Student::factory()->count(1)->create()->each(
                        function($student){
                            $resources = \App\Models\Resource::all()->random(mt_rand(1,5))->pluck('id');
                            $student->resources()->attach($resources);
                        }
                    );
                }
            );
        }
        

        \App\Models\Cycle::factory()->count($numberCycle)->create()->each(
            function($cycle){
                $areas = \App\Models\Area::all()->random(mt_rand(1,5))->pluck('id');
                $cycle->areas()->attach($areas);
            }
        );
        
        \App\Models\Enrollment::factory()->count(1200)->create();
        \App\Models\Voucher::factory()->count(1200)->create();

    }
}
