<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFormFieldTable extends Migration
{
    public function up(){
        Schema::create('form_field', function (Blueprint $table) {                 
            $table->id();  
            $table->unique(['form_id','field_id']);  
            $table->foreignId('form_id');
            $table->foreignId('field_id');
            $table->tinyInteger('order')->nullable();
        });	
    }
    public function down(){
        Schema::dropIfExists('form_field');
    }
}
