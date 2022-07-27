<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cubezytech | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <script src="{{ asset('assets/js/price_range_script.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/price_range_style.css') }}" />
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('image/No BG - Black Font@4x.png') }}" alt="Cubezytech Logo"
                height="100" width="180">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link">Home</a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('logOut') }}" class="nav-link">LogOut</a>
            </li> --}}
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a href="{{ route('logOut') }}" class="nav-link">LogOut</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="brand-link">
                <img src="{{ asset('image/1318073233894641664.jpg') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Cubezytech</span>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('image/' . auth()->user()->image) }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="">
                            <h6 class="d-block" style="color: white;">{{ auth()->user()->name }}</h6>
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('lea_app') }}" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Leaving Application
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('viewdata') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    View Employee Data
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('monleav') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Monthly Leaves
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('operationemployee') }}" class="nav-link">
                                <i class="nav-icon fas fa-wrench"></i>
                                <p>
                                    Employees Id
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')


        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('assets/dist/js/pages/dashboard2.js') }}"></script>

        <!-- savan -->
        <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> --}}
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        {{-- <script src="{{ asset('assets/js/jquery-3.2.1.slim.min.js') }}"></script> --}}
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            function Delete(data) {
                // alert();
                var id = $(data).attr('data-id');
                var email = $(data).attr('data-email');
                console.log(id);
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('delempid') }}",
                                data: {
                                    'id': id,
                                    'email': email,
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function(response) {
                                    // alert(response.d);
                                    // console.log(response);
                                    location.reload();
                                }
                            });

                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
            }
        </script>

        <script>
            $('#Loading').hide();
        </script>

        <script>
            $("form#sub").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                // alert('savan');
                swal({
                        title: "Are you sure?",
                        text: "Reject This Application!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $('#Loading').show();
                            $.ajax({
                                url: "{{ route('del_app') }}",
                                type: 'POST',
                                data: formData,
                                success: function(data) {
                                    // alert(data);
                                    if (data == true) {
                                        location.reload();
                                        $('#Loading').hide();
                                    }
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });
                        } else {
                            swal("Application Doesn't Rejected!");
                        }
                    });
            });
        </script>

        <script>
            $("[id=Loadingaccept]").hide();
        </script>

        <script>
            function Accept(data) {
                // alert();
                // console.log(data);
                var id = $(data).attr('data-id');
                swal({
                        title: "Are you sure?",
                        text: "Accept This Application!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $('#Loadingaccept').show();
                            $.ajax({
                                type: "POST",
                                url: "{{ route('acceptapp') }}",
                                data: {
                                    'id': id,
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function(data) {
                                    if(data == true){
                                        location.reload();
                                        $('#Loadingaccept').hide();
                                    }
                                }
                            });
                        } else {
                            swal("Application Doesn't Accepted!");
                        }
                    });
            }
        </script>

</body>

</html>
