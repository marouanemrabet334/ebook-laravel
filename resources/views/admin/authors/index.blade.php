@extends('admin.admin_master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">All Author</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-6">
            <div class="card-box table-responsive">
                <h4 class="header-title"><b>All Author</b></h4>

                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Author Image</th>
                            <th>Author Name Ar</th>

                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($authors as $item)
                            <tr>

                                <td> <img src="{{ asset('uploads'.$item->author_image) }}" style="width: 60px;height:60px;"
                                        alt="" srcset="" class="rounded-circle"></td>
                                <td>{{ $item->author_name }}</td>
                                {{--
                                <td width="30%">{{ Str::limit($item->about_author,20) }}</td> --}}

                                <td width="35%">

                                    <a href="{{ route('admin.author.edit', $item->id) }}"
                                        class="btn btn-icon waves-effect waves-light btn-warning"> <i
                                            class="fas fa-pencil-alt"></i> </a>
                                    <a href="{{ route('admin.author.delete', $item->id) }}"
                                        class="btn btn-icon waves-effect waves-light btn-danger"><i
                                            class="fas fa-times"></i></a>
                                </td>


                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-lg-6">

            <div class="card-box">
                <h4 class="header-title">Add Author</h4>


                <form action="{{ route('admin.author.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="form-group">
                        <label>Author Name Ar<span class="text-danger"> *</span></label>
                        <input type="text" name="author_name" required="" placeholder="Enter name ar"
                            class="form-control">
                        @error('author_name')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Author Image<span class="text-danger"> *</span></label>
                        <input type="file" name="author_image" class="filestyle" required>
                        @error('author_image')
                            <span class="text-danger">

                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <h5>About Author<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <textarea id="summernote_2" name="about_author" style="height: 200px;"></textarea>
                        </div>
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
