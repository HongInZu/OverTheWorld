@extends('layout.manage')

@section('content-header', '控房帳戶')
@section('content-header-sub', '飯店管理')
@section('edit-type', 'hotel')
@section('method-type', 'hotel-style')

@section('content-itemList')
  <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>編號</th>
      <th>房型代碼/名稱</th>
      <th>房型狀態</th>
      <th>排序</th>
      <th>備註</th>
      <th>最新儲存時間</th>
      <th>建立時間</th>
      <th>功能</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>1</td>
      <td>台北Ｗ飯店</td>
      <td>Alex Chen</td>
      <td>聯絡電話</td>
      <td></td>
      <td>2017-10-28 16:19:57</td>
      <td>2016-10-10 20:07:21</td>
      <td><a class="btn btn-app" href="/admin/edit-hotel/hotel-style/{{$id}}"><i class="fa fa-edit"></i> 編輯</a></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>房型代碼/名稱</th>
      <th>房型狀態</th>
      <th>排序</th>
      <th>備註</th>
      <th>最新儲存時間</th>
      <th>建立時間</th>
      <th>功能</th>
    </tr>
    </tfoot>
  </table>
@endsection
