<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFieldFillableTable extends Migration
{
    public function up(){
        Schema::create('field_fillable', function (Blueprint $table) {                 
            $table->id();              
            $table->string('display',150);
            $table->string('value',100);
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade'); 
        });	
    }
    public function down(){
        Schema::dropIfExists('field_fillable');
    }
}
