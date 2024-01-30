<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('zones', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
			$table->string('block_number')->comment('عدد البلوكات');			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('cities');
	}
}
