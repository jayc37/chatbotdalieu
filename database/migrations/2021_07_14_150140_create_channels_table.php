<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('channels', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('name', 25);
            // $table->timestamp('create_at');
            $table->integer('source');
            $table->integer('create_by');
            $table->mediumText('meta_data')->nullable();
            $table->string('token', 250);
            $table->integer('status')->default(201);
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('channel');
    }
}