<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id()->unsigned();

            $table->bigInteger('request_id')->unsigned()->nullable(false);
            $table->foreign('request_id')->references('id')->on('requests');

            $table->text('message')->nullable(false);
            $table->string('author', 255)->nullable(false);
            $table->string('status', 45)->nullable(false);
            $table->string('file')->nullable();

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
        Schema::dropIfExists('messages');
    }
}
