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
            $table->bigInteger('company_id')->unsigned()->nullable(false);
            $table->foreign('company_id')->references('id')->on('companies');

            $table->string('phone_number', 15)->nullable('true');
            $table->float('latitude')->nullable('true');
            $table->float('longitude')->nullable('true');

            $table->string('name', 45)->nullable('false');
            $table->text('working_conditions')->nullable('true');
            $table->string('email', 45)->nullable('true');
            $table->string('address', 100)->nullable('false');

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
