<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('guest_id')->nullable();
            $table->string('fullname')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->string('seat1')->nullable();
            $table->string('seat2')->nullable();
            $table->string('seat3')->nullable();
            $table->string('seat4')->nullable();
            $table->string('image')->nullable();
            $table->boolean('checking_status')->nullable();
            $table->boolean('is_active')->nullable();
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
        Schema::dropIfExists('guests');
    }
}
