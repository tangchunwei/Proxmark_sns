<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsTies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ties', function (Blueprint $table) {
            $table->enum('is_top',['0','1'])->default('0')->comment('是否置顶，1为置顶，默认为0');
            $table->enum('is_jing',['0','1'])->default('0')->comment('是否为精帖，1位精帖，默认为0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ties', function (Blueprint $table) {
            $table->dropColumn(['is_top','is_jing']);
        });
    }
}
