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

@section('content-header', '大小分')
@section('content-header-sub', '球盤分析')

@section('content')
  <div class="row">
    <form role="form" action="/admin/edit-ball/todb" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="id" value="{{ $game['id'] or '-1' }}">
      <input type="hidden" name="game_type" value="{{ $legend['code'] }}">
      <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">開盤資訊 - {{ $legend['name'] }}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <!-- text input -->
              <div class="form-group">
                <label>主隊</label>
                <input type="text" class="form-control" name="bigger" placeholder="讓方" value="{{$game['bigger'] or ''}}" required>
              </div>
              <div class="form-group">
                <label>客隊</label>
                <input type="text" class="form-control" name="smaller" placeholder="受讓方" value="{{$game['smaller'] or ''}}" required>
              </div>

              <div class="form-group">
                <label>球賽日期</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="game_date" value="{{$game['game_date'] or ''}}" id="datepicker" required>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>盤口</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="handicap" value="{{$game['handicap'] or ''}}" placeholder="勾選為平盤. Ex. 1-12 or 2+11" required>
                </div>
              </div>
            <div class="box-footer">
              <button type="button" id="cancel" class="btn btn-default">取消</button>
              <button type="submit" class="btn btn-info pull-right">提交</button>
            </div>

            </form>
          </div>
          <!-- /.box-body -->
        </div>
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