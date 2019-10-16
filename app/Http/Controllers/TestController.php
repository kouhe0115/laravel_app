<?php

//TodoControllerのコピー
//名前空間：ファイルの居場所を示す
namespace App\Http\Controllers;

//use宣言：中で使うクラスを宣言する
use Illuminate\Http\Request;
use App\Todo;

//classに属する関数はメソッド
class TodoController extends Controller
{
    //$todoをプライベートで宣言
    private $todo;
    
    //第一引数にmodelのTOdo、第二引数で変数宣言
    public function __construct(Todo $instanceClass)
    {
        //クラス中で定義されたメンバー変数やメソッドは、中では$thisを付けることでアクセスすることができる
        $this->todo = $instanceClass;
    }
    
    //$this - class自体を指している
    //$this->todo - class内のtodoを指す
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = $this->todo->all();
        return view('todo.index', compact('todos'));
    }
    
    //$this->todo - todosTableのインスタンス
    //$todos = \DB::table('todos')->get();
    //compact() - controllerからの値の受け渡し、viewで使えるようにする
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->todo->fill($input)->save();
        return redirect()->to('todo');
    }
    
    //Request - ブラウザを通して(formから送られてきたデータ)ユーザーから送られる情報をすべて含んでいるオブジェクト
    //fill() - 属性の代入
    //save - DBへの保存
    
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //todoインスタンスに対してfindメソッド実行し、取得した値を$todoへ格納
        $todo = $this->todo->find($id);
        //取得したデータをviewへ渡す
        return view('todo.edit', compact('todo'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        //todoインスタンスに対してfindメソッド実行、取得した値に対してfill()で属性の代入、save()でDBに保存
        $this->todo->find($id)->fill($input)->save();
        return redirect()->to('todo');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //todoインスタンスに対して、findメソッド実行し取得、delete()メソッドで削除
        $this->todo->find($id)->delete();
        return redirect()->to('todo');
    }
    
}
