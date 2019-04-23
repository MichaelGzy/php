<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();  //清空数据表,删除 建表
            $data[]=['rolename'=>'总经理'];

        DB::table('roles')->insert($data);
    }
}
