<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccoladesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accolades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('name',80);
            $table->string('years',4)->nullable();
            $table->string('image')->nullable();
            $table->text('description',500)->nullable();
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
        Schema::dropIfExists('accolades');
    }
}
