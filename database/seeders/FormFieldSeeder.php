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
            ['form_id' => '1','field_id' => '2'],
            ['form_id' => '1','field_id' => '3'],
            ['form_id' => '1','field_id' => '4'],
            ['form_id' => '1','field_id' => '5'],
            ['form_id' => '1','field_id' => '7'],

            ['form_id' => '1','field_id' => '9'],
            ['form_id' => '1','field_id' => '14'],
            ['form_id' => '1','field_id' => '16'],




            ['form_id' => '2','field_id' => '1'],
            ['form_id' => '2','field_id' => '2'],
            ['form_id' => '2','field_id' => '3'],
            ['form_id' => '3','field_id' => '4'],
            ['form_id' => '3','field_id' => '5'],
            ['form_id' => '3','field_id' => '6'],
            ['form_id' => '4','field_id' => '7'],
            ['form_id' => '4','field_id' => '8'],
            ['form_id' => '4','field_id' => '9'],


        ];

 

        \DB::table('form_field')->insert($items);
    }
}
