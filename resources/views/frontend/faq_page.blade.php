@section('title')
    Sıkça Sorulan Sorular
@endsection
@extends('frontend.main_master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="background:#017efa url(assets/img/page-title.png) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">Sıkça Sorulan Sorular</h2>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ================= Our Mission ================= -->
    <section class="bg-light">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="single-faqs mb-5">

                        <div class="accordion" id="accountActivation">


                            @foreach ($allfaqs as $allfaq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="account{{ $allfaq->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#accounta{{ $allfaq->id }}" aria-expanded="true"
                                            aria-controls="accounta{{ $allfaq->id }}">
                                            {{ $allfaq->title }}
                                        </button>
                                    </h2>
                                    <div id="accounta{{ $allfaq->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="account{{ $allfaq->id }}" data-bs-parent="#accountActivation">
                                        <div class="accordion-body">
                                            {!! $allfaq->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>





                </div>

            </div>
        </div>
    </section>
    <!-- ================= Our Mission ================= -->
@endsection
