<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->unsignedInteger('subscription_type_id')->nullable();
            $table->text('description')->nullable();
            $table->string('amount')->nullable();
            $table->enum('status',['success','pending', 'failed'])->default('pending');
            $table->string('txr_ref')->unique()->nullable();
            $table->string('txr_date')->nullable();
            $table->string('paid_date')->nullable();
            $table->string('txr_fees')->nullable();
            $table->string('txr_ip')->nullable();
            $table->string('charged_amount')->nullable();
            $table->enum('type',['credit' , 'debit'])->nullable();
            $table->string('acct_number')->nullable();
            $table->string('currency')->nullable();
            $table->string('event_type')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
