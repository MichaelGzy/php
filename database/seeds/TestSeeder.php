<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[];
        for ( $i = 1 ; $i <= 10000 ; $i++ ){
            $data[]=[
                'title'=>'标题'.$i,
                'content'=>$i.'----内容按开发就开个大俺姐夫那更加客观'.$i,
                'user_id'=>rand(1,3)
            ];
        }

        DB::table('test')->insert($data);
    }
}
