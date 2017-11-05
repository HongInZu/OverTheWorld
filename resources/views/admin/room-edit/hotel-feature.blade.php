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
@section('content-header-sub', '新增飯店')

@section('content')
  <div class="row">    
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">聯絡人(一)</a></li>
              <li><a href="#tab_2" data-toggle="tab">聯絡人(二)</a></li>
              <li><a href="#tab_3" data-toggle="tab">會計窗口</a></li>
              <li><a href="#tab_0" data-toggle="tab">狀態設定</a></li>
              <li><a href="#tab_4" data-toggle="tab">飯店資訊</a></li>
              <li><a href="#tab_5" data-toggle="tab">飯店設定</a></li>
          <!--<li><a href="#tab_8" data-toggle="tab">取消條款</a></li>-->            
            </ul>
            <form id="hotel_setting">
            <input type="hidden" name="id" value="{{isset($id) ? $id : -1}}">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="box-body pad">
                  <!-- text input -->
                   <div class="form-group">
                    <label>部門</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-sitemap"></i>
                      </div>
                      <input type="text" name="department_1" class="form-control" value="{{ $hotel_Reposible['department_1'] or '' }}" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>聯絡人電話</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" name="phone_1" class="form-control" value="{{ $hotel_Reposible['phone_1'] or '' }}" data-inputmask='"mask": "99-9999999"' data-mask>                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label>聯絡人姓名</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="name_1" class="form-control" value="{{ $hotel_Reposible['name_1'] or '' }}" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="email" name="e-mail_1" type="hotel_registration_number" class="form-control" value="{{ $hotel_Reposible['e-mail_1'] or '' }}" placeholder="">
                    </div>                    
                  </div>
                  <div class="form-group">
                    <label>職稱</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-briefcase"></i>
                      </div>
                    <input type="text" name="job_title_1" class="form-control" value="{{ $hotel_Reposible['job_title_1'] or '' }}" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>行動電話</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-mobile-phone"></i>
                      </div>
                      <input type="text" name="mobile_phone_1" class="form-control" value="{{ $hotel_Reposible['mobile_phone_1'] or '' }}" data-inputmask='"mask": "9999-999-999"' data-mask>                    
                    </div>                    
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="box-body pad">
                  <!-- text input -->
                   <div class="form-group">
                    <label>部門</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-sitemap"></i>
                      </div>
                      <input type="text" name="department_2" class="form-control" value="{{ $hotel_Reposible['department_2'] or '' }}" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>聯絡人電話</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" name="phone_2" class="form-control" value="{{ $hotel_Reposible['phone_2'] or '' }}" data-inputmask='"mask": "99-9999999"' data-mask>                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label>聯絡人姓名</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="name_2" class="form-control" value="{{ $hotel_Reposible['name_2'] or '' }}" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="email" name="e-mail_2" type="hotel_registration_number" class="form-control" value="{{ $hotel_Reposible['e-mail_2'] or '' }}" placeholder="">
                    </div>                    
                  </div>
                  <div class="form-group">
                    <label>職稱</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-briefcase"></i>
                      </div>
                    <input type="text" name="job_title_2" class="form-control" value="{{ $hotel_Reposible['job_title_2'] or '' }}" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>行動電話</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-mobile-phone"></i>
                      </div>
                      <input type="text" name="mobile_phone_2" class="form-control" value="{{ $hotel_Reposible['mobile_phone_2'] or '' }}" data-inputmask='"mask": "9999-999-999"' data-mask>                    
                    </div>                    
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="box-body pad">
                  <!-- text input -->
                  <div class="form-group">
                    <label>會計姓名</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" name="accountant_name" class="form-control" value="{{ $hotel_Reposible['accountant_name'] or '' }}" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>會計辦公室電話</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                    <input type="text" name="accountant_phone" class="form-control" value="{{ $hotel_Reposible['accountant_phone'] or '' }}" placeholder="" data-inputmask='"mask": "99-9999999"' data-mask>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>會計行動電話</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-mobile-phone"></i>
                      </div>
                    <input type="text" name="accountant_mobile_phone" class="form-control" value="{{ $hotel_Reposible['accountant_mobile_phone'] or '' }}" placeholder="" data-inputmask='"mask": "9999-999-999"' data-mask>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>會計傳真</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-fax"></i>
                      </div>
                    <input name="accountant_fax" type="hotel_registration_number" class="form-control" value="{{ $hotel_Reposible['accountant_fax'] or '' }}" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>會計Email</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                      </div>
                    <input type="text" name="accountant_e-mail" class="form-control" value="{{ $hotel_Reposible['accountant_e-mail'] or '' }}" placeholder="">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                <div class="box-body pad">
                  <!-- text input -->
                  <div class="form-group">
                    <label>機場接送服務費</label>
                    <input type="text" name="service_charge" class="form-control" placeholder="TWD" value="{{ $hotel_Setting['service_charge'] or '' }}">
                    
                  </div>
                  <div class="form-group">
                    <label>早餐費（若房費未包含，可付費享用）</label>
                    <input type="text" name="breakfast_fee" class="form-control" placeholder="TWD" value="{{ $hotel_Setting['breakfast_fee'] or '' }}">

                  </div>
                  <div class="form-group">
                    <label>飯店距離市中心</label>
                    <input type="text" name="city_center" class="form-control" placeholder="公里數" value="{{ $hotel_Setting['breakfast_fee'] or '' }}">
                  </div>
                  <div class="form-group">
                    <label>飯店距離機場</label>
                    <input name="airport" type="hotel_registration_number" class="form-control" placeholder="公里數" value="{{ $hotel_Setting['airport'] or '' }}">
                  </div>
                  <div class="form-group">
                    <label>酒吧總數</label>
                    <input type="text" name="bar" class="form-control" placeholder="" value="{{ $hotel_Setting['bar'] or '' }}">
                  </div>
                  <div class="form-group">
                    <label>樓層總數</label>
                    <input type="text" name="floor" class="form-control" placeholder="" value="{{ $hotel_Setting['floor'] or '' }}">
                  </div>
                  <div class="form-group">
                    <label>餐廳總數</label>
                    <input type="text" name="restaurant" class="form-control" placeholder="" value="{{ $hotel_Setting['restaurant'] or '' }}">
                  </div>
                  <div class="form-group">
                    <label>客房總數</label>
                    <input type="text" name="room" class="form-control" placeholder="" value="{{ $hotel_Setting['room'] or '' }}">
                  </div>
                  <div class="form-group">
                    <label>飯店櫃臺服務時間至</label>
                    <input type="text" name="service_time" class="form-control" placeholder="" value="{{ $hotel_Setting['service_time'] or '' }}">
                  </div>
                  <div class="form-group">
                    <label>客房室內電壓</label>
                    <input type="text" name="voltage" class="form-control" placeholder="(V)" value="{{ $hotel_Setting['voltage'] or '' }}">
                  </div>
                  <div class="form-group">
                    <label>到達機場時間</label>
                    <input type="text" name="airport_time" class="form-control" placeholder="分鐘" value="{{ $hotel_Setting['airport_time'] or '' }}">
                  </div>
                  <div class="form-group">
                    <label>飯店開業年份(西元)</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="open_year" class="form-control pull-right" id="datepicker" value="{{ $hotel_Setting['open_year'] or '' }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>最近裝修年份(西元)</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="decoration_year" class="form-control pull-right" id="datepicker2" value="{{ $hotel_Setting['decoration_year'] or '' }}">
                    </div>                  
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab_0">
                <div class="box-body pad">
                  <!-- text input -->
                   <div class="form-group">
                    <label>狀態</label>
                    <select name="status" class="form-control">
                      @if (empty($hotel_Setting['status']))
                        {{ $hotel_Setting['status'] = 1}}
                      @endif
                      <option value="1" {{ ($hotel_Setting['status'] == 1) ? 'selected' : '' }}>啟用</option>
                      <option value="0" {{ ($hotel_Setting['status'] == 0) ? 'selected' : '' }}>關閉</option>
                    </select>                  
                  </div>
                  <div class="form-group">
                    <label>付款方式</label>
                    <select class="form-control select2" multiple="multiple" name="payment_method[]"
                            style="width: 100%;">
                        @if (empty($hotel_Setting['payment_method']))
                          {{ $hotel_Setting['payment_method'] = ''}}
                        @endif
                        <option value="0">品味券</option>
                        <option value="1">點數</option>
                    </select>                   
                  </div>
                  <div class="form-group">
                    <label>類型</label>
                    <select class="form-control select2" multiple="multiple" name="type[]"
                            style="width: 100%;">
                        @if (empty($hotel_Setting['type']))
                          {{ $hotel_Setting['type'] = ''}}
                        @endif
                        <option value="0">Hotel</option>
                        <option value="1">Motel</option>
                        <option value="2">溫泉飯店</option>
                        <option value="3">民宿</option>
                        <option value="4">Villa</option>
                        <option value="5">小木屋</option>
                        <option value="6">休閒渡假村</option>
                    </select>                  
                  </div>
                  <div class="form-group">
                    <label>星級</label>
                    <select name="star" class="form-control">
                      @if (empty($hotel_Setting['star']))
                        {{ $hotel_Setting['star'] = 1}}
                      @endif
                      <option value="-1" {{ ($hotel_Setting['star'] == -1) ? 'selected' : '' }}>未評分</option>
                      <option value="1" {{ ($hotel_Setting['star'] == 1) ? 'selected' : '' }}>1 星</option>
                      <option value="2" {{ ($hotel_Setting['star'] == 2) ? 'selected' : '' }}>2 星</option>
                      <option value="3" {{ ($hotel_Setting['star'] == 3) ? 'selected' : '' }}>3 星</option>
                      <option value="4" {{ ($hotel_Setting['star'] == 4) ? 'selected' : '' }}>4 星</option>
                      <option value="5" {{ ($hotel_Setting['star'] == 5) ? 'selected' : '' }}>5 星</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>行動電話</label>
                    <input type="text" name="mobile" class="form-control" placeholder="" value="{{ $hotel_Setting['mobile'] or '' }}">
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_5">
                <div class="box-body pad">
                  <!-- text input -->
                  <div class="form-group">
                    <label>特殊需求</label>
                    @if (empty($hotel_Setting['need']))
                      {{ $hotel_Setting['need'] = ''}}
                    @endif
                    <select class="form-control select2" multiple="multiple" name="need[]"
                            style="width: 100%;">
                      @foreach($needs as $key => $need)
                        <option value="{{$key}}">{{ $need->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                    <label>設施及服務</label>
                    @if (empty($hotel_Setting['facility']))
                      {{ $hotel_Setting['facility'] = ''}}
                    @endif
                    <select class="form-control select2" multiple="multiple" name="facility[]"
                            style="width: 100%;">
                      @foreach($facility as $key => $value)
                        <option value="{{$key}}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                    <label>客房網路</label>
                    @if (empty($hotel_Setting['network']))
                      {{ $hotel_Setting['network'] = ''}}
                    @endif
                    <select class="form-control select2" multiple="multiple" name="network[]"
                            style="width: 100%;">
                      @foreach($network as $key => $value)
                        <option value="{{$key}}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>  
                  <!-- text input -->
                  <div class="form-group">
                    <label>停車服務</label>
                    @if (empty($hotel_Setting['parking']))
                      {{ $hotel_Setting['parking'] = ''}}
                    @endif
                    <select class="form-control select2" multiple="multiple" name="parking[]"
                            style="width: 100%;">
                      @foreach($parking as $key => $value)
                        <option value="{{$key}}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>                
                  <!-- text input -->
                  <div class="form-group">
                    <label>運動、休閒設施</label>
                    @if (empty($hotel_Setting['leisure']))
                      {{ $hotel_Setting['leisure'] = ''}}
                    @endif
                    <select class="form-control select2" multiple="multiple" name="leisure[]"
                            style="width: 100%;">
                      @foreach($leisure as $key => $value)
                        <option value="{{$key}}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>  
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
                  <!-- text input -->
                  <div class="form-group">
                    <label>假期</label>
                    @if (empty($hotel_Setting['holiday']))
                      {{ $hotel_Setting['holiday'] = ''}}
                    @endif
                    <select class="form-control select2" multiple="multiple" name="holiday[]"
                            style="width: 100%;">
                      @foreach($holiday as $key => $value)
                        <option value="{{$key}}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>  
                  <!-- text input -->
                  <div class="form-group">
                    <label>飯店條款</label>
                    @if (empty($hotel_Setting['terms']))
                      {{ $hotel_Setting['terms'] = ''}}
                    @endif
                    <select class="form-control select2" multiple="multiple" name="terms[]"
                            style="width: 100%;">
                      @foreach($terms as $key => $value)
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
    $('[data-mask]').inputmask()

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

    $("[name='need[]']").val({!! $hotel_Setting['need'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='facility[]']").val({!! $hotel_Setting['facility'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='network[]']").val({!! $hotel_Setting['network'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='parking[]']").val({!! $hotel_Setting['parking'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='leisure[]']").val({!! $hotel_Setting['leisure'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='equipment[]']").val({!! $hotel_Setting['equipment'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='hardware[]']").val({!! $hotel_Setting['hardware'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='bathroom[]']").val({!! $hotel_Setting['bathroom'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='service[]']").val({!! $hotel_Setting['service'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='holiday[]']").val({!! $hotel_Setting['holiday'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='terms[]']").val({!! $hotel_Setting['terms'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='payment_method[]']").val({!! $hotel_Setting['payment_method'] !!}).select2({
      closeOnSelect: false
    })
    $("[name='type[]']").val({!! $hotel_Setting['type'] !!}).select2({
      closeOnSelect: false
    })

  </script>
@endsection