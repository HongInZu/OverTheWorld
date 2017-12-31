@extends('layout.admin')

@section('style')
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">

  <link href="https://unpkg.com/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">

  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/plugins/iCheck/all.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection

@section('content-header', '網站資料')
@section('content-header-sub', '網站資料')

@section('content')
  <div class="row">
    <form role="form" action="/admin/edit-information/todb" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="col-md-12">
        <!-- general form elements disabled -->
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">匯款資訊</a></li>
                    <li><a href="#tab_2" data-toggle="tab">條款與保護</a></li>
                    <li><a href="#tab_3" data-toggle="tab">球版標題</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                      <div class="box-body pad">
                        <textarea name="transfer" id="editor1" rows="10" cols="80">
                          {{ $informations['transfer'] or '' }}
                        </textarea>
                      </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                      <div class="box-body pad">
                        <textarea name="terms" id="editor2" rows="10" cols="80">
                          {{ $informations['terms'] or '' }}
                        </textarea>
                      </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                      <div class="box-body pad">
                        <div class="form-group">
                          <label>球版標題 - 讓分</label>
                          <input type="text" class="form-control" name="ball-title" placeholder="" value="{{$informations['ball-title'] or ''}}" required>
                        </div>
                        <div class="form-group">
                          <label>球版標題 - 大小分</label>
                          <input type="text" class="form-control" name="bigandsmall-title" placeholder="" value="{{$informations['bigandsmall-title'] or ''}}" required>
                        </div>
                        <div class="form-group">
                          <label>球版標題 - 讓分 - 單場賽事</label>
                          <input type="text" class="form-control" name="ball-title-vip" placeholder="" value="{{$informations['ball-title-vip'] or ''}}" required>
                        </div>
                        <div class="form-group">
                          <label>球版標題 - 大小分 - 單場賽事</label>
                          <input type="text" class="form-control" name="bigandsmall-title-vip" placeholder="" value="{{$informations['bigandsmall-title-vip'] or ''}}" required>
                        </div>
                      </div>
                    </div>
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
          <!-- /.box-body -->
        <!-- /.box -->
      </div>

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
  <!-- Select2 -->
  <script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script src="/dist/js/bootstrap-switch.min.js"></script>
  <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="/bower_components/datatables.net/js/dataTables.buttons.min.js"></script>
  <script src="/bower_components/datatables.net/js/jszip.min.js"></script>
  <script src="/bower_components/datatables.net/js/buttons.html5.min.js"></script>
  <script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
  <script src="/plugins/iCheck/icheck.min.js"></script>

  <script>
    $(function () {
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })

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

    $("[name='status']").bootstrapSwitch();

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })

    $('.select2').select2({
      closeOnSelect: false
    })

    $('#cancel').click(function(){
      history.back();
    })

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  </script>
@endsection