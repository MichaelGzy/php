<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Base
{
    use softDeletes;

    protected $dates=['deleted_at'];
    //限制表名
    protected $table='articles';
    //限制主键
    //protected $primaryKey='id';

    //限制时间维护
    //public $timestamps=false;

    //限制批量赋值
    //白名单
    //protected $fillable=[];
    //黑名单
    protected $guarded=[];

    public function articleExt(){

        return $this->hasOne(UserInfo::class,'user_id','id');
    }
}
