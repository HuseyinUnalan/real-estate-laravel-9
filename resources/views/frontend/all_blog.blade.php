@section('title')
    Bloglar
@endsection
@extends('frontend.main_master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="background:#4dd9ad url({{ asset('frontend/assets/img/page-title.png') }}) no-repeat;">
        <div class="container">
            <div class="row">
                <h2 class="ipt-title">Bloglar</h2>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Blog List Start ================================== -->
    <section class="gray-simple">
        <div class="container">

            <!-- row Start -->
            <div class="row gx-4 gy-4">
                @foreach ($allblogs as $allblog)
                    <!-- Single blog Grid -->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="veshm-grid-blog">
                            <div class="veshm-grid-blog-thumb">
                                <img src="{{ asset($allblog->photo) }}" class="img-fluid" alt="">
                            </div>
                            <div class="veshm-grid-blog-body">
                                <div class="veshm-grid-body-header">
                                    <div class="veshm-grid-posted"><span>

                                            {{ Carbon\Carbon::parse($allblog->created_at)->format('d M Y') }}
                                        </span></div>
                                    <div class="veshm-grid-title">
                                        <h4><a href="{{ route('blog.details', $allblog->slug) }}">{{ $allblog->title }}</a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="veshm-grid-body-middle">
                                    <p>
                                        {!! Str::limit($allblog->description, 120) !!}
                                    </p>
                                </div>
                                <div class="veshm-grid-body-footer">
                                    <a href="{{ route('blog.details', $allblog->slug) }}" class="btn btn-blog-link">Devamnı
                                        Oku</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /row -->

            <!-- Pagination -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav aria-label="Page navigation example">
                        <div class="pagination-wrap">
                            {{ $allblogs->links('vendor.pagination.default') }}
                        </div>
                    </nav>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Blog List End ================================== -->
@endsection
