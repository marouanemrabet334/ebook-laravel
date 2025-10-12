@extends('admin.admin_master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">All SubCategory</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-8">
            <div class="card-box table-responsive">
                <h4 class="header-title"><b>All SubCategory</b></h4>
                {{-- <table id="datatable" class="table table-bordered  dt-responsive nowrap"  style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Category Arabic</th>
                            <th>SubCategory Image</th>
                            <th>SubCategory Name Ar</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>

                        @foreach ($subcategory as $item)
                            <tr>
                                <td> {{ $item['category']['category_name'] }} </td>
                                <td> <img src="{{ asset($item->subcategory_image) }}" style="width: 70px;height:40px;"
                                        alt="" srcset=""></td>
                                <td>{{ $item->subcategory_name }}</td>

                                <td width="30%">
                                    <a href="{{ route('subcategory.edit', $item->id) }}"
                                        class="btn btn-icon waves-effect waves-light btn-warning"> <i
                                            class="fas fa-pencil-alt"></i> </a>
                                    <a href="{{ route('subcategory.delete', $item->id) }}"
                                        class="btn btn-icon waves-effect waves-light btn-danger"><i
                                            class="fas fa-times"></i></a>


                                </td>

                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-lg-4">

            <div class="card-box">
                <h4 class="header-title">Add SubCategory</h4>

                <form method="post" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
                    @csrf
                    <br>

                    <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" class="form-control">
                                <option value="" selected="" disabled="">Select Category
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <label>SubCategory Name Ar<span class="text-danger"> *</span></label>
                        <input type="text" name="subcategory_name"required="" placeholder="Enter name ar"
                            class="form-control">
                        @error('subcategory_name')
                            <span class="text-danger">

                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>SubCategory Image<span class="text-danger"> *</span></label>
                        <input type="file" name="subcategory_image" class="filestyle" required>
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
