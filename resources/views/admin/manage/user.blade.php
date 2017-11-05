@extends('layout.manage')
@section('content-header', '會員')
@section('content-header-sub', '會員管理')

@section('content-table')
    <table id="example2" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>編號</th>
      <th>手機</th>
      <th>姓名</th>
      <th>LineID</th>
      <th>建立日期</th>
      <th>最新儲存時間</th>  
      <th>功能</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($users as $key => $user)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$user->mobile_phone}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->Line}}</td>
        <td>{{$user->created_at}}</td>
        <td>{{$user->updated_at}}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>手機</th>
      <th>姓名</th>
      <th>LineID</th>
      <th>建立日期</th>
      <th>最新儲存時間</th>
      <th>功能</th>    
    </tr>
    </tfoot>
    </table>
@endsection