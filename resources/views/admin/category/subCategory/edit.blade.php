@extends('admin.admin_master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h3 class="box-title">Edit SubCategory</h3>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-6">

            <div class="card-box">
                <h4 class="header-title">Edit SubCategory</h4>

                <form method="post" action="{{ route('admin.subcategory.update') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $subcategory->id }}">
                    <input type="hidden" name="old_image" value="{{ $subcategory->subcategory_image }}">


                    <br>
                    <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" class="form-control">
                                <option value="" selected="" disabled="">Select Category
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>SubCategory Name Ar<span class="text-danger"> *</span></label>
                        <input type="text" name="subcategory_name" value="{{ $subcategory->subcategory_name }}"
                            class="form-control">
                        @error('subcategory_name')
                            <span class="text-danger">

                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>SubCategory Image<span class="text-danger"> *</span></label>
                        <input type="file" name="subcategory_image" class="filestyle">
                        @error('subcategory_image')
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
