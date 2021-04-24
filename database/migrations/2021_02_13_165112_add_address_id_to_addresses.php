<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressIdToAddresses extends Migration
{
    // /**
    //  * Run the migrations.
    //  *
    //  * @return void
    //  */
    // public function up()
    // {
    //     Schema::table('addresses', function (Blueprint $table) {
    //         $table->integer('advert_id')->unsigned();
    //         $table->foreign('advert_id')
    //               ->references('id')
    //               ->on('adverts')
    //               ->onDelete('cascade');
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::table('addresses', function (Blueprint $table) {
    //         //
    //     });
    // }
}
