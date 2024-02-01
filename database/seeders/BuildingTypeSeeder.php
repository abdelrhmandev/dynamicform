<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class BuildingTypeSeeder extends Seeder {

	public function run()
	{
 

        $building_types = [
                ['title' => 'سكني','image' => 'uploads/buildings/types/1.png','color'=>'#ff6161'],
                ['title' => 'تجاري سكني','image' => 'uploads/buildings/types/2.png','color'=>'#0088cc'],
                ['title' => 'صناعي','image' => 'uploads/buildings/types/3.png','color'=>'#E9967A'],
                ['title' => 'تجاري','image' => 'uploads/buildings/types/4.png','color'=>'#FFA07A'],
                ['title' => 'سكن عمال','image' => 'uploads/buildings/types/5.png','color'=>'#FF7F50'],
                ['title' => 'حديقه عامه','image' => 'uploads/buildings/types/6.png','color'=>'#CCCCFF'],
                ['title' => 'حوش','image' => 'uploads/buildings/types/7.png','color'=>'#40E0D0'],
                ['title' => 'زراعه','image' => 'uploads/buildings/types/8.png','color'=>'#9FE2BF'],
                ['title' => 'شرطة','image' => 'uploads/buildings/types/9.png','color'=>'#FFBF00'],
                ['title' => 'دفاع مدني','image' => 'uploads/buildings/types/10.png','color'=>'#008000'],
                ['title' => 'ملعب او نادي','image' => 'uploads/buildings/types/11.png','color'=>'#000080'],
                ['title' => 'مقبرة','image' => 'uploads/buildings/types/12.png','color'=>'800080'],
                ['title' => 'تحت الانشاء','image' => 'uploads/buildings/types/13.png','color'=>'#008080'],    
                ['title' => 'مسجد','image' => 'uploads/buildings/types/14.png','color'=>NULL],      
                ['title' => 'مسجد','image' => 'uploads/buildings/types/15.png','color'=>NULL],      
                ];

            DB::table('building_types')->insert($building_types);
    }

}