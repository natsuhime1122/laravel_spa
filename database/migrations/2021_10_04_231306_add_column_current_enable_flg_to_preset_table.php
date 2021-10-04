<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCurrentEnableFlgToPresetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preset', function (Blueprint $table) {
            $table->integer('current_enable_flg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preset', function (Blueprint $table) {
            $table->dropColumn('current_enable_flg');
        });
    }
}
