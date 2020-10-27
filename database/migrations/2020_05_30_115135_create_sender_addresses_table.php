<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenderAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sender_addresses', function (Blueprint $table) {
            $table->bigInteger('senderId');
            $table->string('barangay')->default('N/A');
            $table->string('cityMun')->default('N/A');
            $table->string('province')->default('N/A');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sender_addresses');
    }
}
