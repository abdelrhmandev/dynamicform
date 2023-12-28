<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Form;

class FormSeeder extends Seeder
{

    // https://etharshrouf.com/article/53/%D8%A5%D8%B3%D8%AA%D8%AE%D8%AF%D8%A7%D9%85-seeder-%D9%88-factory-%D9%81%D9%8A-%D8%AA%D9%88%D9%84%D9%8A%D8%AF-%D8%A8%D9%8A%D8%A7%D9%86%D8%A7%D8%AA-%D8%B9%D8%B4%D9%88%D8%A7%D8%A6%D9%8A%D8%A9-%D9%81%D9%8A-%D9%84%D8%A7%D8%B1%D8%A7%D9%81%D9%8A%D9%84%D8%8C-%D9%88%D9%83%D9%8A%D9%81%D9%8A%D8%A9-%D8%A5%D8%AF%D8%AE%D8%A7%D9%84-%D8%A7%D9%84%D8%A8%D9%8A%D8%A7%D9%86%D8%A7%D8%AA-%D8%A8%D8%A7%D9%84%D9%84%D8%BA%D8%A9-%D8%A7%D9%84%D8%B9%D8%B1%D8%A8%D9%8A%D8%A9
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $fakerAr = Faker::create('ar_SA');           
           for($i=1;$i<=30;$i++){
                $translated_items = [        
                    ['title'=>$fakerAr->name,'status'=>$this->faker->boolean()],
                ];
                     DB::table('forms')->insert($translated_items);     
             }  

    }
}
