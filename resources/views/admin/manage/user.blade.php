@extends('layout.manage')
@section('edit-type', 'user')
@section('method-type', 'user')
@section('content-header', '訂單')
@section('content-header-sub', '訂單管理')

@section('content-table')
    <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>編號</th>
      <th>姓名</th>
      <th>手機號碼</th>
      <th>wechat</th>
      <th>會員類別</th>
      <th>建立日期</th>
      <th>最新儲存時間</th>  
      <th>功能</th>     
    </tr>
    </thead>
    <tbody>
      @foreach ($users as $key => $user)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->mobile_phone}}</td>
        <td>{{$user->wechat}}</td>
        <td>{{($user->user_type == 'member') ? '普通會員' : '管理員'}}</td>
        <td>{{$user->created_at}}</td>
        <td>{{$user->updated_at}}</td>
        <td>
          @if($user['user_type'] == 'root')
          <a class="btn btn-app" href="/admin/edit-user/user/{{$user->id}}"><i class="fa fa-edit"></i> 編輯</a>
          @endif
          @if($user['user_type'] == 'member')
          <input type="hidden" value="{{$user->id}}" id="user_id">
          <a class="btn btn-app user_permission_button" data-toggle="modal" data-target="#modal-user"><i class="fa fa-user"></i> 會員資格</a>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>姓名</th>
      <th>手機號碼</th>
      <th>wechat</th>
      <th>會員類別</th>
      <th>建立日期</th>
      <th>最新儲存時間</th>  
      <th>功能</th>     
    </tr>
    </tfoot>
    </table>
@endsection

@section('modal')
      <div class="modal fade" id="modal-user">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">編輯會員資格</h4>
            </div>
              
              <form id='user_permission_form'>
              <input type="hidden" name="user_id">

              <div class="col-md-12">

<!--               <div class="form-group">
              <label>會員資格</label>
              <select class="form-control" name="user_type">
                <option value="member">一般會員</option>
                <option value="user">付費會員</option>
                <option value="vip">VIP 會員</option>
                <option value="admin">管理員</option>
              </select>
            </div> -->


            <div class="form-group">
              <label>有效日期</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" name="until_date" value="" id="datepicker" required>
              </div>
              <!-- /.input group -->
            </div>

            </div>
            </form>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">關閉</button>
            <button type="button" id="save-user-permission" class="btn btn-primary">儲存變更</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
@endsection