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
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="/bower_components/iCheck/all.css">
  <link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">  
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection

@section('content-header', '飯店管理')
@section('content-header-sub', '新增房型')

@section('content')
  <div class="row">    
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">房型資訊</a></li>
              <li><a href="#tab_5" data-toggle="tab">房型設定</a></li>
          <!--<li><a href="#tab_8" data-toggle="tab">取消條款</a></li>-->            
            </ul>
            <form id="hotel_setting">
            <input type="hidden" name="id" value="{{isset($id) ? $id : -1}}">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <div class="box-body">
                <h4 class="box-title">房型名稱</h4>
                <!-- text input -->
                <div class="form-group col-md-4">
                  <input type="text" name="name_zh-tw" class="form-control" value="{{ $item['name_zh-tw'] or '' }}" placeholder="繁體">
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="name_zh-cn" class="form-control" value="{{ $item['name_zh-cn'] or '' }}" placeholder="簡體">
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="name_en" class="form-control" value="{{ $item['name_en'] or '' }}" placeholder="英文">
                </div>
              </div>

              <div class="box-body">
                <h4 class="box-title">房型價錢</h4>
                <!-- text input -->
                <div class="form-group col-md-4">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="原價">
                </div>
                <div class="form-group col-md-4">
                  <input name="point" type="text" class="form-control" value="{{ $item['point'] or '' }}" placeholder="點數">
                </div>
                <div class="form-group col-md-4">
                  <input name="thrift" type="text" class="form-control" value="{{ $item['thrift'] or '' }}" placeholder="票券">
                </div>
              </div>

              <div class="box-body">
                <h4 class="box-title">房型相關</h4>
                <!-- text input -->
                <div class="form-group col-md-4">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="房型代碼">
                </div>
                <div class="form-group col-md-4">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="面積坪數">
                </div>
                <div class="form-group col-md-4">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="後台備註">
                </div>
              </div>


              <hr>
              <div class="box-body">
                <!-- text input -->
                <div class="form-group col-md-4">
                  <label>可住人數</label>
                  <select name="status" class="form-control">
                    @if (empty($item['status']))
                      {{ $item['status'] = 1}}
                    @endif
                    @for ($i = 0; $i <= 50; $i++)
                      <option value="{{$i}}" {{ ($item['status'] == $i) ? 'selected' : '' }}>{{$i}}人</option>
                    @endfor
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>自動關房天數</label>
                  <select name="star" class="form-control">
                    @if (empty($item['star']))
                      {{ $item['star'] = -1}}
                    @endif
                    @for ($i = 0; $i <= 31; $i++)
                      <option value="{{$i}}" {{ ($item['status'] == $i) ? 'selected' : '' }}>{{$i}}天前</option>
                    @endfor
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>是否含早餐</label>
                  <select name="star" class="form-control">
                    @if (empty($item['star']))
                      {{ $item['star'] = -1}}
                    @endif
                    <option value="1" {{ ($item['status'] == $i) ? 'selected' : '' }}>含早餐</option>
                    <option value="0" {{ ($item['status'] == $i) ? 'selected' : '' }}>不含早餐</option>
                  </select>
                </div>

                <!-- text input -->
                <div class="form-group col-md-4">
                  <label>單人床</label>
                  <select name="star" class="form-control">
                  @if (empty($item['star']))
                    {{ $item['star'] = -1}}
                  @endif
                  @for ($i = 0; $i <= 10; $i++)
                    <option value="{{$i}}" {{ ($item['status'] == $i) ? 'selected' : '' }}>{{$i}}床</option>
                  @endfor
                  </select>                    
                </div>
                <div class="form-group col-md-4">
                  <label>雙人床</label>
                  <select name="star" class="form-control">
                  @if (empty($item['star']))
                    {{ $item['star'] = -1}}
                  @endif
                  @for ($i = 0; $i <= 10; $i++)
                    <option value="{{$i}}" {{ ($item['status'] == $i) ? 'selected' : '' }}>{{$i}}床</option>
                  @endfor
                  </select>                    
                </div>
                <div class="form-group col-md-4">
                  <label>加大雙人床</label>
                  <select name="star" class="form-control">
                  @if (empty($item['star']))
                    {{ $item['star'] = -1}}
                  @endif
                  @for ($i = 0; $i <= 10; $i++)
                    <option value="{{$i}}" {{ ($item['status'] == $i) ? 'selected' : '' }}>{{$i}}床</option>
                  @endfor
                  </select>                    
                </div>
                <div class="form-group col-md-4">
                  <label>通鋪</label>
                  <select name="star" class="form-control">
                  @if (empty($item['star']))
                    {{ $item['star'] = -1}}
                  @endif
                  @for ($i = 0; $i <= 10; $i++)
                    <option value="{{$i}}" {{ ($item['status'] == $i) ? 'selected' : '' }}>{{$i}}床</option>
                  @endfor
                  </select>                    
                </div>
                <div class="form-group col-md-4">
                  <label>圓床</label>
                  <select name="star" class="form-control">
                  @if (empty($item['star']))
                    {{ $item['star'] = -1}}
                  @endif
                  @for ($i = 0; $i <= 10; $i++)
                    <option value="{{$i}}" {{ ($item['status'] == $i) ? 'selected' : '' }}>{{$i}}床</option>
                  @endfor
                  </select>                    
                </div>
              </div>
              <hr>

              <div class="box-body">
                <h4 class="box-title">加床設定</h4>
                <!-- text input -->
                <div class="form-group col-md-3">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="單人床價錢">
                </div>
                <div class="form-group col-md-3">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="單人墊價錢">
                </div>
                <div class="form-group col-md-3">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="雙人床價錢">
                </div>
                <div class="form-group col-md-3">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="雙人墊價錢">
                </div>
              </div>

              <div class="box-body">
                <h4 class="box-title">加人設定</h4>
                <!-- text input -->
                <div class="form-group col-md-3">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="成人價錢">
                </div>
                <div class="form-group col-md-3">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="成人上限數量">
                </div>
                <div class="form-group col-md-3">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="孩童價錢">
                </div>
                <div class="form-group col-md-3">
                  <input name="price" type="text" class="form-control" value="{{ $item['price'] or '' }}" placeholder="孩童上限數量">
                </div>
              </div>

              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_5">
                <div class="box-body pad">         
                  <!-- text input -->
                  <div class="form-group">
                    <label>設備</label>
                    @if (empty($hotel_Setting['equipment']))
                      {{ $hotel_Setting['equipment'] = ''}}
                    @endif
                    <select class="form-control select2" multiple="multiple" name="equipment[]"
                            style="width: 100%;">
                      @foreach($equipment as $key => $value)
                        <option value="{{$key}}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>  
                  <!-- text input -->
                  <div class="form-group">
                    <label>硬體</label>
                    @if (empty($hotel_Setting['hardware']))
                      {{ $hotel_Setting['hardware'] = ''}}
                    @endif
                    <select class="form-control select2" multiple="multiple" name="hardware[]"
                            style="width: 100%;">
                      @foreach($hardware as $key => $value)
                        <option value="{{$key}}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>  
                  <!-- text input -->
                  <div class="form-group">
                    <label>衛浴</label>
                    @if (empty($hotel_Setting['bathroom']))
                      {{ $hotel_Setting['bathroom'] = ''}}
                    @endif
                    <select class="form-control select2" multiple="multiple" name="bathroom[]"
                            style="width: 100%;">
                      @foreach($bathroom as $key => $value)
                        <option value="{{$key}}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>  
                  <!-- text input -->
                  <div class="form-group">
                    <label>客房服務</label>
                    @if (empty($hotel_Setting['service']))
                      {{ $hotel_Setting['service'] = ''}}
                    @endif
                    <select class="form-control select2" multiple="multiple" name="service[]"
                            style="width: 100%;">
                      @foreach($service as $key => $value)
                        <option value="{{$key}}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>   
                </div>
              </div>
              <div class="tab-pane" id="tab_8">
                <div class="box-body pad">
                    <!-- text input -->
                    <div class="form-group">
                      <label>取消條款</label><br>
                      <input type="checkbox" class="minimal" checked>【若訂房後無告知取消，或當日無故未去住房，則視同住宿。天災或非人為不可抗拒之因素外，相關規定依各家飯店公告為主。】
                    </div>
                </div>
              </div>
            </div>
            </form>
            <!-- /.tab-content -->
            <div class="box-footer">
              <button type="button" id="cancel" class="btn btn-default">取消</button>
              <button type="button" id="save" class="btn btn-info pull-right">儲存變更</button>
            </div>
          </div>
          <!-- nav-tabs-custom -->
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
  <!-- bootstrap datepicker -->
  <script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
  <script src="/bower_components/iCheck/icheck.min.js"></script>
  <!-- Select2 -->
  <script src="/bower_components/select2/dist/js/select2.full.min.js"></script>

  <!-- InputMask -->
  <script src="/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script>

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

    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    $("#save").click(function() {
        $.ajax({
            type: "post",
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            url: "/admin/edit-hotel/save-setting",
            data: $('#hotel_setting').serialize(),
            dataType: "json",
            success: function(data) {
                alert('儲存成功');
                console.log(data);
            },
            error: function(jqXHR) {
                console.log('儲存飯店資訊失敗');
            }
        })
    })

    $("[name='hardware[]']").val({!! $hotel_Setting['hardware'] !!}).select2()
    $("[name='bathroom[]']").val({!! $hotel_Setting['bathroom'] !!}).select2()
    $("[name='service[]']").val({!! $hotel_Setting['service'] !!}).select2()

  </script>
@endsection