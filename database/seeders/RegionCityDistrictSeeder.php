<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CountrySeeder extends Seeder {

	public function run()
	{
        $countries = [
            ['title' => 'أندورا','code' => 'ad'],
            ['title' => 'الإمارات العربية المتحدة','code' => 'ae'],
            ['title' => 'أفغانستان','code' => 'af'],
            ['title' => 'أنتيغوا وبربودا','code' => 'ag'],
 
        
            ];

            DB::table('regions')->insert($countries);
    }

}