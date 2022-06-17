

// 出席変更機能
let attendance = function (id) {
  let changeSelect = document.querySelector('#jq-attendance-' + id);
  let selectVal = $(changeSelect).val();
  let rsvID = id;

  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: '/auth/reserve/detail/attendance',
    method: 'POST',
    data: {
      'selectVal': selectVal,
      'rsv_id': rsvID
    },
  })


    .done(function (data) {

    })
    .fail(function () {
      console.log('fail');
    });
};


//リモート ⇄ 本社
$('input[name="venue"]').on('change', function () {
  let selectVal = $(this).val();
  if (selectVal === 'office') {
    $('.office-frame').removeClass('none');
    $('.remote-frame').addClass('none');
  }

  if (selectVal === 'remote') {
    $('.remote-frame').removeClass('none');
    $('.office-frame').addClass('none');
  }

});
