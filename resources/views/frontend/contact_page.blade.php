@section('title')
    İletişim
@endsection
@extends('frontend.main_master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="background:#017efa url({{ asset('frontend/assets/img/page-title.png') }}) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">İletişim</h2>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->



    <!-- ============================ Contact Start ================================== -->
    <section>

        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <strong>Başarılı !</strong> {{ session('success') }}
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <label class="label text-success bg-light-success">İletişim</label>
                        <h2>Bize Mesaj Gönderin</h2>
                    </div>
                </div>
            </div>

            <form action="{{ route('store.message') }}" method="POST">
                @csrf
                <!-- row Start -->
                <div class="row align-items-center justify-content-center">

                    <div class="col-lg-10 col-md-12">

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Ad Soyad</label>
                                    <input type="text" class="form-control simple" name="name" placeholder="Ad Soyad"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control simple" name="mail"
                                        placeholder="E-mail Adresiniz" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Phone.</label>
                                    <input type="text" class="form-control simple" name="phone"
                                        placeholder="Telefon Numaranız" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Konu</label>
                                    <input type="text" class="form-control simple" name="subject"
                                        placeholder="Mesajınızın Konusu" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Mesaj</label>
                                    <textarea class="form-control simple" name="message" id="txt" onKeyUp="check()" maxlength="255" cols="30"
                                        rows="4" placeholder="Mesajınız (Max 255)" required></textarea>
                                    <div id="warning" class="mt-3"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Gönder</button>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
                <!-- /row -->
            </form>


            <!-- row Start -->
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 col-md-12">

                    <div class="ctr-veshm-box">
                        <div class="ctr-veshm-signl">
                            <div class="ctr-veshm-signl-ico"><i class="fa-solid fa-phone"></i></div>
                            <div class="ctr-veshm-signl-caption">
                                <a href="tel:{{ $settings->phone }}">
                                    <h5>{{ $settings->phone }}</h5>
                                </a>
                            </div>
                        </div>
                        <div class="ctr-veshm-signl">
                            <div class="ctr-veshm-signl-ico"><i class="fa-solid fa-envelope"></i></div>
                            <div class="ctr-veshm-signl-caption">
                                <a href="mailto:{{ $settings->mail }}">
                                    <h5 style="text-transform: none;">{{ $settings->mail }}</h5>
                                </a>
                            </div>
                        </div>
                        <div class="ctr-veshm-signl">
                            <div class="ctr-veshm-signl-ico"><i class="fa-solid fa-map-location-dot"></i></div>
                            <div class="ctr-veshm-signl-caption">
                                <h5>{{ $settings->address }}</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /row -->

        </div>

    </section>
    <!-- ============================ Contact End ================================== -->



    <script>
        function check() {
            stringLength = document.getElementById('txt').value.length;
            if (stringLength >= 255) {
                document.getElementById('warning').innerText = "Maximum characters are 255"
            } else {
                document.getElementById('warning').innerText = ""
            }
        }
    </script>
@endsection
