@extends('layout.manage')
@section('edit-type', 'ball')
@section('content-header', '賽事分析-讓分')
@section('content-table')
    <div class="form-group">
      <label>聯盟選單</label>
      <form action="/admin/manage/ball" id='legend-select' method="post">
        {!! Form::token() !!}
        <select class="form-control" name="legend_id" onchange="$('#legend-select').submit()">
          @foreach ($legends as $legend)
          <option value="{{$legend['id']}}" {{($legend['id'] == $ball['id']) ? 'selected' : ''}}>{{$legend['name']}}</option>
          @endforeach
        </select>
      </form>
    </div>

    <table id="legend-table" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>編號</th>
      <th>讓分</th>
      <th>盤口</th>
      <th>受讓</th>
      <th>精準預測</th>
      <th>球賽日期</th>
      <th>建立日期</th>
      <th>最新儲存時間</th>      
      <th>功能</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($results as $key => $result)
      <tr>
        <form action="save-sort">
        <td>{{$key+1}}</td>
        <td>{{$result['bigger']}}</td>
        <td>{{$result['handicap']}} {{($result['handicap_type'] == 1) ? '平' : ''}}</td>
        <td>{{$result['smaller']}}</td>
        <td>@if (!empty($result->game_predict))
                {{($result->game_predict == 0) ? $result['bigger'] : $result['smaller']}}
            @endif
        </td>
        <td>{{$result->game_date}}</td>
        <td>{{$result->created_at}}</td>
        <td>{{$result->updated_at}}</td>
        <td>
          <a class="btn btn-app" href="/admin/edit-ball/{{$result->legend_id}}/{{$result->id}}"><i class="fa fa-edit"></i> 編輯</a>
          <input type="hidden" value="{{$result->id}}" id="game_id">
          <a class="btn btn-app game_predict_button" data-toggle="modal" data-target="#modal-default"><i class="fa fa-bar-chart"></i> 預測</a>
        </td>
        <form>
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
      <th>建立日期</th>
      <th>最新儲存時間</th>      
      <th>功能</th>
    </tr>
    </tfoot>
    </table>
@endsection

@section('script')
  @parent
  <script type="text/javascript">
    $(function () {
      $('#legend-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: '新增商品',
                action: function ( e, dt, node, config ) {
                    window.location.href = "/admin/add-@yield('edit-type')/{{$ball['id']}}"
                }
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            }
        ]
      } )
    });
  </script>
@endsection