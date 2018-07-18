<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name');
            $table->integer('log_date');
            $table->integer('target_date');
            $table->integer('completed_date');
            $table->string('problem_log');
            $table->string('product');
            $table->string('circuit_number');
            $table->string('ctt');
            $table->string('responsible_team');
            $table->string('category');
            $table->string('priority');
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
        Schema::dropIfExists('tickets');
    }
}
