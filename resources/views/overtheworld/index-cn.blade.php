@extends('overtheworld.layout')

@section('content-table')
  @foreach ($legends as $key => $legend)
  <div class="tab-pane {{($key == 0)?'active' : ''}}" id="{{$legend['id']}}" role="tabpanel">
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>编号</th>
      <th>让分</th>
      <th>盘口</th>
      <th>受让</th>
      <th>精准预测</th>
      <th>球赛日期</th>
      <th>比分</th>
      <th>结果</th>
    </tr>
    </thead>
    <tbody>
      @if (isset($gamePredict[$legend['id']]))
      @foreach ($gamePredict[$legend['id']] as $key => $value)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$value['bigger']}}</td>
        <td>{{$value['handicap']}} {{($value['handicap_type'] == 1) ? '平' : ''}}</td>
        <td>{{$value['smaller']}}</td>
        <td>
            @if(!$isLogin)
              请先登入帐号
            @elseif ($value['game_predict_status'] == 0)
              正在分析中
            @elseif ($permission || ($value['game_over'] == 1))
              {{($value->game_predict == 0) ? $value['bigger'] : $value['smaller']}}
            @else
              请先购买权限
            @endif
        </td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
          <td>{{$value['game_bigger_score']}} : {{$value['game_smaller_score']}}</td>
          <td>
            @if($value['game_result'] == $value['game_predict'])
              赢
            @else
              输
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
      <th>编号</th>
      <th>让分</th>
      <th>盘口</th>
      <th>受让</th>
      <th>精准预测</th>
      <th>球赛日期</th>
      <th>比分</th>
      <th>结果</th>
    </tr>
    </tfoot>
    </table>
  </div>
  @endforeach
@endsection

@section('content-table2')

  @foreach ($legends as $key => $legend)
  <div class="tab-pane {{($key == 0)?'active' : ''}}" id="{{$legend['id']}}bigsmall" role="tabpanel">
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>编号</th>
      <th>主队</th>
      <th>盘口</th>
      <th>客队</th>
      <th>精准预测</th>
      <th>球赛日期</th>
      <th>比分</th>
      <th>结果</th>
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
            @if(!$isLogin)
              请先登入帐号
            @elseif ($value['game_predict_status'] == 0)
              正在分析中
            @elseif ($permission || ($value['game_over'] == 1))
              {{($value->game_predict == 0) ? '大' : '小'}}
            @else
              请先购买权限
            @endif
        </td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
          <td>{{$value['game_bigger_score']}} : {{$value['game_smaller_score']}}</td>
          <td>
            @if($value['game_result'] == $value['game_predict'])
              赢
            @else
              输
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
      <th>编号</th>
      <th>让分</th>
      <th>盘口</th>
      <th>受让</th>
      <th>精准预测</th>
      <th>球赛日期</th>
      <th>比分</th>
      <th>结果</th>
    </tr>
    </tfoot>
    </table>
  </div>
  @endforeach
@endsection

@section('content-table-vip')
  @foreach ($legends as $key => $legend)
  <div class="tab-pane {{($key == 0)?'active' : ''}}" id="{{$legend['id']}}-vip" role="tabpanel">
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>编号</th>
      <th>让分</th>
      <th>盘口</th>
      <th>受让</th>
      <th>精准预测</th>
      <th>球赛日期</th>
      <th>比分</th>
      <th>结果</th>
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
            @if(!$isLogin)
              请先登入帐号
            @elseif ($value['game_predict_status'] == 0)
              正在分析中
            @elseif (($value['game_over'] == 1))
              {{($value->game_predict == 0) ? $value['bigger'] : $value['smaller']}}
            @elseif (!empty($value['vip']))
              @if(in_array($user['mobile_phone'], json_decode($value['vip'], true)))
                {{($value->game_predict == 0) ? $value['bigger'] : $value['smaller']}}
              @endif
            @else
              请先购买权限
            @endif
        </td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
          <td>{{$value['game_bigger_score']}} : {{$value['game_smaller_score']}}</td>
          <td>
            @if($value['game_result'] == $value['game_predict'])
              赢
            @else
              输
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
      <th>编号</th>
      <th>让分</th>
      <th>盘口</th>
      <th>受让</th>
      <th>精准预测</th>
      <th>球赛日期</th>
      <th>比分</th>
      <th>结果</th>
    </tr>
    </tfoot>
    </table>
  </div>
  @endforeach
@endsection

@section('content-table2-vip')

  @foreach ($legends as $key => $legend)
  <div class="tab-pane {{($key == 0)?'active' : ''}}" id="{{$legend['id']}}bigsmall-vip" role="tabpanel">
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>编号</th>
      <th>主队</th>
      <th>盘口</th>
      <th>客队</th>
      <th>精准预测</th>
      <th>球赛日期</th>
      <th>比分</th>
      <th>结果</th>
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
            @if(!$isLogin)
              请先登入帐号
            @elseif ($value['game_predict_status'] == 0)
              正在分析中
            @elseif (($value['game_over'] == 1))
              {{($value->game_predict == 0) ? $value['bigger'] : $value['smaller']}}
            @elseif (!empty($value['vip']))
              @if(in_array($user['mobile_phone'], json_decode($value['vip'], true)))
                {{($value->game_predict == 0) ? $value['bigger'] : $value['smaller']}}
              @endif
            @else
              请先购买权限
            @endif
        </td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
          <td>{{$value['game_bigger_score']}} : {{$value['game_smaller_score']}}</td>
          <td>
            @if($value['game_result'] == $value['game_predict'])
              赢
            @else
              输
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
      <th>编号</th>
      <th>让分</th>
      <th>盘口</th>
      <th>受让</th>
      <th>精准预测</th>
      <th>球赛日期</th>
      <th>比分</th>
      <th>结果</th>
    </tr>
    </tfoot>
    </table>
  </div>
  @endforeach
@endsection
