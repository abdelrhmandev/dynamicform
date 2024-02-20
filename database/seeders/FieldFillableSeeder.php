<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
 

class FieldFillableSeeder extends Seeder
{
    public function run()
    {
 

        $items = [

            ['display' => 'متزوج','value' => 'married','field_id' => '5'],
            ['display' => 'أعزب','value' => 'single','field_id' => '5'],
            ['display' => 'مطلق','value' => 'divorced','field_id' => '5'],
            ['display' => 'منفصل','value' => 'separate','field_id' => '5'],
            ['display' => 'أرمل','value' => 'widower','field_id' => '5'],
 

          
            ['display' => 'أمي','value' => '1','field_id' => '6'],
            ['display' => 'يقرأ ويكتب/تقرأ وتكتب','value' => '2','field_id' => '6'],
            ['display' => 'ابتدائي','value' => '3','field_id' => '6'],
            ['display' => 'متوسط','value' => '4','field_id' => '6'],
            ['display' => 'ثانوي','value' => '5','field_id' => '6'],
            ['display' => 'دبلوم','value' => '6','field_id' => '6'],
            ['display' => 'جامعي','value' => '7','field_id' => '6'],
    

            ['display' => ' صك الملكية','value' => '1','field_id' => '9'],
            ['display' => 'دعوي تثبيت الملكية','value' => '2','field_id' => '9'],
            ['display' => 'مشتري العقار ','value' => '3','field_id' => '9'],
            ['display' => 'حكم لإثبات ملكيته للعقار','value' => '4','field_id' => '9'],

        
            ['display' => ' نعم هناك نزاعات','value' => 'yes','field_id' => '14'],
            ['display' => 'لا توجد نزاعات','value' => 'no','field_id' => '14'],
        ];

 

        \DB::table('field_fillable')->insert($items);
    }
}
