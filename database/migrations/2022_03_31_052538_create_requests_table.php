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
            $table->id();
            $table->integer('company_id')->nullable(false);
            $table->integer('executor_id')->nullable(false);
            $table->integer('client_id')->nullable();

            $table->string('title', 100)->nullable(false);
            $table->string('status', 45)->nullable(false);
            $table->string('urgency', 45)->nullable(false);
            $table->string('object_address', 250)->nullable();
            $table->string('equipment', 45)->nullable();
            $table->string('service_object', 45)->nullable();

            $table->integer('inventory_number')->nullable();
            $table->integer('serial_number')->nullable();

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
