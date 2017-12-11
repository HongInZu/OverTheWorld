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
        <td>{{$result->created_at}}</td>
        <td>{{$result->updated_at}}</td>
        <td>
          <a class="btn btn-app" ><i class="fa fa-bar-chart"></i> 編輯</a>
        </td>
        <form>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>聯盟名稱</th>
      <th>建立日期</th>
      <th>最新儲存時間</th>      
      <th>功能</th>
    </tr>
    </tfoot>
    </table>
@endsection