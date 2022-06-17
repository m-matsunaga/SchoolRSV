
@extends('layouts.auth_login')

@section('pageTitle')
    <p class="page-title">予約詳細画面</p>
@endsection

@section('content')

<div class="rsv-detail-container">
  <div class="rsv-detail-title">
    <p class="rsv-detail-title-date">{{$rsv_date}}</p>
    <p>{{$rsv_frame}}部</p>
  </div>
  <table border="1">
    <tr>
      <th>参加者</th>
      <th>出席</th>
      <th>場所</th>
    </tr>

  @foreach ($rsv_details as $rsv_detail)
    <tr>
  <!-- 予約詳細（名前） -->
      <td>{{$rsv_detail->user->username}}</td>
  <!-- 予約詳細（出席） -->
      <td>
        <select name="attendance" id="jq-attendance-{{$rsv_detail->id}}" onchange="attendance({{$rsv_detail->id}}); return false;">
          <option>ー</option>
          <option value="出席" <?php if($rsv_detail->attendance === '出席'){ echo ' selected'; } ?>>出席</option>
          <option value="報告欠席" <?php if($rsv_detail->attendance === '報告欠席'){ echo ' selected'; } ?>>報告欠席</option>
          <option value="無断欠席" <?php if($rsv_detail->attendance === '無断欠席'){ echo ' selected'; } ?>>無断欠席</option>
        </select>
      </td>
  <!-- 予約詳細（場所） -->
      @if($rsv_detail->rsv_frame_id === 1
          || $rsv_detail->rsv_frame_id === 2
            || $rsv_detail->rsv_frame_id === 3)
        <td>リモート</td>
      @elseif($rsv_detail->rsv_frame_id === 4
              || $rsv_detail->rsv_frame_id === 5
                || $rsv_detail->rsv_frame_id === 6)
        <td>本社</td>
      @endif
    </tr>
  @endforeach
  </table>
</div>

@endsection
