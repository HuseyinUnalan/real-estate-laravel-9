@php
    $route = Route::current()->getName();
@endphp
<div class="header header-light head-shadow">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ route('/') }}">
                    <img src="{{ asset($settings->logo) }}" class="logo" alt="">
                </a>
                <div class="nav-toggle"></div>
                {{-- <div class="mobile_nav">
                    <ul>
                        <li class="list-buttons">
                            <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i
                                    class="fas fa-sign-in-alt me-2"></i>Log In</a>
                        </li>
                    </ul>
                </div> --}}
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li class="{{ $route == '/' ? 'active' : '' }}"><a href="{{ route('/') }}">Anasayfa<span
                                class="submenu-indicator"></span></a>
                    </li>

                    <li class="{{ $route == 'home.house' ? 'active' : '' }}"><a
                            href="{{ route('home.house') }}">İlanlar<span class="submenu-indicator"></span></a>
                    </li>

                    <li class="{{ $route == 'home.about' ? 'active' : '' }}"><a
                            href="{{ route('home.about') }}">Hakkımızda<span class="submenu-indicator"></span></a>
                    </li>

                    <li class="{{ $route == 'home.blog' ? 'active' : '' }}"><a href="{{ route('home.blog') }}">Blog<span
                                class="submenu-indicator"></span></a>
                    </li>

                    <li class="{{ $route == 'home.faq' ? 'active' : '' }}"><a href="{{ route('home.faq') }}">SSS<span
                        class="submenu-indicator"></span></a>
            </li>

                    <li class="{{ $route == 'home.contact' ? 'active' : '' }}"><a
                            href="{{ route('home.contact') }}">İletişim<span class="submenu-indicator"></span></a>
                    </li>

                </ul>

{{-- 
                <ul class="nav-menu nav-menu-social align-to-right">
                    <li class="list-buttons light">
                        <a href="JavaScript:Void(0);"><i class="fa fa-language me-2"></i>Dil</a>
                    </li>

                </ul> --}}
            </div>
        </nav>
    </div>
</div>
