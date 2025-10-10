@extends('admin.admin_master')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Advanced</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Form Advanced</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title">Bootstrap MaxLength</h4>

                    <div class="row">
                        <div class="col-md-6">



                               
                                        <div class="demo-box">
                                            <form action="{{ route('store.file') }}" method="post" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <p>File style with custom icon</p>
                                                    <input type="file" name="filenames[]" multiple="" class="filestyle"
                                                        id="filestyleicon">
                                                </div>
                                                <button type="submit">Submit</button>
                                            </form>
                                        </div>



                        </div>


                    </div>
                    <!-- end row -->
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>



    </div>


    </div>
@endsection
