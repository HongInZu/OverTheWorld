@extends('overtheworld.layout')

@section('content-table')
    <table id="example2" class="table table-bordered table-striped">
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
      @foreach ($results as $key => $result)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$result['bigger']}}</td>
        <td>{{$result['handicap']}} {{($result['handicap_type'] == 1) ? '平' : ''}}</td>
        <td>{{$result['smaller']}}</td>
        <td>{{($result->game_predict == 0) ? $result['bigger'] : $result['smaller']}}</td>
        <td>{{$result->game_date}}</td>
        <td>{{$result['game_bigger_score']}} : {{$result['game_smaller_score']}}</td>
        <td>
          @if($result['game_result'] == $result['game_predict'])
            贏
          @else
            輸
          @endif
        </td>
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
@endsection