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
            'type' => 'Regex',
            'pattern' => '^[\u0621-\u064A\u0660-\u0669 ]+$',
            'message' => 'هذا الحقل يقبل كتابه لغه عربيه فقط',
            'minlength' => 2,
            'minStringLengthMessage' => 'يجب أن يكون عدد حروف النّص بحد أدني 2 ',
            'maxlength' => 255,
            'maxStringLengthMessage' => 'يجب أن يكون عدد حروف النّص بحد أقصي 255 ',
        ];
 

        $owner_email['validators'] = [
            'type' => 'Regex',
            'pattern' => '/^[a-zA-Z0-9. _-]+@[a-zA-Z0-9. -]+\. [a-zA-Z]{2,4}$/ ',
            'message' => 'البريد الألكتروني يجب أن يكون في صيغه صحيحه',
        ];

    $owner_id_number['validators'] = [
        'type' => 'StringLength',
        'pattern' => '^\d{10}$',
        'callback' => 'Validate_SA_Id_Number',
        'message' => 'رقم الهويه يقبل أرقام فقط',
        'maxlength' => 10,
        'minlength' => 10,
        'StringLengthMessage' => 'رقم الهوية مكون من 10 أرقام فقط لا أقل و لا أكثر',
    ];
        $owner_mobile_number['validators'] = [
            'type' => 'StringLength',
            'min' => '0100000000',
            'data_fv_greater_than_inclusive' => 'true',
            'data_fv_greater_than_message' => 'لابد من اضافة رقم الجوال مكون من 10 ارقام',
            'max' => '0999999999',
            'data_fv_less_than_inclusive' => 'false',
            'data_fv_less_than_message' => 'لابد أن يبدأ رقم الجوال برقم 05',
            'maxlength' => '10',
            'minlength' => '10',
            'StringLengthMessage' => 'رقم الجوال مكون من 10 أرقام فقط لا أقل و لا أكثر',
        ];
        $building_sales_document['validators'] = [
            'accept'=>'.xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf'
        ];
        $building_main_image['validators'] = [
            'accept'=>'.png, .jpg, .jpeg',
            'data_not_empty_message'=>'pleas set the image',
            'data_file'=>'true', 
            'data_file_extension'=>'jpeg,jpg,png', 
            'data_file_type'=>'image/jpeg,image/jpg,image/png', 
            'data_file_message'=>__('validation.mimetypes',['attribute'=>'image','values'=>'*.png, *.jpg and *.jpeg'])
        ];

        $sale_period['validators'] = [
            'date_start'=>'2024-2-12', 
            'date_end'=>'2024-2-25',
        ];
       
        
        $building_gallery_images['validators'] = [
            'accept'=>'.png, .jpg, .jpeg',
            'data_file'=>'true', 
            'data_file_extension'=>'jpeg,jpg,png', 
            'data_file_type'=>'image/jpeg,image/jpg,image/png', 
            'data_file_message'=>__('validation.mimetypes',['attribute'=>'image','values'=>'*.png, *.jpg and *.jpeg'])
        ];

  
        $items = [
            ['label' => 'أسم المالك', 'name' => 'name', 'type' => 'textbox', 'class'=>'100','is_required' => '1','validation' => json_encode($owner_name)],

            ['label' => 'البريد الألكتروني للمالك', 'name' => 'email', 'type' => 'email','class'=>'50','is_required'=>'1','validation' => json_encode($owner_email)],

            ['label' => 'رقم هويه المالك', 'name' => 'id_number', 'type' => 'textbox', 'class'=>'50','is_required' => '1', 'validation' => json_encode($owner_id_number)],

            ['label' => 'رقم جوال المالك', 'name' => 'mobile', 'type' => 'textbox', 'class'=>'50','is_required' => '1', 'validation' => json_encode($owner_mobile_number)],



             ['label' => 'ملف مستند بيع المبني', 'name' => 'building_sales_document', 'type' => 'date_range','class'=>'100','is_required'=>'1', 'validation' => json_encode($building_sales_document)],


             ['label' => ' فترة البيع', 'name' => 'sale_period', 'type' => 'date_range','class'=>'33','is_required'=>'1','validation' => json_encode($sale_period)],


            // ['label' => 'أثبات الملكيه', 'name' => 'ownership_evidence', 'type' => 'select','class'=>'66','is_required'=>'1', 'validation' => $ownership_evidence],

            // ['label' => 'الموقع الجغرافي للمبني', 'name' => 'google_map', 'type' => 'googel_map','class'=>'66','is_required'=>'1', 'validation' => $google_map],

            ['label' => 'صوره المبني الرئيسيه', 'name' => 'building_main_image', 'type' => 'file','class'=>'50','is_required'=>'1', 'validation' => json_encode($building_main_image)],

            ['label' => 'معرض صور', 'name' => 'building_gallery', 'type' => 'file_gallery','class'=>'100','is_required'=>'0', 'validation' => json_encode($building_gallery_images)],

            ['label' => 'توقيع المالك', 'name' => 'signature', 'type' => 'signature','class'=>'50','is_required'=>'1', 'validation' => NULL],


            // ['label' => 'هل هناك نزاعات قضائيه علي المبني', 'name' => ' legal_disputes_over_building', 'type' => 'radio','class'=>'100','is_required'=>'0', 'validation' => $legal_disputes_over_building],
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
        /*
رقم التواصل للمقاول phone
صورة الفاتورة file


التمديدات

المبلغ المطلوب لإعادة الجدولة؟ number

مستند المطالبة file

------------------------------
datefield --------------- min date , max date



https://github.com/form-validation/examples/blob/master/adding-dynamic-field/using-other-library.html*/

         \DB::table('fields')->insert($items);
    }
}
