   @section('title')
       {{ $settings->title }}
   @endsection

   @extends('frontend.main_master')
   @section('content')
       {{-- {{ asset('frontend/') }} --}}
       <!-- ============================ Hero Banner  Start================================== -->
       @foreach ($sliders as $slider)
           <div class="image-bg hero-header" style="background:#2540a2 url({{ asset($slider->photo) }}) no-repeat;"
               data-overlay="0">
               <div class="container">
                   <div class="row justify-content-center">
                       <div class="col-lg-9 col-md-11 col-sm-12">
                           <div class="inner-banner-text text-center">
                               <h1>{{ $slider->title }}</h1>
                           </div>

                           <form action="{{ route('search.house') }}" method="POST">
                               @csrf
                               <div class="search-from-clasic mt-5">
                                   <div class="hero-search-content">
                                       <div class="row">

                                           <div class="col-xl-10 col-lg-10 col-md-9 col-sm-12">
                                               <div class="classic-search-box">

                                                   <div class="form-group full">
                                                       <div class="input-with-icon">
                                                           <input type="text" name="serachkeyword" class="form-control"
                                                               placeholder="Ev Arayın">
                                                           <img src="{{ asset('frontend/assets/img/pin.svg') }}"
                                                               width="20" alt="">
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>

                                           <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                                               <div class="form-group">
                                                   <button type="submit" class="btn btn-primary full-width">Ara</button>
                                               </div>
                                           </div>

                                       </div>
                                   </div>
                               </div>
                           </form>

                       </div>
                   </div>
               </div>
           </div>
       @endforeach
       <!-- ============================ Hero Banner End ================================== -->

       <!-- ============================ Our Partners Start ================================== -->
       <section class="gray-simple min">
           <div class="container">

               <div class="row justify-content-center">
                   <div class="col-lg-7 col-md-10 text-center">
                       <div class="sec-heading center mb-4">
                           <h4>İş Ortaklarımız</h4>
                       </div>
                   </div>
               </div>

               <div class="row">
                   <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                       <div class="brand-slide" id="brand-slide">

                           @foreach ($clients as $client)
                               <div class="single-brand">
                                   <figure class="thumb-figure">
                                       <img src="{{ $client->photo }}" class="img-fluid" alt="">
                                   </figure>
                               </div>
                           @endforeach



                       </div>
                   </div>
               </div>

           </div>
       </section>
       <div class="clearfix"></div>
       <!-- ============================ Our Partners End ================================== -->

       <!-- ============================ Latest Property For Sale Start ================================== -->
       <section class="mid">
           <div class="container">

               <div class="row justify-content-center">
                   <div class="col-lg-8 col-md-10 text-center">
                       <div class="sec-heading center mb-4">
                           <h2>Öne Çıkan İlanlarımız</h2>
                       </div>
                   </div>
               </div>

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
                                                       class="prt-link-detail"> {{ $house->title }}
                                               </h5></a>
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
       </section>
       <!-- ============================ Latest Property For Sale End ================================== -->

       <!-- ============================ Better Services ================================== -->
       @include('frontend.body.service_section')
       <!-- ============================ Better Services ================================== -->



       <!-- ============================ Good Reviews By Customers ================================== -->
       @include('frontend.body.testimonial_section')
       <!-- ============================ Good Reviews By Customers ================================== -->
   @endsection
