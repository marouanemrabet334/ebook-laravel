@extends('admin.admin_master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @php
            $categories = App\Models\Admin\Category::latest()->get();
            //var_dump($categories);
            $authors = App\Models\Admin\Author::latest()->get();

            $ebooks = App\Models\Admin\Ebook::latest()->get();


        @endphp
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fe-box float-right"></i>
                    <h5 class="text-muted text-uppercase mb-3 mt-0">Categories</h5>
                    <h3 class="mb-3">{{ count($categories) }}</h3>
                    <span class="badge badge-primary"> +11% </span>
                    <span class="text-muted ml-2 vertical-middle">From
                        previous period</span>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fe-layers float-right"></i>
                    <h5 class="text-muted text-uppercase mb-3 mt-0">Authors</h5>
                    <h3 class="mb-3">{{ count($authors) }}</h3>
                    <span class="badge badge-primary"> -29% </span> <span class="text-muted ml-2 vertical-middle">From
                        previous period</span>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fe-tag float-right"></i>
                    <h5 class="text-muted text-uppercase mb-3 mt-0">Ebook</h5>
                    <h3 class="mb-3">{{ count($ebooks) }}</h3>
                    <span class="badge badge-primary"> 0% </span> <span class="text-muted ml-2 vertical-middle">From
                        previous period</span>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fe-briefcase float-right"></i>
                    <h5 class="text-muted text-uppercase mb-3 mt-0">Product Sold</h5>
                    <h3 class="mb-3" data-plugin="counterup">1,890</h3>
                    <span class="badge badge-primary"> +89% </span> <span class="text-muted ml-2 vertical-middle">Last
                        year</span>
                </div>
            </div>
        </div>




    </div> <!-- end container-fluid -->
@endsection
