
@extends('layouts.auth_login')

@section('pageTitle')
    <p class="page-title">予約確認画面</p>
@endsection


@section('content')

<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
              <div class="card-header text-center">
					      <a class="btn btn-outline-secondary float-left" href="{{ url('/auth/home/?date=' . $calendar->getPreviousMonth()) }}">前の月</a>

					      <span class="calendar-title">
                  {{ $calendar->getTitle() }}
                </span>
                <div class="month-title-position">
                  <a class="btn btn-outline-secondary this-month-button" href="/auth/home">今月</a>
					        <a class="btn btn-outline-secondary float-right" href="{{ url('/auth/home/?date=' . $calendar->getNextMonth()) }}">次の月</a>
                </div>
				      </div>
              <div class="card-body">
					        {!! $calendar->render() !!}
              </div>
           </div>
       </div>

   </div>

</div>

@endsection
