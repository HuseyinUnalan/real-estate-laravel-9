@extends('frontend.main_master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="background:#4dd9ad url({{ asset('frontend/assets/img/page-title.png') }}) no-repeat;">
        <div class="container">
            <div class="row">
                <h2 class="ipt-title">{{ $item }} Arama Sonuçları</h2>

            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ All Property ================================== -->

    <section class="over-top micler gray-simple">

        <div class="container">



            <!-- Start Shorting -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-shorting-box mt-4 bg-white border rounded px-3 py-3 mb-5">
                        <div class="item-shorting clearfix">
                            <div class="left-column">
                                <h4 class="m-0 text-dark font--medium"><span>{{ count($houses) }}</span> Adet İlan
                                </h4>
                            </div>
                        </div>
                        <div class="item-shorting-box-right">
                        </div>
                    </div>
                </div>
            </div>

            <div id="grid-layout" style="display: block;">
                <!-- Grid yapısı -->
                <!-- Start All Listing -->
                <div class="row justify-content-center gx-3 gy-4">

                    @foreach ($houses as $house)
                        @php
                            $housephotos = $house->housePhotos;
                        @endphp
                        <!-- Single Property -->
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="veshm-list-wraps">
                                @if ($house->status == 'Sale')
                                    <div class="veshm-type fr-sale"><span>Satılık</span></div>
                                @else
                                    <div class="veshm-type"><span>Kiralık</span></div>
                                @endif

                                <div class="veshm-list-thumb">

                                    <div class="veshm-list-img-slide">
                                        <div class="veshm-list-click">
                                            @foreach ($housephotos as $housephoto)
                                                <div><a href="{{ route('house.details', $house->slug) }}"><img
                                                            src="{{ asset($housephoto->photo) }}" class="img-fluid mx-auto"
                                                            alt=""></a></div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <div class="veshm-list-block">

                                    <div class="veshm-list-head">
                                        <div class="veshm-list-head-caption">
                                            <div class="rlhc-price">
                                                @if ($house->status == 'Sale')
                                                    <h4 class="rlhc-price-name theme-cl">
                                                        {{ $house->price }} TL
                                                    </h4>
                                                @else
                                                    <h4 class="rlhc-price-name theme-cl"> {{ $house->price }} TL<span
                                                            class="monthly">/Aylık</span>
                                                    </h4>
                                                @endif
                                            </div>
                                            <div class="listing-short-detail-flex">
                                                <h5 class="rlhc-title-name verified"><a
                                                        href="{{ route('house.details', $house->slug) }}"
                                                        class="prt-link-detail">{{ $house->title }}</a></h5>
                                                <div class="rlhc-prt-location"><img
                                                        src="{{ asset('frontend/assets/img/pin.svg') }}" width="16"
                                                        class="me-1" alt="">{{ $house->address }}</div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="veshm-list-footer">
                                        <div class="veshm-list-circls">
                                            <ul>
                                                <li><span class="bed-inf"><i
                                                            class="fa-solid fa-bed"></i></span>{{ $house->bedroom }} Oda
                                                </li>
                                                <li><span class="bath-inf"><i
                                                            class="fa-solid fa-bath"></i></span>{{ $house->bathroom }}
                                                    Banyo
                                                </li>
                                                <li><span class="area-inf"><i
                                                            class="fa-solid fa-vector-square"></i></span>{{ $house->squaremeters }}
                                                    m²
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Single Property -->
                    @endforeach

                </div>
            </div>



            <div id="list-layout" style="display: none;">
                <!-- Liste yapısı -->
                <div class="row gx-3 gy-4">

                    @foreach ($houses as $house)
                        @php
                            $housephotos = $house->housePhotos;
                        @endphp
                        <!-- Single Property -->
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="veshm-list-prty">
                                <div class="veshm-list-prty-figure">
                                    <div class="veshm-list-img-slide">
                                        <div class="veshm-list-click">
                                            @foreach ($housephotos as $housephoto)
                                                <div><a href="{{ route('house.details', $house->slug) }}"><img
                                                            src="{{ asset($housephoto->photo) }}" class="img-fluid mx-auto"
                                                            alt=""></a></div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>



                                <div class="veshm-list-prty-caption">
                                    <div class="veshm-list-kygf">
                                        <div class="veshm-list-kygf-flex">


                                            @if ($house->status == 'Sale')
                                                <div class="veshm-list-typess"><span>Satılık</span></div>
                                            @else
                                                <div class="veshm-list-typess rent"><span>Kiralık</span></div>
                                            @endif



                                            <h5 class="rlhc-title-name verified"><a
                                                    href="{{ route('house.details', $house->slug) }}"
                                                    class="prt-link-detail">{{ $house->title }}</a></h5>
                                        </div>

                                    </div>
                                    <div class="veshm-list-middle">
                                        <div class="veshm-list-icons">
                                            <ul>
                                                <li><i class="fa-solid fa-bed"></i><span>{{ $house->bedroom }} Oda</span>
                                                </li>
                                                <li><i class="fa-solid fa-bath"></i><span>{{ $house->bathroom }}
                                                        Banyo</span>
                                                </li>
                                                <li><i class="fa-solid fa-vector-square"></i><span>{{ $house->squaremeters }}
                                                        m²</span></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="veshm-list-footers">
                                        <div class="veshm-list-ftr786">
                                            <div class="rlhc-price">
                                                @if ($house->status == 'Sale')
                                                    <h4 class="rlhc-price-name theme-cl">
                                                        {{ $house->price }} TL
                                                    </h4>
                                                @else
                                                    <h4 class="rlhc-price-name theme-cl"> {{ $house->price }} TL<span
                                                            class="monthly">/Aylık</span>
                                                    </h4>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>






        </div>
    </section>
    <!-- ============================ All Property ================================== -->
@endsection
