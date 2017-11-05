@extends('layout.admin')

@section('style')
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

  <link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/dist/css/basic.css">

  <link rel="stylesheet" href="/dist/css/dropzone.css">
  <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
  <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

  <link href="https://unpkg.com/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">預測分析</h4>
            </div>
              
              <form id='game_predict_form'>
              <input type="hidden" name="game_predict_id">

              <div class="col-md-12">

              <div class="form-group  col-md-6">
                  <label>比賽分析</label>
                  <div class="controls">
                      <div class="switch" tabindex="0">
                        <input type="checkbox" name="game_predict_status" value=""/>                    
                      </div>
                  </div>
              </div>

              <div class="form-group  col-md-6">
                  <label>比賽結束</label>
                  <div class="controls">
                      <div class="switch" tabindex="0">
                        <input type="checkbox" name="game_over" value=""/>                    
                      </div>
                  </div>
              </div>

              <div class="form-group col-md-6">
                <label>讓方比數</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-balance-scale"></i>
                  </span>
                  <input type="number" class="form-control" name="game_bigger_score" placeholder="">
                </div>
              </div>

              <div class="form-group col-md-6">
                <label>受讓方比數</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-balance-scale"></i>
                  </span>
                  <input type="number" class="form-control" name="game_smaller_score" placeholder="">
                </div>
              </div>
            <!-- text input -->
            <div class="form-group col-md-6">
              <label>精準預測</label>
              <!-- radio -->
              <div class="form-group">
                <label>
                  <input type="radio" name="game_predict" class="minimal game_predict" value="0">
                  讓方
                </label>
                <label>
                  <input type="radio" name="game_predict" class="minimal game_predict" value="1">
                  受讓方
                </label>
              </div>
            </div>

            <div class="form-group col-md-6">
              <label>賽事結果</label>
              <div class="form-group">
                <label>
                  <input type="radio" name="game_result" class="minimal game_result" value="0">
                  讓方
                </label>
                <label>
                  <input type="radio" name="game_result" class="minimal game_result" value="1">
                  受讓方
                </label>
              </div>
            </div>
              </div>
              </form>

            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">關閉</button>
              <button type="button" id="save-game-predict" class="btn btn-primary">儲存變更</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

@section('script')
  <!-- jQuery 3 -->
  <script src="/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/dist/js/demo.js"></script>
  <script src="/dist/js/highlight.js"></script>
  <script src="/dist/js/bootstrap-switch.min.js"></script>
  <script src="/bower_components/datatables.net/js/dataTables.buttons.min.js"></script>
  <script src="/bower_components/datatables.net/js/jszip.min.js"></script>
  <script src="/bower_components/datatables.net/js/buttons.html5.min.js"></script>
  <script src="/dist/js/dropzone.js"></script>
  <script src="/dist/js/dropzone-amd-module.js"></script>
  <!-- page script -->
  <script>

    $(function () {
      $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: '新增商品',
                action: function ( e, dt, node, config ) {
                    window.location.href = "/admin/edit-@yield('edit-type')/@yield('method-type')"
                }
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            }
        ]
      } );

      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })

  $("#save-game-predict").click(function() {
    $.ajax({
        type: "post",
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        data: $('#game_predict_form').serialize(),
        url: "/admin/manage/save-game-predict",
        dataType: "json",
        success: function(data) {
            alert("儲存成功");
        },
        error: function(jqXHR) {
            alert("發生錯誤, 請重新操作");
        }
    })
  })

  $(".game_predict_button").click(function() {
      $.ajax({
          type: "post",
          headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
          data: {id: $(this).siblings("#game_id").val()},
          url: "/admin/manage/predict-status",
          dataType: "json",
          success: function(data) {
              changePredictForm(data)
              changeChecked()
              changeRadio($("[name=game_predict]"), data.game_predict)
              changeRadio($("[name=game_result]"), data.game_result)
          },
          error: function(jqXHR) {
              alert("發生錯誤, 請重新操作");
          }
      })
  })

  $("[name='game_predict_status']").on('switchChange.bootstrapSwitch', function(e) {
    if($(this).is(':checked')) {
      $(this).val(1);
    } else {
      $(this).val(0);
    }
  })

  $("[name='game_over']").on('switchChange.bootstrapSwitch', function(e) {
    if($(this).is(':checked')) {
      $(this).val(1);
    } else {
      $(this).val(0);
    }
  })

  function changeChecked() 
  {
    if ($("[name='game_predict_status']").val() == 1) {
      $("[name='game_predict_status']").bootstrapSwitch('state',true);
    } else {
      $("[name='game_predict_status']").bootstrapSwitch('state',false);
    }
    if ($("[name='game_over']").val() == 1) {
      $("[name='game_over']").bootstrapSwitch('state',true);
    } else {
      $("[name='game_over']").bootstrapSwitch('state',false);
    }

    if($("[name='game_predict']").val() == 1) {

    }
  }

  function changeRadio(radio, val) {
      radio.filter("[value=" + val + ']').prop('checked', true);
  }
  function changePredictForm(data) {
    $("[name='game_predict_status']").val(data.game_predict_status);
    $("[name='game_over']").val(data.game_over);
    $("[name='game_bigger_score']").val(data.game_bigger_score);
    $("[name='game_smaller_score']").val(data.game_smaller_score);
  }

  </script>
@endsection