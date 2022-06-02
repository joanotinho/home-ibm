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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surnames');
            $table->string('company');
            $table->string('country');
            $table->string('address');
            $table->string('extra_address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->integer('phonenumber');
            $table->string('email');
            $table->string('payment_method');
            $table->boolean('visible')->default(true);
            $table->boolean('active')->default(true);
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
        //
    }
};
