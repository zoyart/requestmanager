<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceListObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_list_objects', function (Blueprint $table) {
            $table->id();
            $table->integer('price_list_id')->nullable('false');
            $table->integer('price')->nullable('false');

            $table->string('name', 100)->nullable('false');
            $table->string('category', 45)->nullable('false');
            $table->string('vat', 45)->nullable('true');
            $table->string('type', 45)->nullable('false');

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
        Schema::dropIfExists('price_list_objects');
    }
}
