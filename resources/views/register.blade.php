<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cubeytech | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition register-page">
    @if (session()->has('SUCCESS'))
        <p class="alert alert-success">{{ session()->get('SUCCESS') }}</p>
    @endif

    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Cubezytech</b></a>
            </div>
            <div class="card-body">
                <form action="{{ route('reg_sub') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ isset($editdata) ? $editdata->id : '0' }}">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full Name" name="name"
                            value="{{ isset($editdata) ? $editdata->name : old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('name')
                        <p style="color: red;font-size:13px">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ isset($editdata) ? $editdata->email : old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="user type" name="user_type" value="">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                        </div> --}}
                    @error('email')
                        <p style="color: red;font-size:13px">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            value="{{ isset($editdata) ? $editdata->password : old('password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <p style="color: red;font-size:13px">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Phone No" name="phone_no"
                            value="{{ isset($editdata) ? $editdata->phone_no : old('phone_no') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    @error('phone_no')
                        <p style="color: red;font-size:13px">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="image">
                        <input type="hidden" class="form-control" name="image"
                            value="{{ isset($editdata) ? $editdata->image : old('image') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-image"></span>
                            </div>
                        </div>
                    </div>
                    @if (isset($editdata))
                        <img src="{{ asset('image/' . $editdata->image) }}" height="40px" width="40px">
                    @endif
                    @error('image')
                        <p style="color: red;font-size:13px">{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
