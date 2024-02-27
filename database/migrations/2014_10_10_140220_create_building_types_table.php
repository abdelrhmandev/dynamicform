<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBuildingTypesTable extends Migration
{
    public function up(){
        Schema::create('building_types', function (Blueprint $table) {                 
            $table->id();  
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('color')->nullable();
            $table->foreignId('form_id');
            $table->timestamps();     
        });	
    }
    public function down(){
        Schema::dropIfExists('building_types');
    }
}
