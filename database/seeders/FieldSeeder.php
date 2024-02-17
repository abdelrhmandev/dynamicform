<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
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
            'accept' => '.xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf',
        ];
        $building_main_image['validators'] = [
            'accept' => '.png, .jpg, .jpeg',
            'data_not_empty_message' => 'pleas set the image',
            'data_file' => 'true',
            'data_file_extension' => 'jpeg,jpg,png',
            'data_file_type' => 'image/jpeg,image/jpg,image/png',
            'data_file_message' => __('validation.mimetypes', ['attribute' => 'image', 'values' => '*.png, *.jpg and *.jpeg']),
        ];

        $sale_period['validators'] = [
            'date_start' => '2024-2-12',
            'date_end' => '2024-2-25',
        ];

        $building_gallery_images['validators'] = [
            'accept' => '.png, .jpg, .jpeg',
            'data_file' => 'true',
            'data_file_extension' => 'jpeg,jpg,png',
            'data_file_type' => 'image/jpeg,image/jpg,image/png',
            'data_file_message' => __('validation.mimetypes', ['attribute' => 'image', 'values' => '*.png, *.jpg and *.jpeg']),
        ];

        $items = [
            ['label' => 'أسم المالك', 'name' => 'name', 'type' => 'textbox', 'width' => '100', 'is_required' => '1', 'validation' => json_encode($owner_name), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['label' => 'البريد الألكتروني للمالك', 'name' => 'email', 'type' => 'email', 'width' => '50', 'is_required' => '1', 'validation' => json_encode($owner_email), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['label' => 'رقم هويه المالك', 'name' => 'id_number', 'type' => 'textbox', 'width' => '50', 'is_required' => '1', 'validation' => json_encode($owner_id_number), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['label' => 'رقم جوال المالك', 'name' => 'mobile', 'type' => 'textbox', 'width' => '50', 'is_required' => '1', 'validation' => json_encode($owner_mobile_number), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['label' => 'الحاله الأجتماعيه', 'name' => 'social_status', 'type' => 'radio', 'width' => '50', 'is_required' => '1', 'validation' => NULL, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['label' => 'المستوي التعليمي', 'name' => 'education_level', 'type' => 'radio', 'width' => '50', 'is_required' => '1', 'validation' => NULL, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],


            ['label' => 'ملف مستند بيع المبني', 'name' => 'building_sales_document', 'type' => 'file', 'width' => '100', 'is_required' => '1', 'validation' => json_encode($building_sales_document), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['label' => ' فترة البيع', 'name' => 'sale_period', 'type' => 'date_range', 'width' => '33', 'is_required' => '1', 'validation' => json_encode($sale_period), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['label' => 'أثبات الملكيه', 'name' => 'ownership_evidence', 'type' => 'select', 'width' => '66', 'is_required' => '1', 'validation' => NULL, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['label' => 'الموقع الجغرافي للمبني', 'name' => 'google_map', 'type' => 'googel_map', 'width' => '66', 'is_required' => '1', 'validation' => NULL, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['label' => 'صوره المبني الرئيسيه', 'name' => 'building_main_image', 'type' => 'file', 'width' => '50', 'is_required' => '1', 'validation' => json_encode($building_main_image), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['label' => 'معرض صور', 'name' => 'building_gallery', 'type' => 'file_gallery', 'width' => '100', 'is_required' => '0', 'validation' => json_encode($building_gallery_images), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['label' => 'توقيع المالك', 'name' => 'signature', 'type' => 'signature', 'width' => '50', 'is_required' => '1', 'validation' => null, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['label' => 'هل هناك نزاعات قضائيه علي المبني', 'name' => 'legal_disputes_over_building', 'type' => 'radio', 'width' => '100', 'is_required' => '0', 'validation' => NULL,'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
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
