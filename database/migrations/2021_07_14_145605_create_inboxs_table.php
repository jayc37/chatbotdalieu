<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->string('id', 250)->nullable();
            $table->text('content');
            $table->string('content_type', '25');
            $table->integer('meta_id')->default();
            $table->bigInteger('create_by');
            $table->integer('status')->default(201);
            $table->mediumText('meta_data')->nullable();
            $table->bigInteger('send_to');
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
        Schema::dropIfExists('inbox');
    }
}