<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsInTasksAndActivityTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('tasks', function (Blueprint $table) {
//            $table->dropColumn('done');
//        });

        Schema::table('activities', function (Blueprint $table) {
            $table->string('paid_at')->change();
        });
    }

}
