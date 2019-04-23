<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->default('')->comment('用户名');
            $table->string('password')->default('')->comment('密码');
            $table->string('email')->default('')->comment('邮箱');
            $table->unsignedInteger('age')->default(0)->comment('年龄');
            $table->enum('sex',['0','1'])->default('0')->comment('性别,0为女 1为男');
            $table->softDeletes();
            //软删除字段
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
        Schema::dropIfExists('user_info');
    }
}
