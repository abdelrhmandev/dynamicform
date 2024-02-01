<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBuildingTypeFormTable extends Migration
{
    public function up(){
        Schema::create('building_type_form', function (Blueprint $table) {  
            $table->id();               
            $table->foreignId('building_type_id');
            $table->foreignId('form_id');
        });	
    }
    public function down(){
        Schema::dropIfExists('building_type_form');
    }
}
