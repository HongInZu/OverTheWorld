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
      <th>帳號</th>
      <th>姓名</th>
      <th>wechat</th>
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
        <td>{{$user->created_at}}</td>
        <td>{{$user->updated_at}}</td>
        <td>
          <a class="btn btn-app" href="/admin/edit-user/user/{{$user->id}}"><i class="fa fa-edit"></i> 編輯</a>
          <input type="hidden" value="{{$user->id}}" id="user_id">
          <a class="btn btn-app user_permission_button" data-toggle="modal" data-target="#modal-user"><i class="fa fa-user"></i> 會員資格</a>

        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>帳號</th>
      <th>姓名</th>
      <th>LineID</th>
      <th>建立日期</th>
      <th>最新儲存時間</th>  
      <th>功能</th>     
    </tr>
    </tfoot>
    </table>
@endsection