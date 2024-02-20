<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBuildingSubmissionTable extends Migration
{
    public function up(){
        Schema::create('building_submission', function (Blueprint $table) {                 
            $table->id();  
            $table->foreignId('form_id')->constrained('forms')->onDelete('cascade');
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade');
            $table->string('field_fillable_id')->nullable();
            $table->string('fill_answer_text')->nullable();
        });	
    }
    public function down(){
        Schema::dropIfExists('building_submission');
    }
}
