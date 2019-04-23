<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255)->default('')->comment('文章标题');
            $table->string('content',255)->default('')->comment('文章内容');
            $table->string('face')->default('/uploads/1.jpg')->comment('封面');
            $table->unsignedInteger('user_id')->default(0)->comment('用户id');
            $table->unsignedInteger('read_num')->default(0)->comment('阅读数');
            $table->softDeletes();
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
        Schema::dropIfExists('articles');
    }
}
