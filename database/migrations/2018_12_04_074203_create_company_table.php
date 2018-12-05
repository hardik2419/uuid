<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',36);
            $table->string('name',50);
            $table->string('logo')->nullable();
            $table->string('email',50)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('tagline')->nullable();
            $table->date('founded_date')->nullable();
            $table->string('employe_size',20)->nullable();
            $table->string('admin_email',50)->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
