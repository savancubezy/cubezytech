@extends('common.com')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Employees Data</h1>
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
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Total Remaining Leaves</th>
                    <th>Leaves Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone_no }}</td>
                        <td>{{ $value->total_leaves }}</td>
                        <td>
                            <a href="{{ route('viewmore', $value->id) }}" class="btn btn-dark">View Leaves..!</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <div class="card-body p-0">
            <ul class="users-list clearfix">
                @foreach ($data as $key => $value)
                    <li>
                        <img src="{{ asset('image/' . $value->image) }}" alt="User Image" height="80px" width="80px">
                        <h6>{{ $value->name }}</h6>
                        <a href="" class="users-list-name" data-toggle="modal" data-target="#exampleModal">View Profile</a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $value->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th>Email Id</th>
                                              <th>Contact No</th>
                                              <th>Remaining Leave</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>{{ $value->email }}</td>
                                              <td>{{ $value->phone_no }}</td>
                                              <td>{{ $value->total_leaves }}</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <a href="{{ route('viewmore', $value->id) }}" class="btn btn-dark">View Leaves..!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <!-- /.users-list -->
        </div> --}}
    @endsection
