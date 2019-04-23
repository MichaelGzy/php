<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //原理 db:seed 方法 去执行创建 数据   语法: php artisan db:seed
        // $this->call(UsersTableSeeder::class);
//        $this->call(UserInfoSeeder::class);
//        $this->call(ArticleSeeder::class);
//        $this->call(ManagersSeeder::class);

        //以下不要开启
        //$this->call(RolesSeeder::class);
    }
}
