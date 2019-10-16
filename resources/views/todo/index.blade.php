@extends ('layouts.app')
@section ('content')
    
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
        {{--indexから取得したtodosに対してforeach処理--}}
        @foreach ($todos as $todo)
            <tr>
                {{--EloquentというORMのObject になってます。$variable->カラムという書き方で値を取得できる。--}}
                <td class="align-middle">{{ $todo->title }}</td>
                <td class="align-middle">{{ $todo->created_at }}</td>
                <td class="align-middle">{{ $todo->updated_at }}</td>
                <td><a class="btn btn-primary" href="{{ route('todo.edit', $todo->id) }}">編集</a></td>
                <td>
                    {!! Form::open(['route' => ['todo.destroy', $todo->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
