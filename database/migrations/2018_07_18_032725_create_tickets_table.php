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
            $table->date('log_date');
            $table->date('target_date');
            $table->date('completed_date');
            $table->string('problem_log');
            $table->string('problem_title');
            $table->string('product');
            $table->string('circuit_number');
            $table->string('ctt');
            $table->string('responsible_team');
            $table->string('category');
            $table->string('status');
            $table->string('created_by');
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
