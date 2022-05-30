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

            $table->string('title')->nullable(false);
            $table->string('status')->nullable(false);
            $table->string('urgency')->nullable(false);
            $table->string('object_address')->nullable();
            $table->string('client')->nullable();
            $table->string('contract')->nullable();
            $table->string('equipment')->nullable();
            $table->string('service_object')->nullable();

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
