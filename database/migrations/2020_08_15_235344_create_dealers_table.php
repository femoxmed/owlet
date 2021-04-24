<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->nullable();
            $table->boolean('is_company');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('phone')->unique();
            $table->string('alternative_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->boolean('is_active')->default(1);
            $table->dateTime('verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dealers');
    }
}
