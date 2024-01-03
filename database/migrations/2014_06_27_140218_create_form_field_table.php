<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFormFieldTable extends Migration
{
    public function up(){
        Schema::create('form_field', function (Blueprint $table) {                 
            $table->id();  
            $table->enum('is_required', ['0','1'])->default(1);
            $table->string('notices')->nullable();
            $table->string('restriction')->nullable();
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade');
            $table->foreignId('form_id')->constrained('forms')->onDelete('cascade');
        });	
    }
    public function down(){
        Schema::dropIfExists('form_field');
    }
}
