<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
        return  $this->belongsToMany(
            Permission::class,          //目标模型
            'permission_role',           //连接表表
            'role_id',           //此关联模型在连接表中的键名
            'permission_id',     //另一个模型在连接表中的键名
            'id',                   //此模型的主键
            'id'                    //另一个模型的主键
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
