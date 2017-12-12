@extends('overtheworld.layout')

@section('content-table')
  @foreach ($results as $key => $result)
  <div class="tab-pane {{($legends[0]['code'] == $key)?'active' : ''}}" id="{{$result[0]['game_type']}}" role="tabpanel">
    <table class="table table-bordered table-striped">
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
      @foreach ($result as $key => $value)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$value['bigger']}}</td>
        <td>{{$value['handicap']}} {{($value['handicap_type'] == 1) ? '平' : ''}}</td>
        <td>{{$value['smaller']}}</td>
        <td>
            @if ($value['game_predict_status'] == 0)
              正在分析中
            @elseif ($permission || ($value['game_over'] == 1))
              {{($value->game_predict == 0) ? $value['bigger'] : $value['smaller']}}
            @else
              請先購買權限
            @endif
        </td>
        <td>{{$value->game_date}}</td>
        @if ($value['game_over'] == 1)
          <td>{{$value['game_bigger_score']}} : {{$value['game_smaller_score']}}</td>
          <td>
            @if($value['game_result'] == $value['game_predict'])
              贏
            @else
              輸
            @endif
          </td>
        @else
          <td>球賽尚未結束</td>
          <td>球賽尚未結束</td>
        @endif
      </tr>
      @endforeach
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