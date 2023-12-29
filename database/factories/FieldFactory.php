<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FactoryFactory extends Factory
{
    public function definition()
    {
        return [
            'display' => 'الأسم',
            'name' => 'name',
            'type' => 'textbox',
            
        ];
    }
}
