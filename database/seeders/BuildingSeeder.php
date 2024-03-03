<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
class BuildingSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['building_type_id' => '1','created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        \DB::table('buildings')->insert($items);


        $items = [
            ['field_id' => '1','building_id'=>'1','field_fillable_id'=>NULL,'fill_answer_text'=>'الشيخ محمد السيد عوض'],
            ['field_id' => '2','building_id'=>'1','field_fillable_id'=>NULL,'fill_answer_text'=>'sa@sgov.sa'],
            ['field_id' => '3','building_id'=>'1','field_fillable_id'=>NULL,'fill_answer_text'=>'05745514510054'],
            ['field_id' => '4','building_id'=>'1','field_fillable_id'=>NULL,'fill_answer_text'=>'012548485545'],
            ['field_id' => '5','building_id'=>'1','field_fillable_id'=>'1','fill_answer_text'=>NULL],
            ['field_id' => '7','building_id'=>'1','field_fillable_id'=>NULL,'fill_answer_text'=>'uploads/buildings/file.pdf'],
            ['field_id' => '9','building_id'=>'1','field_fillable_id'=>'15','fill_answer_text'=>NULL],
            ['field_id' => '14','building_id'=>'1','field_fillable_id'=>'17','fill_answer_text'=>NULL],
            ['field_id' => '16','building_id'=>'1','field_fillable_id'=>'multiplie_answer','fill_answer_text'=>'multiplie_answer'],
        ];        
        \DB::table('building_submission')->insert($items);

        $items = [
            ['building_submission_id'=>'1','field_fillable_id'=>'20'],
            ['building_submission_id'=>'1','field_fillable_id'=>'22'],
            ['building_submission_id'=>'1','field_fillable_id'=>'23'],
          ];        
        \DB::table('building_submission_multiple')->insert($items);


    }
}
