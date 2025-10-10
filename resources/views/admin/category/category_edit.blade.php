@extends('admin.admin_master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Edit Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-4">

            <div class="card-box">
                <h4 class="header-title">Edit Category</h4>

                <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <input type="hidden" name="old_image" value="{{ $category->category_image }}">

                    <br>

                    <div class="form-group">
                        <label>Category Name Ar<span class="text-danger"> *</span></label>
                        <input type="text" name="category_name_ar" value="{{ $category->category_name_ar }}"
                            class="form-control">
                        @error('category_name_ar')
                            <span class="text-danger">

                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category Image<span class="text-danger"> *</span></label>
                        <input type="file" name="category_image" class="filestyle" >
                        @error('category_image')
                            <span class="text-danger">

                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category Icon<span class="text-danger">*</span></label>
                        <input type="text" name="category_icon"
                            class="form-control" value="{{ $category->category_icon }}">
                        @error('category_icon')
                            <span class="text-danger">

                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group text-right mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Submit
                        </button>
                        {{-- <button type="reset" class="btn btn-light waves-effect ml-1">
                            Cancel
                        </button> --}}
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
    </div> <!-- end row -->




    </div>
@endsection
