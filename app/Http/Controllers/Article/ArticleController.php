<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function listArticle(){
        return view('article/article');
    }
    public function getList(){
        //mock 数据
        $data = [
            0=>[
                'id'=>1,
                'title'=>'标题1',
                'tp'=>'/img/1.jpg'
            ],
            1=>[
                'id'=>2,
                'title'=>'标题2',
                'tp'=>''
            ],
            2=>[
                'id'=>3,
                'title'=>'标题3',
                'tp'=>''
            ],
            3=>[
                'id'=>4,
                'title'=>'标题4',
                'tp'=>''
            ],
            4=>[
                'id'=>5,
                'title'=>'标题5',
                'tp'=>''
            ],
            5=>[
                'id'=>6,
                'title'=>'标题6',
                'tp'=>''
            ],
            6=>[
                'id'=>7,
                'title'=>'标题7',
                'tp'=>''
            ],
            7=>[
                'id'=>8,
                'title'=>'标题8',
                'tp'=>''
            ],
            8=>[
                'id'=>9,
                'title'=>'标题9',
                'tp'=>''
            ],
            9=>[
                'id'=>10,
                'title'=>'标题10',
                'tp'=>''
            ]
        ];
        return $data;
    }

    public function addArticle(){

    }
    public function updateArticle(){

    }
    public function delArticle(){

    }
}
