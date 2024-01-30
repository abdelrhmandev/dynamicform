<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBuildingsTable extends Migration
{
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table
                ->foreignId('project_id')
                ->constrained('fields')
                ->onDelete('cascade');
            $table
                ->foreignId('zone_id')
                ->constrained('zones')
                ->onDelete('cascade');
 
            $table
                ->foreignId('building_type_id')
                ->constrained('building_types')
                ->onDelete('cascade');

           



            $table->string('building_number')->nullable()->comment('رقم المبني');
            $table->string('floors_numbers')->nullable()->comment('عدد الأدوار');;

            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->string('notices')->nullable();
            
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('building_values');
    }
}
