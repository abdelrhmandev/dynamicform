<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFieldsTable extends Migration
{
    public function up(){
        Schema::create('fields', function (Blueprint $table) {                 
            $table->id();  
            $table->string('display');
            $table->string('name',150);
            $table->string('type',100);
            $table->json('filldata')->nullable();
        });	
    }
    public function down(){
        Schema::dropIfExists('fields');
    }
}
