@extends('admin.admin_master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Edit Author</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-8">

            <div class="card-box">
                <h4 class="header-title">Edit Autho</h4>

                <form action="{{ route('author.update', $author->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $author->id }}">
                    <input type="hidden" name="old_image" value="{{ $author->author_image }}">

                    <br>

                    <div class="form-group">
                        <label>Category Name Ar<span class="text-danger"> *</span></label>
                        <input type="text" name="author_name" value="{{ $author->author_name }}" class="form-control">
                        @error('author_name')
                            <span class="text-danger">

                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Author Image<span class="text-danger"> *</span></label>
                        <input type="file" name="author_image" class="filestyle">
                        @error('author_image')
                            <span class="text-danger">

                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <h5>About Author<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <textarea id="summernote_2" name="about_author" style="height: 200px;">
                                    {!! $author->about_author !!}

                                </textarea>
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
