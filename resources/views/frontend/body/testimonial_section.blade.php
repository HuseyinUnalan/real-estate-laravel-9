<section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2>Müşteri Yorumları</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center gx-4 gy-4">


            @foreach ($testimonials as $testimonial)
                <!-- Single Review -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="veshm-reviews-box">
                        <div class="veshm-reviews-flex">
                            <div class="veshm-reviews-thumb">
                                <div class="veshm-reviews-figure"><img src="{{ asset($testimonial->photo) }}"
                                        class="img-fluid circle" alt=""></div>
                            </div>
                            <div class="veshm-reviews-caption">
                                <div class="veshm-reviews-title">
                                    <h4>{{ $testimonial->name }}</h4>
                                </div>
                                <div class="veshm-reviews-rates">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="veshm-reviews-desc">
                            <p>{!! $testimonial->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

    </div>
</section>
