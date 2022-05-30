<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');

            $table->integer('phone_number')->nullable('true');
            $table->float('latitude')->nullable('true');
            $table->float('longitude')->nullable('true');

            $table->string('name')->nullable('false');
            $table->text('working_conditions')->nullable('true');
            $table->string('email')->nullable('true');
            $table->string('address')->nullable('false');

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
        Schema::dropIfExists('clients');
    }
}
