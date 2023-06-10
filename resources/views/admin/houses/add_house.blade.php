@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Ev Ekle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ev İşlemleri</a></li>
                                <li class="breadcrumb-item active">Ev Ekle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="{{ route('store.house') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">





                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                        <input class="form-control" name="title" type="text"
                                            placeholder="İlanı Tanımlayan Kısa Başlık" required>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Açıklama</label>
                                        <textarea id="elm1" name="description"></textarea>
                                    </div>
                                </div>
                                <!-- end row -->




                                <div class="row mb-3">


                                    <div class="col-4">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Ev
                                            Yaşı</label>
                                        <input class="form-control" name="year" type="text"
                                            placeholder="Ev / Bina Yaşı">
                                    </div>
                                    <!-- end row -->



                                    <div class="col-4">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Alan</label>
                                        <input class="form-control" name="squaremeters" type="text"
                                            placeholder="Metrekare">
                                    </div>


                                    <!-- end row -->

                                    <div class="col-4">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Fiyat</label>
                                        <input class="form-control" name="price" type="text" placeholder="Fiyat">
                                    </div>

                                </div>



                                <div class="row mb-3">



                                    <div class="col-4">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Ev Tipi</label>

                                        <select name="type" id="" class="form-control">
                                            <option disabled selected>Ev Tipi</option>
                                            <option value="Apartment">Daire</option>
                                            <option value="Private">Müstakil</option>
                                            <option value="Villa">Villa</option>
                                            <option value="Workplace">İş Yeri</option>
                                            <option value="Plot">Arsa</option>
                                        </select>
                                    </div>



                                    <div class="col-4">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Durum</label>
                                        <select name="status" id="" class="form-control">
                                            <option disabled selected>Ev Durumu</option>
                                            <option value="Sale">Satılık</option>
                                            <option value="Rent">Kiralık</option>
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Kat</label>
                                        <input class="form-control" name="floor" type="text"
                                            placeholder="Bulunduğu Kat">
                                    </div>


                                </div>
                                <!-- end row -->






                                <div class="row mb-3">

                                    <div class="col-6">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Oda Sayısı</label>
                                        <input class="form-control" name="numberofrooms" type="text"
                                            placeholder="Oda Sayısı Exp: 3+1">
                                    </div>


                                    <div class="col-6">

                                        <label for="example-text-input" class="col-sm-2 col-form-label">Yatak Odası
                                        </label>
                                        <input class="form-control" name="bedroom" type="text"
                                            placeholder="Yatak Odası Sayısı">
                                    </div>



                                </div>
                                <!-- end row -->

                                <div class="row mb-3">

                                    <div class="col-6">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Banyo Sayısı</label>
                                        <input class="form-control" name="bathroom" type="text"
                                            placeholder="Banyo Sayısı">
                                    </div>

                                    <div class="col-6">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Garaj
                                            Sayısı</label>

                                        <input class="form-control" name="garage" type="text"
                                            placeholder="Araç Park Sayısı">
                                    </div>

                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Adres</label>
                                        <input class="form-control" name="address" type="text" placeholder="Adres">
                                    </div>
                                </div>
                                <!-- end row -->



                                <div class="row mb-3">

                                    <div class="col-6">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Harita
                                        </label>
                                        <textarea class="form-control" name="map" placeholder="Google Harita SRC Link"></textarea>
                                    </div>

                                    <div class="col-6">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Video</label>
                                        <textarea class="form-control" name="video" placeholder="Youtube SRC Link"></textarea>
                                    </div>
                                </div>
                                <!-- end row -->



                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Özellikler
                                        </label>
                                        <input class="form-control" name="features" type="text"
                                            placeholder="Özellikleri girerken her özellikten sonra ',' (virgül) eklenmesi zorunludur.">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Sıra</label>
                                        <input class="form-control" name="desk" type="number"
                                            placeholder="İlanın Gözükeceği Sıra">
                                    </div>
                                </div>
                                <!-- end row -->



                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Ekle">

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </form>



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
