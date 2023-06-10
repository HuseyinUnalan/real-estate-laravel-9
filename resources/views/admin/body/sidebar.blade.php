<div class="vertical-menu">
    <div data-simplebar class="h-100">



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="far fa-image"></i>
                        <span>Ev İşlemleri</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.house') }}">Evler</a></li>
                        <li><a href="{{ route('add.house') }}">Ev Ekle</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="far fa-image"></i>
                        <span>Slider İşlemleri</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.slider') }}">Slider Listesi</a></li>
                        <li><a href="{{ route('add.slider') }}">Slider Ekle</a></li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shield-user-line"></i>
                        <span>Hakkımzda İşlemleri</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('edit.about') }}">Hakkımzda Sayfası</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-settings-3-line"></i>
                        <span>Site Ayarları</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('settings.edit') }}">Site Genel Ayarları</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-honour-line"></i>
                        <span>Hizmet İşlemleri</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.service') }}">Hizmet Listesi</a></li>
                        <li><a href="{{ route('add.service') }}">Hizmet Ekle</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pen-nib-fill"></i>
                        <span>Blog İşlemleri</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.blog') }}">Blog Listesi</a></li>
                        <li><a href="{{ route('add.blog') }}">Blog Ekle</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-plus"></i>
                        <span>Müşteri Yorumları</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.testimonial') }}">Müşteri Yorum Listesi</a></li>
                        <li><a href="{{ route('add.testimonial') }}">Müşteri Yorum Ekle</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-team-line"></i>
                        <span>Referans İşlemleri</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.client') }}">Referans Listesi</a></li>
                        <li><a href="{{ route('add.client') }}">Referans Ekle</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-question"></i>
                        <span>SSS İşlemleri</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.faq') }}">SSS Listesi</a></li>
                        <li><a href="{{ route('add.faq') }}">SSS Ekle</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="far fa-thumbs-up"></i>
                        <span>Sosyal Medya İşlemleri</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.social') }}">Sosyal Medya Listesi</a></li>
                        <li><a href="{{ route('add.social') }}">Sosyal Medya Ekle</a></li>
                        <li><a href="{{ route('all.icon') }}">İkonlar</a></li>
                    </ul>
                </li>



                <hr>

                @php
                    $message = DB::table('messages')
                        ->where('read_status', 0)
                        ->count();
                @endphp

                <li>
                    <a href="{{ route('all.message') }}" class=" waves-effect">
                        <i class="fas fa-envelope"></i>
                        <span>Mesajlar</span>
                        @if ($message > 0)
                            @php
                                $unread = $message;
                            @endphp
                            <span class="badge rounded-pill bg-success float-end">{{ $message }}</span>
                        @else
                        @endif
                    </a>
                </li>


                @php
                    $housemessage = DB::table('house_messages')
                        ->where('read_status', 0)
                        ->count();
                @endphp

                <li>
                    <a href="{{ route('all.house.message') }}" class=" waves-effect">
                        <i class="fas fa-envelope"></i>
                        <span>Ev Mesajları</span>
                        @if ($housemessage > 0)
                            @php
                                $unread = $housemessage;
                            @endphp
                            <span class="badge rounded-pill bg-success float-end">{{ $housemessage }}</span>
                        @else
                        @endif
                    </a>
                </li>

                <li>
                    <a href="{{ route('calendar') }}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Takvim</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('todo') }}" class=" waves-effect">
                        <i class="fas fa-list-ol"></i>
                        <span>Yapılacaklar Listesi</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('all.icon') }}" target="_blank">
                        <i class="fas fa-icons"></i>
                        <span>İkonlar</span>
                    </a>

                </li>

                <li>
                    <a href="{{ route('/') }}" target="_blank">
                        <i class="ri-earth-fill"></i>
                        <span>Web Site</span>
                    </a>

                </li>




                {{-- 
              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-mail-send-line"></i>
                      <span>Home Slide Setup</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="{{ route('home.slide') }}">Home Slide</a></li>
                  </ul>
              </li>

              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-mail-send-line"></i>
                      <span>About Page Setup</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="{{ route('about.page') }}">About Page</a></li>
                      <li><a href="{{ route('about.multi.image') }}">About Multi Image</a></li>
                      <li><a href="{{ route('all.multi.image') }}">All Multi Image</a></li>
                  </ul>
              </li>


              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-mail-send-line"></i>
                      <span>Portfolio Page Setup</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="{{ route('all.portfolio') }}">All Portfolio</a></li>
                      <li><a href="{{ route('add.portfolio') }}">Add Portfolio</a></li>
                  </ul>
              </li>



              <li>


              <li class="menu-title">Pages</li>

              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-account-circle-line"></i>
                      <span>Blog Category</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="{{ route('all.blog.category') }}">All Blog Category</a></li>
                      <li><a href="{{ route('add.blog.category') }}">Add Blog Category</a></li>

                  </ul>
              </li>

              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-profile-line"></i>
                      <span>Blog Page</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="{{ route('all.blog') }}">All Blog</a></li>
                      <li><a href="{{ route('add.blog') }}">Add Blog</a></li>
                  </ul>
              </li>


              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-profile-line"></i>
                      <span>Footer Page Setup</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="{{ route('footer.setup') }}">Footer Setup</a></li>
                  </ul>
              </li>

              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ri-profile-line"></i>
                      <span>Contact Message</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="{{ route('contact.message') }}">Contact Message</a></li>
                  </ul>
              </li> --}}



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
