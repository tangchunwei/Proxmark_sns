<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwoColumnsTies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ties', function (Blueprint $table) {
            $table->unsignedInteger('display')->default('0')->comment('浏览量');
            $table->unsignedInteger('discuss')->default('0')->comment('评论');
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
            $table->dropColumn(['display','discuss']);
        });
    }
}
