<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    /**
     * 修改时间获取器
     * @return false|string
     */
    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updated_at']?date('Y-m-d',strtotime($this->attributes['updated_at'])):'未知时间';
    }


    /**
     * 创建时间获取器
     * @return false|string
     */
    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at']?date('Y-m-d',strtotime($this->attributes['created_at'])):'未知时间';
    }
}
