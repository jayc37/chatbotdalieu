<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMetainbox extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metainboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            // $table->integer('create_by');
            // $table->timestamp('create_at');
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
        Schema::dropIfExists('meta_inbox');
    }
}