@extends('layout.admin')

@section('style')
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="/plugins/timepicker/bootstrap-timepicker.min.css">

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection

@section('content-header', '飯店管理')
@section('content-header-sub', '新增飯店')

@section('content')
  <div class="row">
    <form role="form" action="/admin/edit-hotel/to-hotel" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="id" value="{{ $hotel['id'] or -1}}">
      <input type="hidden" name="item_type" value="@yield('item-type')">
      <div class="col-md-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">基本資料</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- text input -->
            <div class="form-group">
              <label>飯店名稱(繁體)</label>
              <input type="text" name="name_zh-tw" class="form-control" placeholder="" value="{{ $hotel['name_zh-tw'] or '' }}" >
            </div>
            <div class="form-group">
              <label>飯店名稱(簡體)</label>
              <input type="text" name="name_zh-cn" class="form-control" placeholder="" value="{{ $hotel['name_zh-cn'] or '' }}" >
            </div>
            <div class="form-group">
              <label>飯店名稱(英文)</label>
              <input type="text" name="name_en" class="form-control" placeholder="" value="{{ $hotel['name_en'] or '' }}" >
            </div>
            <div class="form-group">
              <label>公司名稱</label>
              <input name="point" type="company_name" class="form-control" placeholder="" value="{{ $hotel['point'] or '' }}" >
            </div>
            <div class="form-group">
              <label>統一編號</label>
              <input name="thrift" type="uniform_numbers" class="form-control" placeholder="" value="{{ $hotel['thrift'] or '' }}" >
            </div>
            <div class="form-group">
              <label>飯店電話</label>
              <input name="price" type="phone_number" class="form-control" placeholder="" value="{{ $hotel['price'] or '' }}" >
            </div>
            <div class="form-group">
              <label>飯店傳真</label>
              <input name="thrift" type="fax_number" class="form-control" placeholder="※訂房確認單將發送至此，若輸入兩組以上傳真請使用小寫逗號(,)分隔" value="{{ $hotel['thrift'] or '' }}" >
            </div>
            <div class="form-group">
              <label>Email</label>
              <input name="thrift" type="e-mail" class="form-control" placeholder="※訂房確認單將發送至此，若輸入兩組以上傳真請使用小寫逗號(,)分隔" value="{{ $hotel['thrift'] or '' }}" >
            </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">飯店資訊</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- text input -->
             <div class="form-group">
              <label>地址(繁體)</label>
              <input type="text" name="address_zh-tw" class="form-control" placeholder="" value="{{ $hotel['address_zh-tw'] or '' }}" >
            </div>
            <div class="form-group">
              <label>地址(簡體)</label>
              <input type="text" name="address_zh-cn" class="form-control" placeholder="" value="{{ $hotel['address_zh-cn'] or '' }}" >
            </div>
            <div class="form-group">
              <label>地址(英文)</label>
              <input type="text" name="address_en" class="form-control" placeholder="" value="{{ $hotel['address_en'] or '' }}" >
            </div>
            <div class="form-group">
              <label>旅館登記號</label>
              <input name="thrift" type="hotel_registration_number" class="form-control" placeholder="" value="{{ $hotel['thrift'] or '' }}" >
            </div>
            <div class="form-group">
              <label>緯度</label>
              <input type="text" name="latitude" class="form-control" placeholder="" value="{{ $hotel['latitude'] or '' }}" >
            </div>
            <div class="form-group">
              <label>經度</label>
              <input type="text" name="longitude" class="form-control" placeholder="" value="{{ $hotel['longitude'] or '' }}" >
            </div>
            <!-- time Picker -->
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <label>入住時間</label>

                <div class="input-group">
                  <input type="text" class="form-control timepicker" name="check_in" value="{{ $hotel['check_in'] or '' }}">

                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <!-- time Picker -->
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <label>退房時間</label>

                <div class="input-group">
                  <input type="text" class="form-control timepicker" name="check_out" value="{{ $hotel['check_out'] or '' }}">

                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
          <!-- /.box-body -->
        </div>
        </div>

      </div>
      <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">飯店描述(繁體)</a></li>
              <li><a href="#tab_2" data-toggle="tab">飯店描述(簡體)</a></li>
              <li><a href="#tab_3" data-toggle="tab">飯店描述(英文)</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="box-body pad">
                  <textarea name="content_zh-tw" id="editor1" name="editor1" rows="10" cols="80">
                  </textarea>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="box-body pad">
                  <textarea name="content_zh-cn" id="editor2" name="editor1" rows="10" cols="80">
                  </textarea>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="box-body pad">
                  <textarea name="content_en" id="editor3" name="editor1" rows="10" cols="80">
                  </textarea>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            <div class="box-footer">
              <button type="button" id="cancel" class="btn btn-default">取消</button>
              <button type="submit" class="btn btn-info pull-right">提交</button>
            </div>
          </div>
          <!-- nav-tabs-custom -->
      </div>
    </form>
  </div>
@endsection

@section('script')
  <!-- jQuery 3 -->
  <script src="/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/dist/js/demo.js"></script>
  <!-- CK Editor -->
  <script src="/bower_components/ckeditor/ckeditor.js"></script>

  <script src="/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })

    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor2')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })

    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor3')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })

    $('#cancel').click(function(){
      history.back();
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    $('[data-mask]').inputmask()

  </script>
@endsection