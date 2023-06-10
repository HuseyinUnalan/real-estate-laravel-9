@section('title')
    {{ $blogs->title }}
@endsection
@extends('frontend.main_master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    {{-- <div class="page-bg">
        <div class="blog-thumb"><img src="{{ asset('frontend/assets/img/banner-2.jpg') }}" class="img-fluid" alt="">
        </div>
    </div> --}}
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="background:#4dd9ad url({{ asset('frontend/assets/img/page-title.png') }}) no-repeat;">
        <div class="container">
            <div class="row">
                <h2 class="ipt-title">{{ $blogs->title }}</h2>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->


    <!-- ============================ Agency List Start ================================== -->
    <section class="gray-simple">

        <div class="container">

            <!-- row Start -->
            <div class="row">

                <!-- Blog Detail -->
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="blog-details single-post-item format-standard mb-4">
                        <div class="post-featured-img">
                            <img class="img-fluid" src="{{ asset($blogs->photo) }}" alt="">
                        </div>

                        <div class="post-details">


                            <div class="post-top-meta">
                                <span
                                    class="pst-date label text-success bg-light-success me-2">{{ Carbon\Carbon::parse($blogs->created_at)->format('d.m.Y') }}</span>
                            </div>
                            <h3 class="post-title">{{ $blogs->title }}</h3>
                            <p>{!! $blogs->description !!}</p>

                        </div>
                    </div>



                </div>

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="pg-side-groups">

                        <div class="pg-side-block">

                            <div class="pg-side-block-body">
                                <div class="pg-side-block-info">
                                    <div class="vl-elfo-group">
                                        <div class="vl-elfo-icon"><i class="fa-solid fa-phone-volume"></i></div>
                                        <div class="vl-elfo-caption">
                                            <h6>Telefon</h6>
                                            <p>{{ $settings->phone }}</p>
                                        </div>
                                    </div>
                                    <div class="vl-elfo-group">
                                        <div class="vl-elfo-icon"><i class="fa-regular fa-envelope"></i></div>
                                        <div class="vl-elfo-caption">
                                            <h6>E-mail</h6>
                                            <p>{{ $settings->mail }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="pg-side-block-buttons">
                                    <div class="single-button"><a href="tel:{{ $settings->phone }}"
                                            class="btn font--medium btn-light-success full-width"><i
                                                class="fa-solid fa-paper-plane me-2"></i>Ara</a></div>
                                    <div class="single-button"><a href="mailto:{{ $settings->mail }}"
                                            class="btn font--medium btn-theme full-width"><i
                                                class="fa-solid fa-comments me-2"></i>Mail Gönder</a></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /row -->

        </div>

    </section>
    <!-- ============================ Agency List End ================================== -->
@endsection
