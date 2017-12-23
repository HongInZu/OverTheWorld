@extends('layout.admin')

@section('style')
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">  

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
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

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
@yield('modal')
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
  <script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
  <script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- page script -->
  <script>

    $(function () {

      $('#legend').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: '新增商品',
                action: function ( e, dt, node, config ) {
                    window.location.href = "/admin/add/legend"
                }
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            }
        ]
      } );

      $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: '新增會員',
                action: function ( e, dt, node, config ) {
                    window.location.href = "/admin/edit-user/user"
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
            location.reload();
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
              $('[name=game_predict_id]').val(data.id)
          },
          error: function(jqXHR) {
              alert("發生錯誤, 請重新操作");
          }
      })
  })

  $("#save-game-bigandsmall").click(function() {
    $.ajax({
        type: "post",
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        data: $('#game_bigandsmall_form').serialize(),
        url: "/admin/manage/save-game-big-and-small",
        dataType: "json",
        success: function(data) {
            alert("儲存成功");
            location.reload();
        },
        error: function(jqXHR) {
            alert("發生錯誤, 請重新操作");
        }
    })
  })

  $(".game_bigandsmall_button").click(function() {
      $.ajax({
          type: "post",
          headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
          data: {id: $(this).siblings("#game_id").val()},
          url: "/admin/manage/big-and-small-status",
          dataType: "json",
          success: function(data) {
              changePredictForm(data)
              changeChecked()
              changeRadio($("[name=game_predict]"), data.game_predict)
              changeRadio($("[name=game_result]"), data.game_result)
              $('[name=game_bigandsmall_id]').val(data.id)
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

  //Date picker
  $('#datepicker').datepicker({
    autoclose: true
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

  $(".user_permission_button").click(function() {
      $.ajax({
          type: "post",
          headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
          data: {id: $(this).siblings("#user_id").val()},
          url: "/admin/manage/user-permission",
          dataType: "json",
          success: function(data) {
              $('[name=user_type] option[value=' + data.user_type + ']').prop('selected', true)
              $('[name=until_date]').val(data.until_date)
              $('[name=user_id]').val(data.id)
          },
          error: function(jqXHR) {
              alert("發生錯誤, 請重新操作");
          }
      })
  })

  $("#save-user-permission").click(function() {
    $.ajax({
        type: "post",
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        data: $('#user_permission_form').serialize(),
        url: "/admin/manage/save-user-permission",
        dataType: "json",
        success: function(data) {
            alert("儲存成功");
            location.reload();
        },
        error: function(jqXHR) {
            alert("發生錯誤, 請重新操作");
        }
    })
  })

  </script>
@endsection