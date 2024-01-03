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
        \App\Models\User::create([     
            'name'               =>'عبدالرحمن مجدي المنشد',
            'email'              =>'admin@domain.com',
            'email_verified_at'  => now(),
            'password'           =>\Hash::make('12345678'),
            'remember_token'     => \Str::random(10),
        ]);
       

        \App\Models\User::factory(10)->create();
        \App\Models\Form::factory(10)->create();

        $items = [
            ['display' => 'الأسم','name'=> 'name','type'=> 'textbox','notices'=>'يكتب باللغه العربيه'],
            ['display' => 'رقم الجوال','name'=> 'mobile','type'=> 'textbox','notices'=>'يبدأ ب 0555'],
            ['display' => 'رقم الهويه','name'=> 'id_number','type' => 'textbox','notices'=>'يبدأ ب 087 و مكون من 10 أرقام'],
            ['display' => 'الحالة الاجتماعية','name'=> 'social_status','type'=> 'select','notices'=>NULL],
            ['display' => 'المستوي التعليمي','name'=> 'educational_status','type'=> 'select','notices'=>NULL],
            ['display' => 'الحاله الصحية','name'=> 'medical_status','type'=> 'select','notices'=>NULL],
            ['display' => ' هل عليك اقساط ؟','name'=> 'did_have_installments','type'=> 'radiobox','notices'=>NULL],
            ['display' => 'تاريخ الميلاد','name'=> 'dob','type'=> 'date','notices'=>'تاريخ ميلادي'],
            ['display' => 'ملاحظات','name'=> 'notices','type'=> 'textarea','notices'=>NULL],
            ['display' => 'ملف السيره الذايته','name'=> 'cv','type'=> 'file','notices'=>'ملف PFD ,doc '],
        ];
        \DB::table('fields')->insert($items);



        $items = [
            ['is_required' => '1','notices'=> NULL,'field_id'=> '1','form_id'=>'1'],
            ['is_required' => '1','notices'=> 'طبقا لنظام المملكه العربيه السعوديه','field_id'=> '2','form_id'=>'1'],
            ['is_required' => '1','notices'=> 'حسب سجلات المملكه','field_id'=> '3','form_id'=>'1'],
            ['is_required' => '0','notices'=> NULL,'field_id'=> '4','form_id'=>'1'],
            ['is_required' => '1','notices'=> NULL,'field_id'=> '5','form_id'=>'1'],
 


            ['is_required' => '1','notices'=> NULL,'field_id'=> '1','form_id'=>'3'],
            ['is_required' => '1','notices'=> NULL,'field_id'=> 5,'form_id'=>'3'],



            ['is_required' => '1','notices'=> NULL,'field_id'=>'4','form_id'=>'4'],
            ['is_required' => '0','notices'=> NULL,'field_id'=>'5','form_id'=>'4'],
            ['is_required' => '1','notices'=> NULL,'field_id'=>'7','form_id'=>'4'],
            ['is_required' => '1','notices'=> NULL,'field_id'=>'8','form_id'=>'4'],
            ['is_required' => '0','notices'=> NULL,'field_id'=>'9','form_id'=>'4'],

            

            ['is_required' => '1','notices'=> NULL,'field_id'=> '4','form_id'=>'7'],
            ['is_required' => '0','notices'=> NULL,'field_id'=> '5','form_id'=>'7'],
            ['is_required' => '1','notices'=> NULL,'field_id'=> '7','form_id'=>'8'],

            ['is_required' => '0','notices'=> NULL,'field_id'=> '8','form_id'=>'8'],
            ['is_required' => '1','notices'=> NULL,'field_id'=> '9','form_id'=>'9'],

        ];
        \DB::table('form_field')->insert($items);



        $items = [
            ['display' => 'أعزب','value'=> 'single','field_id'=> '4'],
            ['display' => 'متزوج','value'=> 'married','field_id'=> '4'],
            ['display' => 'أرمل','value'=> 'widower','field_id'=> '4'],
            ['display' => 'مطلق','value'=> 'divorced','field_id'=> '4'],


            ['display' => 'أمي','value'=> 'ignorant','field_id'=> '5'],
            ['display' => 'يقرأ ويكتب/تقرأ وتكتب','value'=> 'read_write_only','field_id'=> '5'],
            ['display' => 'ابتدائي','value'=> 'primary','field_id'=> '5'],
            ['display' => 'متوسط','value'=> 'middle','field_id'=> '5'],
            ['display' => 'ثانوي','value'=> 'secondary','field_id'=> '5'],
            ['display' => 'دبلوم','value'=> 'diploma','field_id'=> '5'],
            ['display' => 'جامعي','value'=> 'academic','field_id'=> '5'],



            ['display' => 'سليم','value'=> 'hale','field_id'=> '6'],
            ['display' => 'مريض','value'=> 'sick','field_id'=> '6'],
            ['display' => 'معاق','value'=> 'handicapped','field_id'=> '6'],
            ['display' => 'معاق مريض','value'=> 'handicapped_sick','field_id'=> '6'],


            ['display' => 'نعم','value'=> 'yes','field_id'=> '7'],
            ['display' => 'لا','value'=> 'no','field_id'=> '7'],

        ];

        \DB::table('field_fillable')->insert($items);


    }
}
