<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableRemarksAddUserIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('remarks',function(Blueprint $table)
      {
      $table->integer('ticket_id')->unsigned()->after('remarks')->default(1);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('remarks', function (Blueprint $table) {
          $table->dropColumn('ticket_id');
      });
    }
}
