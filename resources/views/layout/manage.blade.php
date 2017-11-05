@extends('layout.table')

@section('content')
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">@yield('content-header')-列表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
					       @yield('content-table')
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection