<?php

use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //添加数据
        $data=[];
        for ( $i = 1 ; $i <= 33 ; $i++ ){
            $data[]=[
                'username'=>'大王'.$i,
                'password'=>'user'.$i,
                'email'=>'user'.$i.'@qq.com',
                'age'=>$i+rand(5,25),
                'sex'=>['0','1'][rand(0,1)]
            ];
        }

        DB::table('user_info')->insert($data);
    }
}
