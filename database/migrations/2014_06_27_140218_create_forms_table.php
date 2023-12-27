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
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
       });
    }
    public function down(){
        Schema::dropIfExists('forms');
    }
}
