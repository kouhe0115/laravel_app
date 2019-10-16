<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title'];

//protected - そのクラス自身と継承クラスからアクセス可能、継承は可能
//$fillable - 代入を許可
}
