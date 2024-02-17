<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\CountrySeeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // THIS RECORD AS A NON RANDOM RECORD !!!
        \App\Models\User::create([     
            'name'               =>'عبدالرحمن مجدي المنشد',
            'email'              =>'abdelrahman@domain.com',
            'email_verified_at'  => now(),
            'password'           =>\Hash::make('12345678'),
            'remember_token'     => \Str::random(10),
        ]);
     
        \App\Models\User::factory(10)->create();
        

        $this->call([
            CountrySeeder::class,
            RegionCityDistrictSeeder::class,            
            FieldSeeder::class,
            FieldFillableSeeder::class,

            // EventSeeder::class,
            // GameSeeder::class,
            // QuestionSeeder::class,
            // AnswerSeeder::class,
            // RolesAndPermissionsSeeder::class,
 
            // QuestionCorrectAnswerSeeder::class,
            // BuildingTypeSeeder::class,
            // BuildingTypeFormSeeder::class,
 
            FormFieldSeeder::class,

        ]); 

        \App\Models\Form::factory(10)->create();
    }
}
