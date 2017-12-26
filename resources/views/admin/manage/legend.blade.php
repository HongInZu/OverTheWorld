@extends('layout.manage')
@section('edit-type', 'ball')
@section('method-type', 'legend')
@section('content-header', '新增聯盟')
@section('content-header-sub', '新增聯盟')

@section('content-table')
    <table id="legend" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>編號</th>
      <th>聯盟名稱</th>
      <th>狀態</th>
      <th>建立日期</th>
      <th>最新儲存時間</th>      
      <th>功能</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($results as $key => $result)
      <tr>
        <form action="save-sort">
        <td>{{$result['id']}}</td>
        <td>{{$result['name']}}</td>
        <td><div class="bootstrap-switch-id-switch-size bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-off bootstrap-switch-mini"><input type="checkbox" name="my-checkbox" value="{{$result['id']}}" {{$result['status']}} {{ ($result['status'] == 1) ? 'checked' : ''}} /></div></div></td>
        <td>{{$result->created_at}}</td>
        <td>{{$result->updated_at}}</td>
        <td>
          <a href="/admin/edit/legend/{{$result['id']}}" class="btn btn-app" ><i class="fa fa-bar-chart"></i> 編輯</a>
        </td>
        <form>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>聯盟名稱</th>
      <th>狀態</th>
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
        $("[name='my-checkbox']").bootstrapSwitch();
    });


    $("[name='my-checkbox']").on('switchChange.bootstrapSwitch', function(e) {
      if($(this).is(':checked')) {
          $.ajax({
            type: "post",
            data: {status: 1, id: $(this).val()},
            url: "/admin/legends/status-change",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            success: function(data) {
                console.log(data);
            },
            error: function(jqXHR) {
                console.log("發生錯誤, 請重新操作");
            }
          })
      } else {
        $.ajax({
            type: "post",
            data: {status: 0, id: $(this).val()},
            url: "/admin/legends/status-change",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            success: function(data) {
                console.log(data);
            },
            error: function(jqXHR) {
                console.log("發生錯誤, 請重新操作");
            }
        })
      }  
    });
  </script>
@endsection