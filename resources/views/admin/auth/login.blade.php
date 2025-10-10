<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Abstack - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg bg-gradient">

            <div class="pt-5 mt-5 mb-5 account-pages">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-pattern">

                                <div class="p-4 card-body">

                                    <div class="m-auto text-center w-75">
                                        <a href="index.html">
                                            <span><img src="{{ asset('admin/assets/images/logo-dark.png')}}" alt="" height="18"></span>
                                        </a>
                                        <h5 class="mt-4 font-bold text-center text-uppercase">Sign In</h5>

                                    </div>


                                    <form method="POST" action="{{ route('admin.login') }}">
                                        @csrf

                                        <div class="mb-3 form-group">
                                            <label for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" id="email" name="email" required=""
                                             placeholder="Enter your email">
                                        </div>

                                        <div class="mb-3 form-group">
                                            <a href="pages-recoverpw.html" class="float-right text-muted"><small>Forgot your password?</small></a>

                                            <label for="password">Password</label>
                                            <input class="form-control" id="password" type="password" name="password"
                                             required="" placeholder="Enter your password">
                                        </div>


                                        <div class="mb-0 text-center form-group">
                                            <button class="btn btn-gradient btn-block" type="submit"
                                             > Log In </button>
                                        </div>

                                    </form>




                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->



                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end page -->


        <!-- Vendor js -->
        <script src="{{ asset('admin/assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/app.min.js')}}"></script>

    </body>
</html>

