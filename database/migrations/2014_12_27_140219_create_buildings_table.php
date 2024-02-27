<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBuildingsTable extends Migration
{
    public function up(){
        Schema::create('buildings', function (Blueprint $table) {                 
            $table->id();  
            $table->foreignId('building_type_id');
            $table->foreignId('field_id');
            $table->string('field_fillable_id')->nullable();
            $table->text('fill_answer_text')->nullable();
        });	
    }
    public function down(){
        Schema::dropIfExists('buildings');
    }
}
