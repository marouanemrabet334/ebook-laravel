@extends('admin.admin_master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">All Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-8">
            <div class="card-box table-responsive">
                <h4 class="header-title"><b>All Category</b></h4>

                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Category Name Ar</th>
                            <th>Category Image</th>
                            <th>Category Icon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>



                        @foreach ($categories as $category)
                            <tr>



                                <td>{{ $category->category_name }}</td>

                                <td> <img src="{{ asset('uploads' . $category->category_image) }}"
                                        style="width: 70px;height:40px;" alt="" srcset=""></td>

                                <td><i class="{{ $category->category_icon }}"></i></td>

                                <td>

                                    @if ($category->status == 1)
                                        <span class="badge badge-pill badge-success"> Active </span>
                                    @else
                                        <span class="badge badge-pill badge-danger"> Not Active </span>
                                    @endif


                                </td>


                                <td width="35%">

                                    <a href="{{ route('admin.category.edit', $category->id) }}"
                                        class="btn btn-icon waves-effect waves-light btn-warning"> <i
                                            class="fas fa-pencil-alt"></i> </a>
                                    <a href="{{ route('admin.category.delete', $category->id) }}"
                                        class="btn btn-icon waves-effect waves-light btn-danger"><i
                                            class="fas fa-times"></i></a>



                                    @if ($category->status == 1)
                                        <a href="{{ route('admin.category.inactive', $category->id) }}"
                                            class="btn btn-icon waves-effect waves-light btn-success"><i
                                                class="far fa-thumbs-up"></i></a>
                                    @else
                                        <a href="{{ route('admin.category.active', $category->id) }}"
                                            class="btn btn-icon waves-effect waves-light btn-danger"><i
                                                class="far fa-thumbs-down"></i></a>
                                    @endif
                                </td>


                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-lg-4">

            <div class="card-box">
                <h4 class="header-title">Add Category</h4>


                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="form-group">
                        <label>Category Name<span class="text-danger"> *</span></label>
                        <input type="text" name="category_name"required="" placeholder="Enter name" class="form-control">
                        @error('category_name')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category Image<span class="text-danger"> *</span></label>
                        <input type="file" name="category_image" class="filestyle" required>
                        @error('category_image')
                            <span class="text-danger">

                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category Icon<span class="text-danger">*</span></label>
                        <input type="text" name="category_icon" required="" placeholder="Enter category icon"
                            class="form-control">
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
