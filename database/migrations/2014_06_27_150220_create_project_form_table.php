<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProjectFormTable extends Migration
{
    public function up(){
        Schema::create('project_form', function (Blueprint $table) {                 
            $table->id();  
            $table->unique(['project_id','form_id']);  
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('form_id')->constrained('forms')->onDelete('cascade');
        });	
    }
    public function down(){
        Schema::dropIfExists('project_form');
    }
}
