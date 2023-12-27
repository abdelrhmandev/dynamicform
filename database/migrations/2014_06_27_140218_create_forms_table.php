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
        Schema::create('form_elements', function (Blueprint $table) {                 
            $table->id();  
            $table->string('display');
            $table->string('name',150);
            $table->string('type',100);
            $table->enum('is_required', ['0','1'])->default(1);
            $table->string('notices')->nullable();
            $table->longText('fillable')->nullable();
            $table->foreignId('form_id')->constrained('forms')->onDelete('cascade');
        });	
    }
    public function down(){
        Schema::dropIfExists('forms');
        Schema::dropIfExists('form_elements');
    }
}
