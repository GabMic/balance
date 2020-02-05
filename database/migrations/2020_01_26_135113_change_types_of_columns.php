<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypesOfColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->string('confirmation')->default(123456)->change();
            $table->text('info')->nullable()->change();
            $table->string('bill_id')->nullable()->change();
        });
        Schema::table('types', function (Blueprint $table) {
            $table->string('consumer_number', 75)->default(123456)->change();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
