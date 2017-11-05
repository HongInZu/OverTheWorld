@extends('layout.admin')

@section('style')
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">


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

@section('content-header', '控房管理')
@section('content-header-sub', 'Control panel')


@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>

      <a data-toggle="modal" data-target="#modal-default" id="point-selector" ></a>

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">自訂房價</h4>
            </div>
              
              <form id='special_day'>
              <input type="hidden" name="hotel_id" value="{{ $hotel_id or ''}}">
              <input type="hidden" name="date" id="date-value" value="">

              <div class="col-md-12">
                <div class="form-group">
                  <label>日期</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" disabled class="form-control" id="date-pick" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                  <label>自訂標題</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-pencil-square-o"></i>
                    </div>
                    <input type="text" name="title" id="title" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label>自訂原價</label>
                  <div class="input-group">
                    <span class="input-group-addon">$</span>  
                    <input type="number" name="price" id="price" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label>自訂成本</label>
                  <div class="input-group">
                    <span class="input-group-addon">$</span>  
                    <input type="number" name="cost" id="cost" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label>自訂點數</label>
                  <div class="input-group">
                    <span class="input-group-addon">$</span>  
                    <input type="number" name="point" id="point" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label>自訂房數</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa  fa-building-o"></i>
                    </div>
                    <input type="number" name="room_count" id="room_count" class="form-control" placeholder="">
                  </div>
                </div>
              </div>
              </form>

            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">關閉</button>
              <button type="button" id="save-point-change" class="btn btn-primary">儲存變更</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
  
    <!-- jQuery 3 -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Slimscroll -->
    <script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
    <!-- fullCalendar -->
    <script src="/bower_components/moment/moment.js"></script>
    <script src="/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <!-- Page specific script -->
    <script>
      $(function () {
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          dayClick: function(date, jsEvent, view) {
              pointSelector(date.format());
              // alert('Clicked on: ' + date.format());

              // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

              // alert('Current view: ' + view.name);

              // // change the day's background color just for fun
              // $(this).css('background-color', 'red');
          },
          navLinks: true, // can click day/week names to navigate views
          selectable: true,
          selectHelper: true,
          editable: true,
          eventLimit: true, // allow "more" link when too many events
          events: [
          @foreach($days as $day)
            {
              title: '{{ (!empty($day['title'])) ? '標題:'.$day['title'] : '沒有標題' }}',
              start: '{{ $day['date'] }}',
            },
            {
              title: '{{ (!empty($day['price'])) ? '原價:'.$day['price'] : '沒有輸入原價' }}',
              start: '{{ $day['date'] }}',
            },
            {
              title: '{{ (!empty($day['cost'])) ? '成本:'.$day['cost'] : '沒有輸入成本' }}',
              start: '{{ $day['date'] }}',
            },
            {
              title: '{{ (!empty($day['point'])) ? '點數:'.$day['point'] : '沒有輸入點數' }}',
              start: '{{ $day['date'] }}',
            },
            {
              title: '{{ (!empty($day['room_count'])) ? '房數:'.$day['room_count'] : '沒有輸入房數' }}',
              start: '{{ $day['date'] }}',
            },
          @endforeach
          ]
        });
      })

      function pointSelector(date) {
        $('#date-pick').val(date);
        $('#date-value').val(date);

        $('#title').val();
        $('#price').val();
        $('#cost').val();
        $('#point').val();
        $('#room_count').val();

        $("#point-selector").trigger("click");
      }

      $("#save-point-change").click(function() {
          $.ajax({
              type: "post",
              headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
              data: $('#special_day').serialize(),
              url: "/admin/edit-hotel/save-special-day",
              dataType: "json",
              success: function(data) {
                  alert("儲存成功");
              },
              error: function(jqXHR) {
                  alert("發生錯誤, 請重新操作");
              }
          })

          if ($('#title').val().length == 0) {
            title = '沒有設定標題'
          } else {
            title = $('#title').val()
          }
          var events = {
                title: title,
                start: $('#date-value').val(),
                end: $('#date-value').val()
              };
          $('#calendar').fullCalendar('renderEvent', events, true);
      })

    </script>
@endsection