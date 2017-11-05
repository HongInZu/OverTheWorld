@extends('layout.manage')
@section('edit-type', 'hotel')
@section('method-type', 'hotel')
@section('content-header', '飯店管理')

@section('content-itemList')
  <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>編號</th>
      <th>飯店名稱</th>
      <th>聯絡人</th>
      <th>聯絡電話</th>
      <th>部門</th>
      <th>最新儲存時間</th>
      <th>建立日期</th>
      <th>功能</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($hotels as $key => $hotel)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{ $hotel['name_zh-tw'] or '' }}</td>
        <td>{{ $hotel['name_1'] or '' }}
            {{ !empty($hotel['job_title_1']) ? '' :''}}
            {{ $hotel['job_title_1'] or '' }}</td>
        <td>{{ $hotel['phone_1'] or '' }}</td>
        <td>{{ $hotel['department_1'] or '' }}</td>
        <td>{{$hotel->updated_at}}</td>
        <td>{{$hotel->created_at}}</td>
        <td>
          <a class="btn btn-app" href="/admin/edit-hotel/hotel/{{$hotel['id']}}"><i class="fa fa-edit"></i> 飯店基本資料</a>
          <a class="btn btn-app" href="/admin/edit-hotel/hotel-feature/{{$hotel['id']}}"><i class="fa fa-edit"></i> 飯店狀態設定</a>
          <a class="btn btn-app" href="/admin/manage-hotel/hotel-style/{{$hotel['id']}}"><i class="fa fa-plus-square-o"></i> 新增房型</a>
          <a class="btn btn-app" href="/admin/manage-hotel/room/{{$hotel['id']}}"><i class="fa fa-calendar-minus-o"></i> 特殊日</a>
        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>飯店名稱</th>
      <th>聯絡人</th>
      <th>聯絡電話</th>
      <th>部門</th>
      <th>最新儲存時間</th>
      <th>建立日期</th>
      <th>功能</th>
    </tr>
    </tfoot>
  </table>
@endsection
