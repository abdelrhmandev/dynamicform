<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBuildingSubmissionTable extends Migration
{
    public function up(){
        Schema::create('building_submission', function (Blueprint $table) {                 
            $table->id();  
            $table->foreignId('field_id');
            $table->foreignId('building_id');
            $table->string('field_fillable_id')->nullable();
            $table->text('fill_answer_text')->nullable();
        });	
    }
    public function down(){
        Schema::dropIfExists('building_submission');
    }
}
