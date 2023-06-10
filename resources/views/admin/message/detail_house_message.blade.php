@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Mesaj Detayı</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ev Mesajları</a></li>
                                <li class="breadcrumb-item active">Mesaj Detayı</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Ev</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="" value="{{ $messages->house }}"
                                            type="text" disabled>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Ad Soyad</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="" value="{{ $messages->name }}"
                                            type="text" disabled>
                                    </div>
                                </div>
                                <!-- end row -->



                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="" value="{{ $messages->email }}"
                                            type="text" disabled>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Telefon</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="" value="{{ $messages->phone }}"
                                            type="text" disabled>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Mesaj</label>
                                    <div class="col-sm-10">
                                        <textarea name="" id="" cols="30" rows="4" class="form-control" disabled>{{ $messages->message }}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tarih</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="" value="{{ $messages->created_at }}"
                                            type="text" disabled>
                                    </div>
                                </div>
                                <!-- end row -->



                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </form>


            <a href="mailto:{{ $messages->email }}">
                <button type="submit" class="btn btn-info waves-effect waves-light">
                    <i class="fas fa-mail-bulk"></i> Mail Gönder</button>

            </a>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
