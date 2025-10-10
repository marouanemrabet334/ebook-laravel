@extends('admin.admin_master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">All Ebook</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="header-title"><b>All Ebook</b></h4>
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image </th>
                            <th>Ebook Name Arabic </th>
                            <th>Status </th>
                            <th>Free Or Paid </th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>



                        @foreach ($books as $item)
                        <tr>
                            {{--<td> <img src="{{ asset($item->ebook_img) }}"
                                    style="width: 60px; height: 50px;"> </td>--}}
                            <td> <img src="{{$item->getFirstMediaUrl('images')}}"
                                      style="width: 60px; height: 50px;"> </td>
                            <td>{{ $item->ebook_name_ar }}</td>

                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-pill badge-success"> Active </span>
                                @else
                                    <span class="badge badge-pill badge-danger"> InActive </span>
                                @endif

                            </td>
                            <td>

                              
                                    @if ($item->free == 1)

                                    <span class="badge badge-pill badge-success"> Free </span>

                                  @else
                                    <span class="badge badge-pill badge-danger"> Paid </span>

                                @endif

                            </td>

                            <td width="30%">

                                <a href="{{route('ebook.edit',$item->id)}}"
                                    class="btn btn-icon waves-effect waves-light btn-warning"> <i
                                        class="fas fa-pencil-alt"></i> </a>
                                <a href="{{route('ebook.delete',$item->id)}}"
                                    class="btn btn-icon waves-effect waves-light btn-danger"><i
                                        class="fas fa-times"></i></a>



                                @if ($item->status == 1)
                                <a href="{{ route('ebook.inactive', $item->id) }}"
                                    class="btn btn-icon waves-effect waves-light btn-success"><i
                                        class="far fa-thumbs-up"></i></a>
                            @else
                                <a href="{{ route('ebook.active', $item->id) }}"
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


    </div> <!-- end row -->




    </div>
@endsection
