<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class RegionCityDistrictSeeder extends Seeder {

	public function run()
	{
// سكني
// تجاري سكني
// صناعي	
// تجاري
// سكن عمال
// حديقه عامه
// حوش
// زراعه
// شرطة
// دفاع مدني

        $countries = [
            ['title' => 'أندورا','code' => 'ad'],
            ['title' => 'الإمارات العربية المتحدة','code' => 'ae'],
            ['title' => 'أفغانستان','code' => 'af'],
            ['title' => 'أنتيغوا وبربودا','code' => 'ag'],
 
        
            ];

            DB::table('regions')->insert($countries);
    }

}