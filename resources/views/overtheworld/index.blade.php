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
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$value['bigger']}}</td>
        <td>{{$value['smaller']}}</td>
        <td>{{$value->game_date}}</td>
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
      <th>盤口</th>
      <th>客隊</th>
      <th>精準預測</th>
      <th>球賽日期</th>
      <th>比分</th>
      <th>結果</th>
    </tr>
    </thead>
    <tbody>
      @if (isset($gameBigAndSmall[$legend['id']]))
      @foreach ($gameBigAndSmall[$legend['id']] as $key => $value)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$value['bigger']}}</td>
        <td>{{$value['handicap']}} {{($value['handicap_type'] == 1) ? '平' : ''}}</td>
        <td>{{$value['smaller']}}</td>
        <td>
            @if ($permission || ($value['game_over'] == 1))
              {{($value->game_predict == 0) ? '大' : '小'}}
            @elseif(!$isLogin)
            <span style="color: orange">
              請先登入帳號
            </span>
            @elseif ($value['game_predict_status'] == 0)
              正在分析中
            @else
            <span style=" color: red">
              請先購買權限
            </span>
            @endif
        </td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
          <td>{{$value['game_bigger_score']}} : {{$value['game_smaller_score']}}</td>
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
          <td></td>
          <td></td>
        @endif
      </tr>
      @endforeach
      @endif
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>讓分</th>
      <th>盤口</th>
      <th>受讓</th>
      <th>精準預測</th>
      <th>球賽日期</th>
      <th>比分</th>
      <th>結果</th>
    </tr>
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
      <th>盤口</th>
      <th>受讓</th>
      <th>精準預測</th>
      <th>球賽日期</th>
      <th>比分</th>
      <th>結果</th>
    </tr>
    </thead>
    <tbody>
      @if (isset($gameVip[$legend['id']]))
      @foreach ($gameVip[$legend['id']] as $key => $value)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$value['bigger']}}</td>
        <td>{{$value['handicap']}} {{($value['handicap_type'] == 1) ? '平' : ''}}</td>
        <td>{{$value['smaller']}}</td>
        <td>
            @if (($value['game_over'] == 1))
              {{($value->game_predict == 0) ? $value['bigger'] : $value['smaller']}}
            @elseif(!$isLogin)
            <span style="color: orange">
              請先登入帳號
            </span>
            @elseif ($value['game_predict_status'] == 0)
              正在分析中
            @elseif (!empty($value['vip']))
              @if(in_array($user['mobile_phone'], json_decode($value['vip'], true)))
                {{($value->game_predict == 0) ? $value['bigger'] : $value['smaller']}}
              @else
              <span style=" color: red">
                請先購買權限
              </span>
              @endif
            @else
            <span style=" color: red">
              請先購買權限
            </span>
            @endif
        </td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
          <td>{{$value['game_bigger_score']}} : {{$value['game_smaller_score']}}</td>
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
          <td></td>
          <td></td>
        @endif
      </tr>
      @endforeach
      @endif
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>讓分</th>
      <th>盤口</th>
      <th>受讓</th>
      <th>精準預測</th>
      <th>球賽日期</th>
      <th>比分</th>
      <th>結果</th>
    </tr>
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
      <th>盤口</th>
      <th>客隊</th>
      <th>精準預測</th>
      <th>球賽日期</th>
      <th>比分</th>
      <th>結果</th>
    </tr>
    </thead>
    <tbody>
      @if (isset($gameBigAndSmallVip[$legend['id']]))
      @foreach ($gameBigAndSmallVip[$legend['id']] as $key => $value)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$value['bigger']}}</td>
        <td>{{$value['handicap']}} {{($value['handicap_type'] == 1) ? '平' : ''}}</td>
        <td>{{$value['smaller']}}</td>
        <td>
            @if (($value['game_over'] == 1))
              {{($value->game_predict == 0) ? '大' : '小'}}
            @elseif(!$isLogin)
            <span style="color: orange">
              請先登入帳號
            </span>
            @elseif ($value['game_predict_status'] == 0)
              正在分析中
            @elseif (!empty($value['vip']))
              @if(in_array($user['mobile_phone'], json_decode($value['vip'], true)))
                {{($value->game_predict == 0) ? '大' : '小'}}
              @else
              <span style=" color: red">
                請先購買權限
              </span>
              @endif
            @else
            <span style=" color: red">
              請先購買權限
            </span>
            @endif
        </td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
          <td>{{$value['game_bigger_score']}} : {{$value['game_smaller_score']}}</td>
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
          <td></td>
          <td></td>
        @endif
      </tr>
      @endforeach
      @endif
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>讓分</th>
      <th>盤口</th>
      <th>受讓</th>
      <th>精準預測</th>
      <th>球賽日期</th>
      <th>比分</th>
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
                '<td>Full name:</td>'+
                '<td>'+d.name+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extension number:</td>'+
                '<td>'+d.extn+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extra info:</td>'+
                '<td>And any further details here (images etc)...</td>'+
            '</tr>'+
        '</table>';
    }
     
    $(document).ready(function() {

         
        // Add event listener for opening and closing details
        $('.table-striped tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
     
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format('d') ).show();
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