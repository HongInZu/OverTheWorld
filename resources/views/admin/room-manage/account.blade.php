@extends('layout.manage')

@section('content-header', '控房帳戶')
@section('content-header-sub', '飯店管理')

@section('content-itemList')
  <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>編號</th>
      <th>名稱</th>
      <th>帳號</th>
      <th>E-mail</th>
      <th>群組</th>
      <th>密碼到期日</th>
      <th>狀態</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>1</td>
      <td>西湖度假村</td>
      <td>a92343242</td>
      <td>123123@gmail.com</td>
      <td>控房人員</td>
      <td>2017-10-28 16:19:57</td>
      <td><div class="bootstrap-switch-id-switch-size bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-off bootstrap-switch-mini"><input type="checkbox" name="my-checkbox" checked /></div></div></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <th>編號</th>
      <th>名稱</th>
      <th>帳號</th>
      <th>E-mail</th>
      <th>群組</th>
      <th>密碼到期日</th>
      <th>狀態</th>
    </tr>
    </tfoot>
  </table>
@endsection
