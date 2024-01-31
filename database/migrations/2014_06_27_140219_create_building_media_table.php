<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBuildingMediaTable extends Migration
{
    public function up(){
        Schema::create('building_media', function (Blueprint $table) {                 
            $table->id();  
            $table->string('file');
            $table->foreignId('building_id');  
        });	
    }
    public function down(){
        Schema::dropIfExists('building_media');
    }
}
