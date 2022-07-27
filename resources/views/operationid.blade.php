@extends('common.com')

@section('content')
    
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Operation Employees Id</h1>
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
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email Id</th>
            <th scope="col">Contact No</th>
            <th scope="col">Image</th>
            <th scope="col" colspan="2">Operation</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->phone_no }}</td>
                <td>
                    <img src="{{ asset('image/'.$data->image) }}" class="rounded-circle" height="60px" width="60px">
                </td>
                <td>
                    <a href="{{ route('editempid',$data->id) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <button data-id="{{ $data->id }}" data-email="{{ $data->email }}" onclick="Delete(this)" class="btn btn-danger">Delete</button>
                </td>
            </tr>
          @endforeach
      </table>


@endsection