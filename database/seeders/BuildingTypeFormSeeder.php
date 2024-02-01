<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class BuildingTypeFormSeeder extends Seeder {

	public function run()
	{
 

        $building_type_form = [

                ['building_type_id' => '1','form_id' => '1'],
                ['building_type_id' => '2','form_id' => '1'],
                ['building_type_id' => '3','form_id' => '2'],
                ['building_type_id' => '4','form_id' => '2'],
                ['building_type_id' => '5','form_id' => '2'],
                ['building_type_id' => '6','form_id' => '3'],
                ['building_type_id' => '7','form_id' => '4'],
                ['building_type_id' => '8','form_id' => '5'],
                ['building_type_id' => '9','form_id' => '5'],
                ['building_type_id' => '10','form_id' => '6'],
                ['building_type_id' => '11','form_id' => '7'],
                ['building_type_id' => '11','form_id' => '7'],
                ['building_type_id' => '12','form_id' => '8'],
                ['building_type_id' => '13','form_id' => '9'],       
                ['building_type_id' => '13','form_id' => '10'],


        ];

            DB::table('building_type_form')->insert($building_type_form);
    }

}