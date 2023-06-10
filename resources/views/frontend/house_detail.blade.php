@section('title')
    {{ $house->title }}
@endsection
@extends('frontend.main_master')
@section('content')
    @php
        $housephotos = $house->housePhotos;
    @endphp
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="featured_slick_gallery gray">
        <div class="featured_slick_gallery-slide">
            @foreach ($housephotos as $housephoto)
                <div class="featured_slick_padd"><a href="{{ asset($housephoto->photo) }}" class="mfp-gallery"><img
                            src="{{ asset($housephoto->photo) }}" class="img-fluid mx-auto" alt=""></a></div>
            @endforeach



        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Property Detail Start ================================== -->
    <section class="gray-simple">
        <div class="container">
            <div class="row">

                <!-- property main detail -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- Main Info Detail -->
                    <div class="vesh-detail-bloc">
                        <div class="vesh-detail-headup">
                            <div class="vesh-detail-headup-first">
                                <div class="prt-detail-title-desc">

                                    @if ($house->status == 'Sale')
                                        <span class="label label-success">Satılık</span>
                                    @else
                                        <span class="label label-danger">Kiralık</span>
                                    @endif

                                    <h4>{{ $house->title }}</h4>
                                    <span class="text-mid"><i
                                            class="fa-solid fa-location-dot me-2"></i>{{ $house->address }}</span>
                                    <div class="list-fx-features mt-2">
                                        <div class="list-fx-fisrt">
                                            <span
                                                class="label font--medium label-light-success me-2">{{ $house->numberofrooms }}</span>
                                            <span class="label font--medium label-light-warning me-2">{{ $house->bedroom }}
                                                Yatak Odası</span>
                                            <span class="label font--medium label-light-info me-2">{{ $house->bathroom }}
                                                Banyo</span>
                                            <span class=" label font--medium label-light-danger">{{ $house->squaremeters }}
                                                m²</span>
                                        </div>
                                        <div class="list-fx-last">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vesh-detail-headup-last">
                                @if ($house->status == 'Sale')
                                    <h3 class="prt-price-fix theme-cl">{{ $house->price }} TL</h3>
                                @else
                                    <h3 class="prt-price-fix theme-cl">{{ $house->price }} TL<span> / Aylık</span></h3>
                                @endif

                            </div>
                        </div>
                    </div>

                    <!-- About Property Detail -->
                    <div class="vesh-detail-bloc">
                        <div class="vesh-detail-bloc_header">
                            <h4 class="property_block_title no-arrow">Açıklama</h4>
                        </div>
                        <div class="vesh-detail-bloc-body">
                            <div class="row g-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <p>
                                        {!! $house->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Amenties Detail -->
                    <div class="vesh-detail-bloc">
                        <div class="vesh-detail-bloc_header">
                            <a data-bs-toggle="collapse" data-parent="#amenitiesinfo" data-bs-target="#amenitiesinfo"
                                aria-controls="amenitiesinfo" href="javascript:void(0);" aria-expanded="false">
                                <h4 class="property_block_title">Özellikler</h4>
                            </a>
                        </div>
                        <div id="amenitiesinfo" class="panel-collapse collapse show" aria-labelledby="amenitiesinfo">
                            <div class="vesh-detail-bloc-body">
                                <ul class="avl-features third color">

                                    @php
                                        $features = explode(',', $house->features);
                                        
                                    @endphp

                                    @foreach ($features as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>







                    <!-- Submit Reviews -->
                    <div class="vesh-detail-bloc">
                        <div class="vesh-detail-bloc_header">
                            <h4 class="property_block_title no-arrow">Mesaj Gönder</h4>
                        </div>
                        <div class="panels">
                            <div class="vesh-detail-bloc-body">
                                <form action="{{ route('store.house.message') }}" method="POST" class="simple-form">
                                    @csrf
                                    <input type="hidden" name="house" value="{{ $house->title }}">

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Ad Soyad</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Ad Soyad" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="E-mail" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Telefon Numarası</label>
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="Telefon Numarası" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Mesajınız</label>
                                                <textarea class="form-control ht-80" name="message" placeholder="Mesajınız" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button class="btn btn-theme" type="submit">Gönder</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- property main detail -->


                <!-- Property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">


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
        </div>
    </section>
    <!-- ============================ Property Detail End ================================== -->

    <!-- ============================ Related Property ===================================== -->
    <section>
        <div class="container">

            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <div class="sec-heading">
                        <h6>Benzer Evler</h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="similar-slide">

                        @foreach ($allhouses as $allhouse)
                            @php
                                $housephotos = $allhouse->housePhotos;
                            @endphp
                            <!-- Single Slide -->
                            <div class="single-slide">
                                <div class="veshm-list-wraps">



                                    @if ($allhouse->status == 'Sale')
                                        <div class="veshm-type fr-sale"><span>Satılık</span></div>
                                    @else
                                        <div class="veshm-type"><span>Kiralık</span></div>
                                    @endif
                                    <div class="veshm-list-thumb">

                                        <div class="veshm-list-img-slide">
                                            <div class="veshm-list-click">

                                                @foreach ($housephotos as $housephoto)
                                                    <div><a href="{{ route('house.details', $allhouse->slug) }}"><img
                                                                src="{{ asset($housephoto->photo) }}"
                                                                class="img-fluid mx-auto" alt=""></a></div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                    <div class="veshm-list-block">
                                        <div class="veshm-list-head">
                                            <div class="veshm-list-head-caption">
                                                <div class="rlhc-price">
                                                    @if ($allhouse->status == 'Sale')
                                                        <h4 class="rlhc-price-name theme-cl">
                                                            {{ $allhouse->price }} TL
                                                        </h4>
                                                    @else
                                                        <h4 class="rlhc-price-name theme-cl"> {{ $allhouse->price }}
                                                            TL<span class="monthly">/Aylık</span>
                                                        </h4>
                                                    @endif
                                                </div>
                                                <div class="listing-short-detail-flex">
                                                    <h5 class="rlhc-title-name verified"><a
                                                            href="{{ route('house.details', $allhouse->slug) }}"
                                                            class="prt-link-detail">{{ $allhouse->title }}</a></h5>
                                                    <div class="rlhc-prt-location"><img
                                                            src="{{ asset('frontend/assets/img/pin.svg') }}"
                                                            width="16" class="me-1"
                                                            alt="">{{ $allhouse->address }}</div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="veshm-list-footer">
                                            <div class="veshm-list-circls">
                                                <ul>
                                                    <li><span class="bed-inf"><i
                                                                class="fa-solid fa-bed"></i></span>{{ $house->bedroom }}
                                                        Oda
                                                    </li>
                                                    <li><span class="bath-inf"><i
                                                                class="fa-solid fa-bath"></i></span>{{ $house->bathroom }}
                                                        Banyo
                                                    </li>
                                                    <li><span class="area-inf"><i
                                                                class="fa-solid fa-vector-square"></i></span>{{ $house->squaremeters }}
                                                        m²</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================= Related Property End ================================= -->
@endsection
