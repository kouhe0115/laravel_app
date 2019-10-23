@extends ('layouts.app')
{{-- この記述で親のファイルを継承している。ドットつなぎでディレクトリ.パスになっている--}}
@section ('content')
{{-- 親のファイルの@yield部分に呼び出すための記述 --}}
    
    <h1 class="page-header">ToDo一覧</h1>
    <p class="text-right">
        <a class="btn btn-success" href="/todo/create">ToDoを追加</a>
    </p>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th>やること</th>
            <th>作成日時</th>
            <th>更新日時</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
{{--    $todosの中にはCollectionのインスタンスが入っていて、foreachで回すと1レコードずつ取り出すことができる。--}}
        @foreach ($todos as $todo)
            <tr>
{{--            EloquentというORMのObject になってます。$variable->カラムという書き方で値を取得できる。--}}
{{--            {{}}で囲うことで、エスケープ処理（意味のある文字列をただの文字列に変換）してくれている--}}
                <td class="align-middle">{{ $todo->title }}</td>
                <td class="align-middle">{{ $todo->created_at }}</td>
                <td class="align-middle">{{ $todo->updated_at }}</td>
                <td><a class="btn btn-primary" href="{{ route('todo.edit', $todo->id) }}">編集</a></td>
                {{-- route()の第1引数にNameを渡し、第2引数でrouteパラメータを指定している。 --}}
                <td>
                    {!! Form::open(['route' => ['todo.destroy', $todo->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    
{{--                From::open
                    引数で配列を渡しキーで設定できる
                    Form::openでtokenはhiddenで自動で生成される。csrf対策用のtoken
                    HTMLタグを生成する際、アクションのNameを使用しルーティングからURLを作成してくれる
                    route routeキーを利用して、Nameを指定
                    methodキーではhttpリクエストを指定できる。デフォルトではpostが指定されている
--}}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
