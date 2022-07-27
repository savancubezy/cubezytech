@extends('common.com')

@section('content')
    
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Leave Application</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (session()->has('SUCCESS'))
        <p class="alert alert-success">{{ session()->get('SUCCESS') }}</p>
    @endif

    <table class="table">
        <thead>
          <tr>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Day</th>
                <th>Date From</th>
                <th>Date To</th>
                <th>Total Days</th>
                <th>Reason</th>
                <th colspan="2">Operation</th>
            </tr>
          </tr>
        </thead>
        <tbody>
          @foreach ($apps as $key => $app)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $app->name }}</td>
                <td>{{ $app->email }}</td>
                <td>{{ $app->day }}</td>
                {{-- <td>{{ $app->from }}</td> --}}
                <td>{{ date('d-m-Y', strtotime($app->from)) }}</td>
                {{-- <td>{{ $app->to }}</td> --}}
                <td>{{ date('d-m-Y', strtotime($app->to)) }}</td>
                <td>{{ $app->total_days }}</td>
                <td>{{ $app->reason }}</td>
                <td>
                    {{-- <a href="{{ route('del_app',$app->id) }}" class="btn btn-danger">Reject</a> --}}
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectmodal">
                      Reject
                    </button>
                </td>
                <td>
                    {{-- <a href="{{ route('acceptapp',$app->id) }}" class="btn btn-primary">Accept</a>   --}}
                    <button class="btn btn-primary" data-id="{{ $app->id }}" onclick="Accept(this)">Accept<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="Loadingaccept"></button>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>


      <!-- Modal -->
      <div class="modal fade" id="rejectmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enter The Reason Of Application Reject</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body form-group">
              <form id="sub">
                @csrf
                <input type="hidden" name="id" value="{{ isset($app->id) ? $app->id : '' }}">
                <input type="text" name="rejectreason" value="" class="form-control" placeholder="Please Enter The Application Reject Reason">
                <br>
                {{-- <input type="submit" name="submit" value="Reject" class="btn btn-danger"> --}}
                <button type="submit" class="btn btn-danger">Reject<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="Loading"></button>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection