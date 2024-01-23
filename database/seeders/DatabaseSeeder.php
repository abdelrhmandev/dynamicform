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
        // THIS RECORD AS A NON RANDOM RECORD !!!
        \App\Models\User::create([     
            'name'               =>'عبدالرحمن مجدي المنشد',
            'email'              =>'abdelrahman@domain.com',
            'email_verified_at'  => now(),
            'password'           =>\Hash::make('12345678'),
            'remember_token'     => \Str::random(10),
        ]);
       

        \App\Models\User::factory(10)->create();
        \App\Models\Form::factory(10)->create();

        $items = [
            ['display' => 'الأسم','name'=> 'name','type'=> 'textbox','notices'=>'يكتب باللغه العربيه','rules'=>'قبول لغه عربيه فقط','attribute'=>'^[\u0621-\u064A\u0660-\u0669 ]+$'],
            ['display' => 'رقم الجوال','name'=> 'mobile','type'=> 'textbox','notices'=>'طبقا لهيئه الأتصال بالمملكه العربيه السعوديه','rules'=>'الحد الأدني من الأرقام 1,الحد الأقصي من الأرقام 10,لابد أن يبدأ ب  0500,','attribute'=>'{"minlength":"1","maxlength":"10","prefix":"0555"}'],
            ['display' => 'رقم الهويه','name'=> 'id_number','type' => 'textbox','notices'=>' الهوية الوطنية','rules'=>'الحد الأدني من الأرقام 10,الحد الأقصي من الأرقام 20,لابد أن يبدأ ب  09700,','attribute'=>'{"minlength":"10","maxlength":"20","prefix":"09700"}'],
            ['display' => 'الحالة الاجتماعية','name'=> 'social_status','type'=> 'select','notices'=>NULL,'rules'=>NULL,'attribute'=>NULL],
            ['display' => 'المستوي التعليمي','name'=> 'educational_status','type'=> 'select','notices'=>NULL,'rules'=>NULL,'attribute'=>NULL],
            ['display' => 'الحاله الصحية','name'=> 'medical_status','type'=> 'select','notices'=>'سليم أو مريض أو معاق أو معاق و مريض','rules'=>NULL,'attribute'=>NULL],
            ['display' => ' هل عليك اقساط ؟','name'=> 'did_have_installments','type'=> 'radiobox','notices'=>NULL,'rules'=>NULL,'attribute'=>NULL],
            ['display' => 'هل تمتلك أملاك ؟','name'=> 'did_have_properties','type'=> 'radiobox','notices'=>'سيارات - عقارات - مزارع - منحل و خلافه ... ','rules'=>NULL,'attribute'=>NULL],
            ['display' => 'تاريخ الميلاد','name'=> 'dob','type'=> 'date','notices'=>'تاريخ ميلادي','rules'=>NULL,'attribute'=>NULL],
            ['display' => 'ملاحظات','name'=> 'notices','type'=> 'textarea','notices'=>NULL,'rules'=>NULL,'attribute'=>NULL],
            ['display' => 'ملف السيره الذايته','name'=> 'cv','type'=> 'file','notices'=>'ملف PFD ,doc ','rules'=>"ملف وثائق , فقط *.pdf, *.docs and *.xls امتدادات",'attribute'=>'"documents"'],
            ['display' => 'ملف الصوره الشخصيه','name'=> 'avatar','type'=> 'file','notices'=>'ملف صورة صاحب الأستمارة ','rules'=>"فقط *.png, *.jpg and *.jpeg امتدادات الصور المقبوله",'attribute'=>'"images"'],
            ['display' => 'الهوايات','name'=> 'hobbies','type'=> 'checkbox','notices'=>'هواياتك المفضله','rules'=>NULL,'attribute'=>NULL],
        ];
        \DB::table('fields')->insert($items);



        $items = [
            ['is_disabled'=> '1','summable'=> '0','is_required'=>'1','field_id'=> '1','form_id'=>'1'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '2','form_id'=>'1'],
            ['is_disabled'=> '1','summable'=> '0','is_required'=>'0','field_id'=> '3','form_id'=>'1'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '4','form_id'=>'1'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '5','form_id'=>'1'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '6','form_id'=>'1'],
            ['is_disabled'=> '1','summable'=> '0','is_required'=>'0','field_id'=> '7','form_id'=>'1'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '8','form_id'=>'1'],
            ['is_disabled'=> '1','summable'=> '0','is_required'=>'0','field_id'=> '9','form_id'=>'1'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '10','form_id'=>'1'],
            ['is_disabled'=> '1','summable'=> '0','is_required'=>'0','field_id'=> '11','form_id'=>'1'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '12','form_id'=>'1'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '13','form_id'=>'1'],

            


            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '4','form_id'=>'2'],
            ['is_disabled'=> '1','summable'=> '0','is_required'=>'0','field_id'=> '6','form_id'=>'2'],



            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '1','form_id'=>'3'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '5','form_id'=>'3'],



            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=>'4','form_id'=>'4'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'0','field_id'=>'5','form_id'=>'4'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=>'7','form_id'=>'4'],


            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=>'8','form_id'=>'5'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=>'9','form_id'=>'5'],


            ['is_disabled'=> '1','summable'=> '0','is_required'=>'1','field_id'=>'1','form_id'=>'6'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'0','field_id'=>'3','form_id'=>'6'],



            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '4','form_id'=>'7'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'0','field_id'=> '5','form_id'=>'7'],
            ['is_disabled'=> '1','summable'=> '0','is_required'=>'1','field_id'=> '7','form_id'=>'8'],

            ['is_disabled'=> '0','summable'=> '0','is_required'=>'0','field_id'=> '8','form_id'=>'8'],
            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '9','form_id'=>'9'],


            ['is_disabled'=> '0','summable'=> '0','is_required'=>'1','field_id'=> '1','form_id'=>'10'],
            ['is_disabled'=> '1','summable'=> '0','is_required'=>'1','field_id'=> '4','form_id'=>'10'],


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


            ['display' => 'نعم','value'=> 'yes','field_id'=> '8'],
            ['display' => 'لا','value'=> 'no','field_id'=> '8'],



            ['display' => 'السباحه','value'=> 'swimming','field_id'=> '13'],
            ['display' => 'الرمايه','value'=> 'shooting','field_id'=> '13'],
            ['display' => 'ركوب الخيل','value'=> 'horseback_riding','field_id'=> '13'],
            ['display' => 'الرسم','value'=> 'drawing','field_id'=> '13'],

            ['display' => 'الجري','value'=> 'running','field_id'=> '13'],
            ['display' => 'القراءة','value'=> 'reading','field_id'=> '13'],
            ['display' => 'تسلق الجبال','value'=> 'mountaineering','field_id'=> '13'],


        ];

        \DB::table('field_fillable')->insert($items);



        $items = [   
            ['title' => 'روشن'],
            ['title' => 'عماير الفوزان'],         
            ['title' => 'السودة'],
            ['title' => 'السلال الغذائية (اللأسر)'],
            ['title' => 'نيوم 3 للمسح الاجتماعي والاقتصادي'],
        ];
        \DB::table('projects')->insert($items);


        $items = [   
            ['project_id' => '1','form_id'=>'1'],
            ['project_id' => '2','form_id'=>'2'],         
            ['project_id' => '3','form_id'=>'3'],
            ['project_id' => '4','form_id'=>'4'],
            ['project_id' => '5','form_id'=>'5'],
        ];
        \DB::table('project_form')->insert($items);



    }
}
