@extends('admin.admin_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Add Ebook</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Add Add</h4>

                <form method="post" action="{{ route('admin.ebook.update') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $books->id }}">

                    <br>
                    {{-- start row 1 --}}
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" class="form-control" required="">
                                        <option value="" selected="" disabled="">
                                            Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $books->category_id ? 'selected' : '' }}>
                                                {{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div> <!-- end col md 6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" class="form-control" required="">
                                        <option value="" selected="" disabled="">
                                            Select SubCategory</option>

                                        @foreach ($subcategory as $sub)
                                            <option value="{{ $sub->id }}"
                                                {{ $sub->id == $books->subcategory_id ? 'selected' : '' }}>
                                                {{ $sub->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> <!-- end col md 4 -->

                    </div>
                    {{-- end row 1 --}}



                    {{-- start row 2 --}}
                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <h5>Ebook Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="ebook_name" class="form-control" required=""
                                        value="{{ $books->ebook_name }}">
                                    @error('ebook_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> <!-- end col md 4 -->
                        <div class="col-md-4">

                            <div class="form-group">

                                <h5>Ebook Image Url <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="ebook_img_url" class="form-control"
                                        value="{{ $books->ebook_img_url }}">
                                    @error('ebook_img_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> <!-- end col md 4 -->
                        <div class="form-group col-md-4">
                            <label for="inputZip" class="col-form-label">Pdf From Url</label>
                            <div class="controls">
                                <input type="text" name="pdf_from_url" class="form-control"
                                    value="{{ $books->pdf_from_url }}">
                                @error('pdf_from_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    {{-- end row 2 --}}





                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5> Select Author <span class="text-danger">*</span></h5>
                                <select name="author_id" class="form-control select2">
                                    <option>Select Author</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}"
                                            {{ $author->id == $books->author_id ? 'selected' : '' }}>
                                            {{ $author->author_name }}</option>
                                    @endforeach


                                </select>
                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <h5>Count Pages <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="pages" class="form-control" required=""
                                        value="{{ $books->pages }}">
                                    @error('pages')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div> <!-- end col md 4 -->
                        <div class="col-md-4">

                            <div class="form-group">
                                <h5>Launguage Ebook <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="lang_ebook" class="form-control" required=""
                                        value="{{ $books->lang_ebook }}">
                                    @error('lang_ebook')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div> <!-- end col md 4 -->
                    </div>




                    {{-- start row 4 --}}
                    <div class="row">


                        <div class="col-md-6">

                            <div class="form-group">
                                <h5>Short Description <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="short_desc" id="textarea" class="form-control" placeholder="Textarea text" style="height: 390px;"> {!! $books->short_desc !!}</textarea>
                                </div>
                            </div>


                        </div> <!-- end col md 6 -->

                        <div class="col-md-6">

                            <div class="form-group">
                                <h5>Long Description <span class="text-danger">*</span></h5>
                                <div class="controls">



                                    <textarea id="summernote" name="long_desc" style="height: 300px;">
                                    {!! $books->long_desc !!}
                                </textarea>



                                </div>
                            </div>

                        </div> <!-- end col md 6 -->


                    </div>

                    {{-- end row 4 --}}




                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1"
                                            {{ $books->hot_deals == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="featured_slider" value="1"
                                            {{ $books->featured_slider == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_3">Featured Slide</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_6" name="free" value="1"
                                            {{ old('free', $books->free) ? 'checked="checked"' : 0 }}
                                            {{-- {{ $books->free == 1 ? 'checked' : 0 }} --}}>
                                        <label for="checkbox_6">Free</label>
                                    </fieldset>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_4" name="special_offer" value="1"
                                            {{ $books->special_offer == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_4">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_5" name="soon" value="1"
                                            {{ $books->soon == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_5">Soon</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>



                    </div>



                    <div class="form-group text-right mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Update
                        </button>

                </form>
            </div>
            <!-- end card-box -->
        </div>

        <div class="row">
            <div class="col-md-4">

                <div class="card-box">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $books->id }}">
                        <input type="hidden" name="old_img" value="{{ $books->ebook_img }}">


                        <center>
                            <img src="{{ asset($books->ebook_img) }}" class="card-img-top img fluid"
                                style="height: 220px; width: 180px;">
                        </center>
                        <br>

                        <label class="col-form-label">Change Image</label>
                        <input type="file" name="ebook_img" class="filestyle" onChange="mainThamUrl(this)">
                        <img src="" id="mainThmb">
                        @error('ebook_img')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror



                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                        </div>
                        <br><br>

                    </form>

                </div>
            </div>



            <div class="col-md-8">


                <div class="row">


                    @foreach ($ebookFiles as $file)
                        <div class="col-md-6">
                            <form method="post" action=""
                                enctype="multipart/form-data">
                                @csrf

                                <div class="card">
                                    <br>
                                    <small style="margin: 5%">
                                        <a href="{{ asset('uploads'.$file->file_name) }}">{{ asset($file->file_name) }}</a>
                                    </small>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="col-form-label">Change File</label>
                                            <input type="file" name="pdf_from_local[{{ $file->id }}]"
                                                class="filestyle">
                                            {{-- onChange="mainThamUrl(this)" --}}
                                            @error('pdf_from_local')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <input type="submit" class="btn btn-rounded btn-primary mb-1"
                                            value="Update File">

                                        <a href="{{ route('admin.ebook.delete.file', $file->id) }}"
                                            class="btn btn-danger btn-rounded waves-light waves-effect width-md">
                                            Delete File
                                        </a>

                                    </div>
                                </div>
                        </div>
                        </form>
                    @endforeach


                </div>

            </div>




        </div>



    </div>
    </div>

    </div> <!-- end row -->







    </div>

@endsection

@push('scripts')
<script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


        });
    </script>

    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endpush
