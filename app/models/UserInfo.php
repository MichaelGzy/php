<?php

namespace App\models;

//use Illuminate\Database\Eloquent\Model;
//设置软删除的类
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInfo extends Base
{
    //指定表名
    protected $table='user_info';

    //指定主键名,默认为id
//    protected $primaryKey='id';

    //指定时间默认写入
//    public $timestamps=false;

    //指定白名单和黑名单
//    protected $fillable=[];
    protected $guarded=[];

    //设置软删除
    use SoftDeletes;
    //设置软删除字段
    protected $dates=['delete_at'];


    /**
     * 获取器
     * @return string
     */
    public function getSexAttribute(){
        return $this->attributes['sex']?'男士':'女士';
    }


//    public function article(){
//        $this->belongsTo(Article::class,'user_id');
//    }


}
