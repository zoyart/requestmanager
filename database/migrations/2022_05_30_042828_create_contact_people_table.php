<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_people', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');

            $table->string('phone_number', 15)->nullable('true');

            $table->string('name', 45)->nullable('false');
            $table->string('surname', 45)->nullable('true');
            $table->string('description')->nullable('true');
            $table->string('email', 45)->nullable('true');

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
        Schema::dropIfExists('contact_people');
    }
}
