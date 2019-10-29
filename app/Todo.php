<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'title',
        'user_id'
    ];
    
    public function getByUserId($id)
    {
//      $thisはtodoインスタンスを指す
//      todoインスタンスに対して、whereで各レコードのuser_idと引数のログイン中のユーザーのIDとの検索をかけ、一致してものを取得
//      戻り値はコレクションオブジェクト、コレクションオブジェクトの中のitemsのオブジェクトの中の連想配列に各レコードの情報が格納されている
        return $this->where('user_id', $id)->get();
    }
}



//protected - そのクラス自身と継承クラスからアクセス可能、継承は可能
//$fillable - 代入を許可
//extends - クラスの継承の時に使うもので、class 子クラス名 extends 親クラス名の形で使う。
//継承された子クラスは、親クラスのプロパティ、メソッドを引き継いでいるので、子クラスでも使えるようになる。
//$fillableと$guardedの二つがあり、$fillableに定義されているものは複数代入された時に変更を許可するようになる。
