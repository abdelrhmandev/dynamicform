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
            $table->string('notices')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

        });	
    }
    public function down(){
        Schema::dropIfExists('fields');
    }
}
