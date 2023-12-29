<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FieldFactory extends Factory
{
    public function definition()
    {
        $ss = [
            ['display' => 'الأسم','name'=> 'name','type'=> 'textbox'],
            ['display' => 'رقم الهويه','name'=> 'id_number','type' => 'textbox'],
            ];

        return $ss;
    }
}
