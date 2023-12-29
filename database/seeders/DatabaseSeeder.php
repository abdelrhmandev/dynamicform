<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
       
        \App\Models\User::create([     
            'password'         =>Hash::make('12345678'),
            'email'            =>'admin@domain.com',
            'name'             =>'عبدالرحمن مجدي المنشد',
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Form::factory(10)->create();
    }
}
