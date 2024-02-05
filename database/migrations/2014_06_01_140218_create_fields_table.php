<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFieldsTable extends Migration
{
    public function up(){
        Schema::create('fields', function (Blueprint $table) {                 
            $table->id();  
            $table->string('label');
            $table->string('name',150);
            $table->string('type',100);
            $table->enum('required', [1,0])->default(1);
            $table->string('required_msg')->nullable();
            $table->json('validation')->nullable();


            // https://github.com/form-validation/examples/blob/master/adding-dynamic-field/using-other-library.html
            // class
            //place holder
            // minvalue
            // maxvalue
            // maxlength
        });	
    }
    public function down(){
        Schema::dropIfExists('fields');
    }
}
