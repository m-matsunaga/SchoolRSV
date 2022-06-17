@extends('layouts.logout')

@section('content')

<div id="container">

{!! Form::open(['url' => '/user/register']) !!}

    <div class="login-contents">

     <h1 class="logo">RSV</h1>
      <div class="login-form-container">
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="login-form">
          {{ Form::label('ユーザー名') }}
          {{ Form::text('username',old('username'),['class' => 'input']) }}
        </div>
        <div class="login-form">
          {{ Form::label('メールアドレス') }}
          {{ Form::text('email',old('email'),['class' => 'input']) }}
        </div>
        <div class="login-form">
          {{ Form::label('パスワード') }}
          {{ Form::password('password',['class' => 'input']) }}
          {{ Form::password('password-confirm',['class' => 'input','placeholder' => 'パスワード（確認）']) }}
        </div>
        {{ Form::submit('登録',['class' => 'submit']) }}
        <div class="register-toLogin">
          <a href="/user/login/form" class="login-link">ログイン画面へ戻る</a>
        </div>
      </div>
    </div>

{!! Form::close() !!}

</div>
@endsection
