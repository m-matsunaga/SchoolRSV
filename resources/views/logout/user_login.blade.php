@extends('layouts.logout')

@section('content')

<div id="container">

{!! Form::open(['url' => '/user/login']) !!}

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
          {{ Form::label('メールアドレス') }}
          {{ Form::text('email',old('email'),['class' => 'input']) }}
        </div>
        <div class="login-form">
          {{ Form::label('パスワード') }}
          {{ Form::password('password',['class' => 'input']) }}
        </div>
        {{ Form::submit('ログイン',['class' => 'submit']) }}

        <p class="register-link">
          新規ユーザー登録は<a href="/user/register/form" class="register-link-a">こちら</a>
        </p>
      </div>
    </div>

{!! Form::close() !!}

</div>
@endsection
