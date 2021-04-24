<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->double('price', 10, 2);
            // $table->dateTime('expiry_date')->nullable();
            $table->integer('condition_id')->unsigned();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->integer('brandmodel_id')->unsigned();
            $table->integer('dealer_id')->unsigned()->nullable();
            $table->integer('agent_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned();
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->boolean('is_active')->default(1);
            $table->unsignedInteger('addressable_id')->nullable();
            $table->string('addressable_type')->nullable();
            $table->timestamps();

            $table->foreign('condition_id')
                  ->references('id')
                  ->on('conditions')
                  ->onDelete('cascade');

            $table->foreign('brand_id')
                  ->references('id')
                  ->on('brands')
                  ->onDelete('cascade');

            $table->foreign('brandmodel_id')
                  ->references('id')
                  ->on('brand_models')
                  ->onDelete('cascade');

            $table->foreign('dealer_id')
                  ->references('id')
                  ->on('dealers')
                  ->onDelete('cascade');

            $table->foreign('agent_id')
                  ->references('id')
                  ->on('agents')
                  ->onDelete('cascade');

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts');
    }
}
