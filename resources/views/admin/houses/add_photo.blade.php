@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $houses->title }} Fotoğraf Ekle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ev İşlemleri</a></li>
                                <li class="breadcrumb-item active">{{ $houses->title }} Fotoğraf Ekle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <form action="{{ route('store.house.photo') }}" method="POST" class="dropzone"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="house_id" value="{{ $houses->id }}">

                                    <div class="fallback">
                                        <input name="photo" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted ri-upload-cloud-2-line"></i>
                                        </div>

                                        <h4>Drop files here or click to upload.</h4>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

                @foreach ($housephotos as $item)
                    <div class="col-md-6 col-xl-3">

                        <div class="card">
                            <img class="card-img-top img-fluid" src="{{ asset($item->photo) }}" alt="Card image cap">
                            <div class="card-body">


                                <a href="{{ route('delete.house.photo', $item->id) }}" id="delete">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>




                            </div>
                        </div>

                    </div><!-- end col -->
                @endforeach


            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
