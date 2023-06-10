@section('title')
    Hakkımızda
@endsection
@extends('frontend.main_master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <section class="page-head bg-cover"
        style="background:#017efa url({{ asset('frontend/assets/img/about.jpg') }}) no-repeat;" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-9 col-md-12">

                    <h1 class="text-white mb-4">Hakkımızda</h1>
                    <a href="{{ route('home.contact') }}"> <button type="button" class="btn btn-primary">İletişime
                            Geç</button> </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Our Story Start ================================== -->
    <section>

        <div class="container">

            <!-- row Start -->
            <div class="row align-items-center justify-content-between">

                <div class="col-lg-6 col-md-6">
                    <div class="story-wrap explore-content">

                        <h2>{{ $abouts->title }}</h2>

                        <p>{!! $abouts->description !!} </p>
                        <a href="{{ route('home.contact') }}"> <button type="button" class="btn btn-primary">İletişime
                                Geç</button> </a>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6">
                    <img src="{{ asset($abouts->photo) }}" class="img-fluid" alt="">
                </div>

            </div>
            <!-- /row -->

        </div>

    </section>
    <!-- ============================ Our Story End ================================== -->


    <!-- ============================ Better Services ================================== -->
    @include('frontend.body.service_section')
    <!-- ============================ Better Services ================================== -->


    <!-- ============================ Good Reviews By Customers ================================== -->
    @include('frontend.body.testimonial_section')
    <!-- ============================ Good Reviews By Customers ================================== -->
@endsection
