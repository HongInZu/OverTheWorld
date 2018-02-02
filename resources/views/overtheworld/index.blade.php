@extends('overtheworld.layout')

@section('content-table')
  @foreach ($legends as $key => $legend)
  <div class="tab-pane {{($key == 0)?'active' : ''}}" id="{{$legend['id']}}" role="tabpanel">
    <table class="table table-bordered table-striped" width="100%">
    <thead>
    <tr>
      <th>編號</th>
      <th>讓分</th>
      <th>受讓</th>
      <th>球賽日期</th>
      <th>結果</th>
    </tr>
    </thead>
    <tbody>
      @if (isset($gamePredict[$legend['id']]))
      @foreach ($gamePredict[$legend['id']] as $key => $value)
      <tr name="game_predict">
        <td name="{{$value['id']}}">{{$key+1}}</td>
        <td>{{$value['bigger']}}</td>
        <td>{{$value['smaller']}}</td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
        <td>
            @if($value['game_result'] == $value['game_predict'])
              <span style=" color: green">
                赢
              </span>
            @else
              <span style=" color: red">
                輸
              </span>
            @endif          
        </td>
        @else
        <td><span style=" color: blue">
                比賽結果尚未出爐
              </span></td>
        @endif
      </tr>
      @endforeach
      @endif
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>讓分</th>
      <th>受讓</th>
      <th>球賽日期</th>
      <th>結果</th>
    </tr>
    </tfoot>
    </table>
  </div>
  @endforeach
@endsection

@section('content-table2')

  @foreach ($legends as $key => $legend)
  <div class="tab-pane {{($key == 0)?'active' : ''}}" id="{{$legend['id']}}bigsmall" role="tabpanel">
    <table class="table table-bordered table-striped" width="100%">
    <thead>
    <tr>
      <th>編號</th>
      <th>主隊</th>
      <th>客隊</th>
      <th>球賽日期</th>
      <th>結果</th>
    </tr>
    </thead>
    <tbody>
      @if (isset($gameBigAndSmall[$legend['id']]))
      @foreach ($gameBigAndSmall[$legend['id']] as $key => $value)
      <tr name="game_predict_bigandsmall">
        <td name="{{$value['id']}}" >{{$key+1}}</td>
        <td>{{$value['bigger']}}</td>
        <td>{{$value['smaller']}}</td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
        <td>
            @if($value['game_result'] == $value['game_predict'])
              <span style=" color: green">
                赢
              </span>
            @else
              <span style=" color: red">
                輸
              </span>
            @endif          
        </td>
        @else
        <td><span style=" color: blue">
                比賽結果尚未出爐
              </span></td>
        @endif
      </tr>
      @endforeach
      @endif
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>主隊</th>
      <th>客隊</th>
      <th>球賽日期</th>
      <th>結果</th>
    </tr>
    </tbody>
    </tfoot>
    </table>
  </div>
  @endforeach
@endsection

@section('content-table-vip')
  @foreach ($legends as $key => $legend)
  <div class="tab-pane {{($key == 0)?'active' : ''}}" id="{{$legend['id']}}-vip" role="tabpanel">
    <table class="table table-bordered table-striped" width="100%">
    <thead>
    <tr>
      <th>編號</th>
      <th>讓分</th>
      <th>受讓</th>
      <th>球賽日期</th>
      <th>結果</th>
    </tr>
    </thead>
    <tbody>
      @if (isset($gameVip[$legend['id']]))
      @foreach ($gameVip[$legend['id']] as $key => $value)
      <tr name="game_predict_vip">
        <td name="{{$value['id']}}" >{{$key+1}}</td>
        <td>{{$value['bigger']}}</td>
        <td>{{$value['smaller']}}</td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
          <td>
            @if($value['game_result'] == $value['game_predict'])
              <span style=" color: green">
                赢
              </span>
            @else
              <span style=" color: red">
                輸
              </span>
            @endif          
          </td>
        @else
          <td><span style=" color: blue">
                比賽結果尚未出爐
              </span></td>
        @endif
      </tr>
      @endforeach
      @endif
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>讓分</th>
      <th>受讓</th>
      <th>球賽日期</th>
      <th>結果</th>
    </tr>
    </tbody>
    </tfoot>
    </table>
  </div>
  @endforeach
@endsection

@section('content-table2-vip')

  @foreach ($legends as $key => $legend)
  <div class="tab-pane {{($key == 0)?'active' : ''}}" id="{{$legend['id']}}bigsmall-vip" role="tabpanel">
    <table class="table table-bordered table-striped" width="100%">
    <thead>
    <tr>
      <th>編號</th>
      <th>主隊</th>
      <th>客隊</th>
      <th>球賽日期</th>
      <th>結果</th>
    </tr>
    </thead>
    <tbody>
      @if (isset($gameBigAndSmallVip[$legend['id']]))
      @foreach ($gameBigAndSmallVip[$legend['id']] as $key => $value)
      <tr name="game_predict_bigandsmall_vip">
        <td name="{{$value['id']}}" >{{$key+1}}</td>
        <td>{{$value['bigger']}}</td>
        <td>{{$value['smaller']}}</td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
          <td>
            @if($value['game_result'] == $value['game_predict'])
              <span style=" color: green">
                赢
              </span>
            @else
              <span style=" color: red">
                輸
              </span>
            @endif          
          </td>
        @else
          <td><span style=" color: blue">
                比賽結果尚未出爐
              </span></td>
        @endif
      </tr>
      @endforeach
      @endif
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>讓分</th>
      <th>受讓</th>
      <th>球賽日期</th>
      <th>結果</th>
    </tr>
    </tfoot>
    </table>
  </div>
  @endforeach
@endsection


@section('table-script')
<script type="text/javascript">
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>讓分:</td>'+
                '<td>'+d.bigger+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>受讓:</td>'+
                '<td>'+d.handicap+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>受讓:</td>'+
                '<td>'+d.smaller+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>精準預測:</td>'+
                '<td>'+d.game_predict+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>球賽日期:</td>'+
                '<td>'+d.game_date+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>比分:</td>'+
                '<td>'+d.score+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>結果:</td>'+
                '<td>'+d.result+'</td>'+
            '</tr>'+
        '</table>';
    }
     
    $(document).ready(function() {

         
        // Add event listener for opening and closing details
        $('.table-striped tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = $(this).parents('table').first().DataTable().row( tr );
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: {'type': tr.attr('name'), 'id': $(this).attr('name')},
                    url: "/result",
                    dataType: "json",
                    success: function(data) {
                        row.child( format(data) ).show();
                    },
                    error: function(jqXHR) {
                        alert("發生錯誤, 請重新操作");
                    }
                })
                tr.addClass('shown');
            }
        } );
    } );

    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        table = $('.table-striped').DataTable({
            "scrollX": true,
            "autoWidth": true,
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                {},
                {},
                {},
                {}
            ],
        });

        $('.nav-link').click(function(){
            setTimeout(function(){
                table.columns.adjust().draw();
            }, 0.5);
        })

        nowuiKit.initSliders();
    });


</script>
@endsection