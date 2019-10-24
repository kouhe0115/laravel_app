<?php

//ファイルの名付け、重複防ぎ、フォアイルの指定して、呼び出しに使える、全てにおいて一番上にかく
namespace App\Http\Controllers;

//フルパスの記述は冗長になるので、エイリアス（別名）でパスの記述を短くできる、ファイルの参照
use Illuminate\Http\Request;
use App\Todo;


class TodoController extends Controller
{
    private $todo;
    
//  コンストラクタ、マジックメソッド、インスタンスが生成時に動く
//  コンストラクタが動いた時にインスタンスが生成されて、変数に代入
    public function __construct(Todo $instanceClass)
    {
//      上記のプライベートにTodoのインスタンスを格納、$thisは自身（クラス自体）を指す
        $this->todo = $instanceClass;
    }
    
    
    public function index()
    {
        $todos = $this->todo->all();
//      allメソッドを使うと、各レコードのカラムと値が入ったオブジェクトが複数返ってくる。
//      Collectionオブジェクトが返ってくる。全レコードがitemsプロパティの中に配列として入っている。
        return view('todo.index', compact('todos'));
//      第1引数に viewのパスを渡す。
//      第2引数で関数、連想配列等を指定できる
//      dd($todos)の中身はtable構成などの情報が入ったオブジェクトが入った配列。
//      compact()には変数名を文字列で渡すことで、変数名の文字列をキーとした連想配列を生成してくれる。
//      この時にローカル変数 $todosをviewではキーとして扱うことで、view側で変数を使えるようになる。
    }
    
//    selct * from todos
//  compact() - 変数名をキーに値を配列にして返す
    
    public function create()
    {
        return view('todo.create');
//      view()ヘルパ関数で引数にviewのファイルパスを拡張子抜きで指定。
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
//      HTTPリクエストインスタンスを取得title, token の二つのキーを持つ連想配列が返り値。
        $this->todo->fill($input)->save();
        return redirect()->to('todo');
    }
//    in int todods(title) values title

//      store(Request)でRequest インスタンス生成
//      このオブジェクトの、requestプロパティのparametersプロパティの中に連想配列が入っている
//      all()メソッドで上記オブジェクトのrequestのparametersの連想配列を取り出している
//      method token title の3つの値が格納されている連想配列。
//      fill()の戻り値はtodoオブジェクト、$fillableで許可されたプロパティだけ取得、save()でメソッド保存

//      redirect()は第一引数にURIを指定。今回は/todoへリダイレクトしている
//      redirect()の戻り値はRedirectorオブジェクト
//      redirect()->to('todo')の戻り値はRedirectResponseオブジェクト。このオブジェクトのcontentプロパティの中に、URL情報が入っている
    
    public function show($id)
    {
    
    }
    
    public function edit($id)
    {
        $todo = $this->todo->find($id);
//      findの戻り値はTodoオブジェクト
        return view('todo.edit', compact('todo'));
    }
//    sl * foom todos where id = $id;
    
    public function update(Request $request, $id)
    {
        $params = $request->all();
//      all()の戻り値はtoken method title の連想配列。
        $this->todo->find($id)->fill($params)->save();
        return redirect()->to('todo');
    }
//    update todos set  title = $input:input where = id $id
    // fill()Eloquentが$この値を設定できるかチェックしてくれる。その後save()によりテーブルの対応するidの更新処理が行われる。
    
    public function destroy($id)
    {
        $this->todo->find($id)->delete();
        return redirect()->to('todo');
    }
    // find()はデータベースのidにのみ検索をかけるメソッドでレコードのオブジェクトが返ってくる。
    // delete()によって物理削除している。
}
