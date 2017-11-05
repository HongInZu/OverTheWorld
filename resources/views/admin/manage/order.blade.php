@extends('layout.manage')
@section('content-header', '訂單')
@section('content-header-sub', '訂單管理')

@section('content-table')
    <table id="example2" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>編號</th>
      <th>會員帳號</th>
      <th>姓名</th>
      <th>手機</th>
      <th>LineID</th>
      <th>建立日期</th>
      <th>最新儲存時間</th>      
    </tr>
    </thead>
    <tbody>
      @foreach ($orders as $key => $order)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$order->account}}</td>
        <td>{{$order->name}}</td>
        <td>{{$order->mobile_phone}}</td>
        <td>{{$order->Line}}</td>
        <td>{{$order->created_at}}</td>
        <td>{{$order->updated_at}}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>會員帳號</th>
      <th>姓名</th>
      <th>手機</th>
      <th>LineID</th>
      <th>建立日期</th>
      <th>最新儲存時間</th>      
    </tr>
    </tfoot>
    </table>
@endsection