<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class FieldSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['display' => 'أسم المالك', 'name' => 'owner_name', 'type' => 'textbox', 'rules' => 'قبول لغه عربيه فقط', 'attribute' => '^[\u0621-\u064A\u0660-\u0669 ]+$'],

            ['display' => 'رقم هويه المالك', 'owner_id_number' => 'mobile', 'type' => 'textbox', 'rules' => 'الحد الأدني من الأرقام 1,الحد الأقصي من الأرقام 10,لابد أن يبدأ ب  0500,', 'attribute' => '{"minlength":"1","maxlength":"10","prefix":"0555"}'],

            ['display' => 'رقم جوال المالك', 'name' => 'owner_mobile ', 'type' => 'textbox', 'rules' => 'الحد الأدني من الأرقام 1,الحد الأقصي من الأرقام 10,لابد أن يبدأ ب  0500,', 'attribute' => '{"minlength":"1","maxlength":"10","prefix":"0555"}'],

            ['display' => 'مساحه الأرض التقديريه', 'name' => 'area', 'type' => 'textbox', 'rules' => null, 'attribute' => null],

            ['display' => 'أثبات الملكيه', 'name' => 'ownership_evidence', 'type' => 'select', 'rules' => null, 'attribute' => null],

            ['display' => 'القيمه التقديريه', 'name' => 'estimated_price', 'type' => 'textbox', 'rules' => null, 'attribute' => null],

            ['display' => 'مسطح المبني التقديري', 'name' => 'surface', 'type' => 'textbox', 'rules' => null, 'attribute' => null],

            ['display' => 'الموقع الجغرافي للمبني', 'name' => 'google_map', 'type' => 'textbox', 'rules' => null, 'attribute' => null],

            ['display' => 'عدد الأدوار', 'name' => 'number_floors', 'type' => 'textbox', 'rules' => null, 'attribute' => null],

            ['display' => 'صور المبني', 'name' => 'building_gallery', 'type' => 'file', 'rules' => null, 'attribute' => null],

        ];
        \DB::table('fields')->insert($items);
    }
}
