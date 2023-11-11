<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket_code')->unique();
            $table->integer('user_code')->unique();
            $table->string('user_name');
            $table->string('status');
            $table->string('type');
            $table->string('importance_level');
            $table->string('customer_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('directed_to');
            $table->string('complaint_subject');
            $table->text('complaint_description');
            $table->date('created_at');
            $table->date('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};