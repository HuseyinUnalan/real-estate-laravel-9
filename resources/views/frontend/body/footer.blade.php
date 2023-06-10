<!-- ============================ Call To Action ================================== -->
<section class="bg-cover call-action-container dark"
    style="background:#065eb5 url(assets/img/footer-bg-dark.png)no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">

                <div class="call-action-wrap">
                    <div class="call-action-caption">
                        <h2 class="text-light">Daha Fazla Bilgi Almak İçin Bizi Arayın.</h2>
                        <p class="text-light">
                            İsteklerinizi ve talepleriniz hemen bizi arayarak iletebilirsiniz. Ekibmiz sizlere en
                            kaliteli hizmeti sunmak için burada.
                        </p>
                    </div>
                    <a href="tel:{{ $settings->phone }}" class="btn btn-success">Hemen Arayın</a>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Call To Action End ================================== -->
<footer class="skin-light-footer">
    <div>
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-4">
                    <div class="footer-widget">
                        <img src="{{ asset($settings->logo) }}" class="img-footer" alt="">
                        <div class="footer-add">
                            <p>
                                {!! Str::limit($abouts->home_description, 140) !!}
                            </p>
                            <a href="{{ route('home.about') }}">Devamını Oku</a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="footer-widget">
                        <div class="footer-add">
                            <p>{{ $settings->address }}</p>
                            <a href="tel:{{ $settings->phone }}">
                                <p><span class="ftp-info" style="box-sizing: content-box !important;"><i
                                            class="fa fa-phone" aria-hidden="true"></i>
                                        {{ $settings->phone }}</span></p>
                            </a>

                            <a href="mailto:{{ $settings->mail }}">
                                <p><span class="ftp-info" style="box-sizing: content-box !important;"><i
                                            class="fa fa-envelope" aria-hidden="true"></i>{{ $settings->mail }}</span>
                                </p>
                            </a>

                        </div>

                    </div>
                </div>

                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget">
                        <h4 class="widget-title">Hızlı Linkler</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ route('home.house') }}">İlanlar</a></li>
                            <li><a href="{{ route('home.about') }}">Hakkımızda</a></li>
                            <li><a href="{{ route('home.contact') }}">İletişim</a></li>
                            <li><a href="{{ route('home.blog') }}">Blog</a></li>
                            <li><a href="{{ route('home.faq') }}">SSS</a></li>
                        </ul>
                    </div>
                </div>

                @php
                    $blogs = DB::table('blogs')
                        ->limit(5)
                        ->get();
                @endphp

                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget">
                        <h4 class="widget-title">Bloglar</h4>
                        <ul class="footer-menu">
                            @foreach ($blogs as $blog)
                                <li><a href="{{ url('blog/details', $blog->slug) }}">{{ $blog->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">




                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-12 col-md-12">
                        <p class="mb-0">
                            © 2023 Tüm Hakları Saklıdır.
                            <a href="" target="_blank">
                                By <img src="{{ asset('upload/seyyar-developer.png') }}"
                                    style="width: 120px; max-width: 100%; height:auto;" alt="Seyyar Developer">
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
</footer>
