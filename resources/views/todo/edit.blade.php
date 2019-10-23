@extends ('layouts.app')
@section ('content')
    
    <h2 class="mb-3">ToDo編集</h2>
        {!! Form::open(['route' => ['todo.update', $todo->id], 'method' => 'PUT']) !!}
            <div class="form-group">
                {!! Form::input('text', 'title', $todo->title, ['required', 'class' => 'form-control']) !!}
            </div>
        {!! Form::submit('更新', ['class' => 'btn btn-success float-right']) !!}
    {!! Form::close() !!}

{{--
    Form::input
        第1引数で入力タイプを指定できる
        第2引数でname 属性を指定
        第3引数でvalue 属性 オプション
        第4引数で追加したい属性を配列で指定
        今回はrequired属性 class="form-control", placeholderにToDo内容を指定
--}}
@endsection
