<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->enum('value', [0,25,50,75,100]);
            $table->unsignedInteger('comment_id')->nullable();
            $table->string('rateable_id');
            $table->string('rateable_type');
            $table->boolean('is_active')->default(1);
            $table->unsignedInteger('user_id')->nullable();
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
        Schema::dropIfExists('rates');
    }
}
