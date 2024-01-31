<?php

namespace Database\Factories;

use App\Models\Form;
 
use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

 
class FormFactory extends Factory
{
 
 
    protected $model = Form::class;

 
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'mobile' => $this->faker->phoneNumber,
            'id_number' =>$this->faker->idNumber,
            'region_id' => Region::all()->random()->id,
            'address_info' => $this->faker->address,
            'gender' => $this->faker->randomElement([
                'male',
                'female',
            ]),
        ];
    }

 
}
