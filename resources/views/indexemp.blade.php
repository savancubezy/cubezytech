@extends('common.comemp')


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Welcome</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tag"></i></span>
  
            <div class="info-box-content">
              <span class="info-box-text">Total Remaining Leaves</span>
              <span class="info-box-number" style="{{ $tot < '0' ? 'color:red' : 'color:green' }}">{{ $tot }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
    </div>


    <div class="container-fluid mt-5 pt-5">
      <div class="card">
          <div class="card-header border-0 bg-dark">
              <div class="d-flex justify-content-between">
                  <h3 class="card-title">Notice Board</h3>
              </div>
          </div>
          <div class="card-body">
             @foreach ($nots as $not)
                 {{ $not->notice }}
             @endforeach
          </div>
      </div>
  </div>

@endsection
