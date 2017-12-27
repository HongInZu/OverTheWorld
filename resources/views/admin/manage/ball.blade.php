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
          <a class="btn btn-app" href="/admin/delete-ball/{{$result->legend_id}}/{{$result->id}}" onclick="return(confirm('確定要刪除嗎') ? true : false)"><i class="fa fa-trash"></i> 刪除</a>
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
@section('modal')
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">預測分析</h4>
            </div>
              
              <form id='game_predict_form'>
              <input type="hidden" name="game_predict_id">

              <div class="col-md-12">

              <div class="form-group  col-md-6">
                  <label>比賽分析</label>
                  <div class="controls">
                      <div class="switch" tabindex="0">
                        <input type="checkbox" name="game_predict_status" value=""/>                    
                      </div>
                  </div>
              </div>

              <div class="form-group  col-md-6">
                  <label>比賽結束</label>
                  <div class="controls">
                      <div class="switch" tabindex="0">
                        <input type="checkbox" name="game_over" value=""/>                    
                      </div>
                  </div>
              </div>

              <div class="form-group col-md-6">
                <label>讓方比數</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-balance-scale"></i>
                  </span>
                  <input type="number" class="form-control" name="game_bigger_score" placeholder="">
                </div>
              </div>

              <div class="form-group col-md-6">
                <label>受讓方比數</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-balance-scale"></i>
                  </span>
                  <input type="number" class="form-control" name="game_smaller_score" placeholder="">
                </div>
              </div>
            <!-- text input -->
            <div class="form-group col-md-6">
              <label>精準預測</label>
              <!-- radio -->
              <div class="form-group">
                <label>
                  <input type="radio" name="game_predict" class="minimal game_predict" value="0">
                  讓方
                </label>
                <label>
                  <input type="radio" name="game_predict" class="minimal game_predict" value="1">
                  受讓方
                </label>
              </div>
            </div>

            <div class="form-group col-md-6">
              <label>賽事結果</label>
              <div class="form-group">
                <label>
                  <input type="radio" name="game_result" class="minimal game_result" value="0">
                  讓方
                </label>
                <label>
                  <input type="radio" name="game_result" class="minimal game_result" value="1">
                  受讓方
                </label>
              </div>
            </div>
              </div>
              </form>

            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">關閉</button>
              <button type="button" id="save-game-predict" class="btn btn-primary">儲存變更</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
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