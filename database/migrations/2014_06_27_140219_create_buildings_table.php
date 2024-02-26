<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBuildingsTable extends Migration
{
    public function up(){
        Schema::create('buildings', function (Blueprint $table) {                 
            $table->id();  
            $table->foreignId('form_id')->constrained('forms')->onDelete('cascade');
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade');
            $table->string('field_fillable_id')->nullable();
            $table->string('fill_answer_text')->nullable();
        });	
    }
    public function down(){
        Schema::dropIfExists('buildings');
    }
}
