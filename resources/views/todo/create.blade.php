@extends ('layouts.app')
@section ('content')
    
    <h2 class="mb-3">ToDo作成</h2>
    {!! Form::open(['route' => 'todo.store']) !!}
      <div class="form-group">
        {!! Form::input('text', 'title', null, ['required', 'class' => 'form-control', 'placeholder' => 'ToDo内容']) !!} <!-- 変更 -->
      </div>
      {!! Form::submit('追加', ['class' => 'btn btn-success float-right']) !!}
    {!! Form::close() !!}

{{--
     methodはデフォルトでpost,
     Form::input
        第1引数で入力タイプを指定できる
        第2引数でname 属性を指定
        第3引数でvalue 属性 オプション
        第4引数で追加したい属性を配列で指定
        今回はrequired属性 class, placeholderを指定
        required属性の指定、必須パラメータとする、未入力で投稿しようとすると、未入力だと返してくれる
        バリデーション
--}}

@endsection
