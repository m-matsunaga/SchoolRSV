
@extends('layouts.auth_login')

@section('pageTitle')
    <p class="page-title">予約枠登録画面</p>
@endsection


@section('content')

<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="radio-button">
                <input type="radio" name="venue" value="remote" checked>リモート
                <input type="radio" name="venue" value="office">本社
           </div>
           <div class="card">
              <div class="card-header text-center">
					      <a class="btn btn-outline-secondary float-left" href="{{ url('/auth/frame/register/view/?date=' . $calendar->getPreviousMonth()) }}">前の月</a>

					      <span class="calendar-title">
                  {{ $calendar->getTitle() }}
                </span>
                <div class="month-title-position">
                  <a class="btn btn-outline-secondary this-month-button" href="/auth/frame/register/view">今月</a>
					        <a class="btn btn-outline-secondary float-right" href="{{ url('/auth/frame/register/view/?date=' . $calendar->getNextMonth()) }}">次の月</a>
                </div>
				      </div>
            {!! Form::open(['url' => '/auth/frame/register']) !!}
              <div class="card-body">
					        {!! $calendar->render() !!}
					<div class="rsv-button">
						<button type="submit" class="btn btn-primary">登録</button>
					</div>
              </div>
            {!! Form::close() !!}
           </div>
       </div>

   </div>
</div>

@endsection
