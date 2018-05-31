<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ties', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->timestamps();
            $table->enum('class',['信息','固件开发','硬件开发','软件开发','市场','非临近发展'])->default('信息')->comment('贴子专栏');
            $table->string('title',30)->comment('标题');
            $table->longText('content')->comment('内容');
            $table->enum('type',['分享','提问'])->default('分享')->comment('发帖类型');
            $table->unsignedInteger('user_id')->comment('用户ID');

            $table->engine = 'innodb';
            $table->comment = '贴子';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ties');
    }
}
