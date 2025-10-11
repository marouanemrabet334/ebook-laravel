<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Ebook Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- Plugins css -->

    <link href="{{ asset('admin/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />


   
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>



    <!-- Jquery Toast css -->
    <link href="{{ asset('admin/assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />


</head>

<body>

    <div id="wrapper">

        @include('admin.body.header')


        @include('admin.body.sidebar')


        <div class="content-page">
            <div class="content">

                @yield('content')
            </div>


            @include('admin.body.footer')

        </div>

    </div>


    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h5 class="m-0 text-white">Settings</h5>
        </div>
        <div class="slimscroll-menu">
            <hr class="mt-0">
            <h5 class="pl-3">Basic Settings</h5>
            <hr class="mb-0" />


            <div class="p-3">
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                    <label class="custom-control-label" for="customCheck1">Notifications</label>
                </div>
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                    <label class="custom-control-label" for="customCheck2">API Access</label>
                </div>
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                    <label class="custom-control-label" for="customCheck3">Auto Updates</label>
                </div>
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck4" checked>
                    <label class="custom-control-label" for="customCheck4">Online Status</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                    <label class="custom-control-label" for="customCheck5">Auto Payout</label>
                </div>
            </div>

            <!-- Messages -->
            <hr class="mt-0" />
            <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">24</span></h5>
            <hr class="mb-0" />
            <div class="p-3">
                <div class="inbox-widget">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg" class="rounded-circle"
                                alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);">Chadengle</a></p>
                        <p class="inbox-item-text">Hey! there I'm available...</p>
                        <p class="inbox-item-date">13:40 PM</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle"
                                alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);">Tomaslau</a></p>
                        <p class="inbox-item-text">I've finished it! See you so...</p>
                        <p class="inbox-item-date">13:34 PM</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg"
                                class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);">Stillnotdavid</a></p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                        <p class="inbox-item-date">13:17 PM</p>
                    </div>

                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg"
                                class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);">Kurafire</a></p>
                        <p class="inbox-item-text">Nice to meet you</p>
                        <p class="inbox-item-date">12:20 PM</p>

                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg"
                                class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);">Shahedk</a></p>
                        <p class="inbox-item-text">Hey! there I'm available...</p>
                        <p class="inbox-item-date">10:15 AM</p>

                    </div>
                </div> <!-- end inbox-widget -->
            </div> <!-- end .p-3-->

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('admin/assets/libs/chart-js/Chart.bundle.min.js') }}"></script>

    <!-- Init js -->
    <script src="{{ asset('admin/assets/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>


    <script src="{{ asset('admin/assets/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>

    <!-- Init js-->
    <script src="{{ asset('admin/assets/js/pages/form-advanced.init.js') }}"></script>


    {{-- {{ asset('admin/') }} --}}
    <!-- Required datatable js -->
    <script src="{{ asset('admin/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('admin/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- Buttons examples -->
    <script src="{{ asset('admin/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/buttons.print.min.js') }}"></script>

    <!-- Datatables init -->
    <script src="{{ asset('admin/assets/js/pages/datatables.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/select2/select2.min.js') }}"></script>


    <!-- Tost-->
    <script src="{{ asset('public/admin/assets/libs/jquery-toast/jquery.toast.min.js') }}"></script>

    <!-- toastr init js-->
    <script src="{{ asset('admin/assets/js/pages/toastr.init.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#summernote").summernote({
                height: 300,
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#summernote_2").summernote({
                height: 200,
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    $.toast({
                        heading: "Heads up!",
                        text: "{{ Session::get('message') }}",
                        position: "top-right",
                        loaderBg: "#3b98b5",
                        icon: "info",
                        hideAfter: 3e3,
                        stack: 1
                    });
                    break;
                case 'success':
                    $.toast({
                        heading: "Well done!",
                        text: " {{ Session::get('message') }}",
                        position: "top-right",
                        loaderBg: "#5ba035",
                        icon: "success",
                        hideAfter: 3e3,
                        stack: 1
                    });
                    break;
                case 'warning':
                    $.toast({
                        heading: "Holy guacamole!",
                        text: "{{ Session::get('message') }}",
                        position: "top-right",
                        loaderBg: "#da8609",
                        icon: "warning",
                        hideAfter: 3e3,
                        stack: 1
                    });
                    break;
                case 'error':

                    $.toast({
                        heading: "Oh snap!",
                        text: "{{ Session::get('message') }}",
                        position: "top-right",
                        loaderBg: "#bf441d",
                        icon: "error",
                        hideAfter: 3e3,
                        stack: 1
                    });
                    break;
            }
        @endif
    </script>

 <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>

</body>

</html>
