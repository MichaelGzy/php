<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('password',255)->default('')->comment('密码');
            $table->unsignedInteger('role_id')->default(0)->comment('角色id');
            $table->string('nickname',50)->default('暂无')->comment('昵称');
            $table->string('phone',15)->default('')->comment('手机号');
            $table->unsignedInteger('log_count')->default(0)->comment('登录次数');
            $table->ipAddress('ip')->default('0.0.0.0')->comment('登录ip');
            $table->string('email',255)->default('')->comment('邮箱');
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
        Schema::dropIfExists('managers');
    }
}
