<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->timestamps();
            $table->unsignedInteger('user_id')->comment('用户ID');
            $table->unsignedInteger('tie_id')->comment('帖子ID');

            $table->index('tie_id');
            $table->engine='innodb';
            $table->comment='帖子收藏表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
