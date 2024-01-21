<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBuildingValuesTable extends Migration
{
    public function up(){
        Schema::create('building_values', function (Blueprint $table) {                 
            $table->id();  
            $table->foreignId('form_id')->constrained('forms')->onDelete('cascade');
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade');
            $table->foreignId('field_fillable_id');
            $table->string('fill_answer_text');

        });	
    }w
    public function down(){
        Schema::dropIfExists('building_values');
    }
}
