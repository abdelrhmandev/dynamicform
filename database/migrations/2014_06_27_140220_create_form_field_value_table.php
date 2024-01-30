<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFormFieldValueTable extends Migration
{
    public function up(){
        Schema::create('form_field_value', function (Blueprint $table) {                 
            $table->id();  
            // $table->string('value');
            // $table->foreignId('form_field_id')->constrained('forms')->onDelete('cascade');
        });	
    }
    public function down(){
        Schema::dropIfExists('form_field_value');
    }
}
