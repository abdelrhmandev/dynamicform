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
        // THIS RECORD AS A NON RANDOM RECORD !!!
        \App\Models\User::create([     
            'name'               =>'عبدالرحمن مجدي المنشد',
            'email'              =>'abdelrahman@domain.com',
            'email_verified_at'  => now(),
            'password'           =>\Hash::make('12345678'),
            'remember_token'     => \Str::random(10),
        ]);
        $this->call([
            CountrySeeder::class,
            // CountrySeeder::class,
            // TeamSeeder::class,
            // TypeSeeder::class,
            // EventSeeder::class,
            // GameSeeder::class,
            // QuestionSeeder::class,
            // AnswerSeeder::class,
            // RolesAndPermissionsSeeder::class,
            // UserSeeder::class,
            // QuestionCorrectAnswerSeeder::class,
            // UserTeamSeeder::class,
        ]); 
 



       

    }
}
