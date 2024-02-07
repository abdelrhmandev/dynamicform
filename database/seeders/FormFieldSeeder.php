<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
 

class FormFieldSeeder extends Seeder
{
    public function run()
    {
 

        $items = [
          
            ['form_id' => '1','field_id' => '1'],
            // ['form_id' => '1','field_id' => '2'],
            // ['form_id' => '1','field_id' => '3'],


        ];

 

        // \DB::table('form_field')->insert($items);
    }
}
