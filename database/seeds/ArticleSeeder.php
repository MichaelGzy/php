<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();  //清空数据表,删除 建表
        $data=[];
        for ( $i = 1 ; $i <= 33 ; $i++ ){
            $data[]=[
                'title'=>'标题'.$i,
                'content'=>$i.'----内容按开发就开个大俺姐夫那更加客观'.$i,
                'user_id'=>rand(1,3)
            ];
        }

        DB::table('articles')->insert($data);
    }
}
