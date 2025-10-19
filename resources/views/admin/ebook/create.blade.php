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

                <form method="post" action="{{ route('admin.ebook.store') }}" enctype="multipart/form-data">
                    @csrf

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
                                            <option value="{{ $category->id }}">
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
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">
                                                {{ $subcategory->subcategory_name }}</option>
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

                        <div class="col-md-6">

                            <div class="form-group">

                                <h5>Ebook Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="ebook_name" class="form-control" required="">
                                    @error('ebook_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> <!-- end col md 4 -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <h5>Ebook Image Url <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="ebook_img_url" class="form-control">
                                    @error('ebook_img_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> <!-- end col md 4 -->
                    </div>

                    {{-- end row 2 --}}

                    {{-- start row 3 --}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity" class="col-form-label">Ebook Image</label>
                            <input type="file" name="ebook_img" class="filestyle" required>
                            @error('ebook_img')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState" class="col-form-label">Upload Pdf</label>
                            <input type="file" name="pdf_from_local[]"multiple="" class="filestyle" required>
                            @error('pdf_from_local')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip" class="col-form-label">Pdf From Url</label>
                            <div class="controls">
                                <input type="text" name="pdf_from_url" class="form-control">
                                @error('pdf_from_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    {{-- end row 3 --}}


                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5> Select Author <span class="text-danger">*</span></h5>
                                <select name="author_id" class="form-control select2">
                                    <option value="" selected="" disabled="">Select Author</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">
                                            {{ $author->author_name }}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="form-group">
                                <h5>Count Pages <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="pages" class="form-control" required="">
                                    @error('pages')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div> <!-- end col md 4 -->
                        <div class="col-md-4">

                            <div class="form-group">
                                <h5>Language Ebook <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="lang_ebook" class="form-control" required="">
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
                                    <textarea name="short_desc" id="textarea" class="form-control" placeholder="Textarea text" style="height: 390px;"></textarea>
                                </div>
                            </div>


                        </div> <!-- end col md 6 -->

                        <div class="col-md-6">

                            <div class="form-group">
                                <h5>Long Description <span class="text-danger">*</span></h5>
                                <div class="controls">

                                    <textarea id="summernote" name="long_desc" style="height: 300px;"></textarea>

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
                                        <input type="checkbox" name="hot_deals">
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" name="featured_slider" >
                                        <label for="checkbox_3">Featured Slide</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_6" name="free" >
                                        <label for="checkbox_6">Free</label>
                                    </fieldset>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" name="special_offer">
                                        <label for="checkbox_4">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" name="soon">
                                        <label for="checkbox_5">Soon</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>



                    </div>



                    <div class="form-group text-right mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div> <!-- end card-box -->
        </div>
    </div> <!-- end row -->
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
                            $('select[name="subcategory_id"]').html('');
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
@endpush
