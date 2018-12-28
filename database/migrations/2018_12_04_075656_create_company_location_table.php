<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('phone',20)->nullable();
            $table->string('email',50)->nullable();
            $table->string('longitude',50)->nullable();
            $table->string('latitude',50)->nullable();
            $table->string('address_1',200)->nullable();
            $table->string('address_2',200)->nullable();
            $table->string('city',30)->nullable();
            $table->string('country',30)->nullable();
            $table->string('zip_code',10)->nullable();
            $table->boolean('is_primary')->default(false);
            $table->string('employee_count',6)->nullable();
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
        Schema::dropIfExists('locations');
    }
}
