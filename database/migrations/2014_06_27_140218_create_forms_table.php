<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFormsTable extends Migration
{
    public function up(){
        Schema::create('forms', function (Blueprint $table) {                 
            $table->id();  
            $table->string('title');
            $table->string('mobile');
            $table->string('id_number');
            $table->foreignId('region_id');
            $table->string('address_info');
            $table->enum('gender', ['male','female'])->default('male');
            $table->foreignId('building_type_id')->nullable();
            $table->timestamps();        
        });	
    }
    public function down(){
        Schema::dropIfExists('forms');
    }
}
