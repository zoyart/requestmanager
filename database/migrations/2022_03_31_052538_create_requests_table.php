<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->bigInteger('company_id')->unsigned()->nullable(false);
            $table->foreign('company_id')->references('id')->on('companies');

            $table->integer('client_id')->nullable();

            $table->string('title', 100)->nullable(false);
            $table->string('status', 45)->nullable(false);
            $table->string('request_type', 45)->nullable(true);
            $table->string('urgency', 45)->nullable(false);
            $table->string('object_address', 250)->nullable(true);

            $table->integer('inventory_number')->nullable(true);
            $table->integer('serial_number')->nullable();
            $table->string('is_paid', 45)->nullable();
            $table->string('latitude', 255)->nullable(true);
            $table->string('longitude', 255)->nullable(true);

            $table->text('description')->nullable();

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
        Schema::dropIfExists('requests');
    }
}
