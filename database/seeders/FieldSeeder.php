<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use File;

class FieldSeeder extends Seeder
{
    public function run()
    {
        $owner_name['validators'] = [

            'type'        => 'Regex',            
            'message'     => 'يقبل كتابه لغه عربيه فقط',
            'pattern'     => '^[\u0621-\u064A\u0660-\u0669 ]+$',
        ];

        $owner_email['validators'] = [
            'type'      => 'StringLength',
            'message'   => 'asdsadsadsads',
            'min'       => 0,
            'max'       => 30           
    ];

        // $owner_id_number['validators'] = [
        //         'type' => 'StringLength',
        //         'message' => 'asdsadsadsads',
        //         'min'=> 0,
        //         'max'=> 30           
        // ];
       
 
  
        $items = [
            ['label' => 'أسم المالك', 'name' => 'owner_name', 'type' => 'textbox', 'required' => '1', 'required_msg' => 'برجاء أدخال أسم المالك', 'validation' => json_encode($owner_name)],

            ['label' => 'البريد الألكتروني للمالك', 'name' => 'owner_email', 'type' => 'email','required'=>'1', 'validation' => json_encode($owner_email)],

            // ['label' => 'رقم هويه المالك', 'name' => 'owner_id_number', 'type' => 'textbox','required'=>'1', 'validation' => json_encode($owner_id_number)],

            // ['label' => 'أثبات الملكيه', 'name' => 'ownership_evidence', 'type' => 'select','required'=>'1', 'validation' => $ownership_evidence],

            // ['label' => 'الموقع الجغرافي للمبني', 'name' => 'google_map', 'type' => 'textbox','required'=>'1', 'validation' => $google_map],

            // ['label' => 'صور المبني', 'name' => 'building_gallery', 'type' => 'file','required'=>'0', 'validation' => $building_gallery],

            // ['label' => 'هل هناك نزاعات قضائيه علي المبني', 'name' => ' legal_disputes_over_building', 'type' => 'radio','required'=>'0', 'validation' => $legal_disputes_over_building],
        ];

        /*
رقم التواصل للمقاول phone
صورة الفاتورة file
التمديدات
المبلغ المطلوب لإعادة الجدولة؟ number
مستند المطالبة file
------------------------------
datefield --------------- min date , max date
headding
paragraph
//Allow Multiple

*/

        // \DB::table('fields')->insert($items);
    }
}
