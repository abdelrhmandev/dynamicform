<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBuildingSubmissionMultipleTable extends Migration
{
    public function up(){
        Schema::create('building_submission_multiple', function (Blueprint $table) {                 
            $table->id();  
            $table->foreignId('building_submission_id');
            $table->string('field_fillable_id')->nullable();
        });	
    }
    public function down(){
        Schema::dropIfExists('building_submission_multiple');
    }
}
