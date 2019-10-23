<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title'];

//protected - そのクラス自身と継承クラスからアクセス可能、継承は可能
//$fillable - 代入を許可
}

//extends - クラスの継承の時に使うもので、class 子クラス名 extends 親クラス名の形で使う。
//継承された子クラスは、親クラスのプロパティ、メソッドを引き継いでいるので、子クラスでも使えるようになる。
//$fillableと$guardedの二つがあり、$fillableに定義されているものは複数代入された時に変更を許可するようになる。
