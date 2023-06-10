@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Gallery Image</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Gallery Operations</a></li>
                                <li class="breadcrumb-item active">All Gallery Image</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">


                @foreach ($gallerys as $item)
                    <div class="col-md-6 col-xl-3">

                        <div class="card">
                            <img class="card-img-top img-fluid" src="{{ asset($item->photo) }}" alt="Card image cap">
                            <div class="card-body">

                                <a href="{{ route('edit.gallery', $item->id) }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </a>

                                <a href="{{ route('delete.gallery', $item->id) }}" id="delete">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>

                                @if ($item->status == 1)
                                    <a href="{{ route('gallery.inactive', $item->id) }}" class="btn btn-danger btn-sm"><i
                                            class="fa fa-arrow-down" title="Inactive Now"></i></a>
                                @else
                                    <a href="{{ route('gallery.active', $item->id) }}" class="btn btn-success btn-sm"><i
                                            class="fa fa-arrow-up" title="Active Now"></i></a>
                                @endif

                                <hr>
                                @if ($item->status == 1)
                                    <div class="font-size-13"><i
                                            class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                    </div>
                                @else
                                    <div class="font-size-13"><i
                                            class="ri-checkbox-blank-circle-fill font-size-10 text-danger align-middle me-2"></i>Not
                                        Active
                                    </div>
                                @endif
                                <hr>
                                {{ $item->desk }}


                            </div>
                        </div>

                    </div><!-- end col -->
                @endforeach



                <div class="col-md-6 col-xl-3">


                </div>
                <!-- end row -->




            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection
