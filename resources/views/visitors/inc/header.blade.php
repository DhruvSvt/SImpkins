<header class="header-area header-three">
    <div id="header-sticky" class="menu-area">
        <div class="container">
            <div class="second-menu">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3">
                        <div class="logo">
                            <a href="/"><img src="{{ config('app.url') }}visitors/assets/img/logo/logo.png"
                                    alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div class="main-menu text-right text-xl-right">
                            <nav class="nav-menu-top-wrapper w-nav-menu d-none d-lg-block mt-1">
                                <ul>

                                    <li><a href="{{ config('app.url') }}visitors/assets/doc/NOTI-1.pdf"
                                            target="_blank">Mandatory Public
                                            Disclosure</a></li>

                                    <li><a href="#"><i class="icon fal fa-lock"></i> Login</a></li>
                                    <li><a href="admission-enquiry.html"><i class="icon fal fa-envelope"></i>
                                            Admission Enquiry</a></li>
                                    <li><a href="contact.html"><i class="icon fal fa-phone-office"></i> Contact
                                            Us</a></li>
                                </ul>
                            </nav>
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    @php
                                        $menus = App\Models\Menu::get();
                                    @endphp
                                    @foreach ($menus as $menu)
                                        <li class="has-sub">
                                            <a href="javascript:void(0)">{{ $menu->name }}</a>
                                            @if (isset($menu->pages) && count($menu->pages) > 0)
                                                <ul>
                                                    @foreach ($menu->pages as $page)
                                                        <li><a href="/{{ $page->slug }}"> {{ $page->page_name }} </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                    {{-- <li class="has-sub">
                                        <a href="qeducato/blog.html">Resources</a>
                                        <ul>
                                            <li><a href="gallery.html"> Photo Gallery </a></li>
                                            <li><a href="notice.html"> Latest Notice</a></li>
                                            <li><a href="events.html">Upcoming Events </a></li>
                                        </ul>
                                    </li> --}}
                                    <li><a class="book_tour" href="{{ route('visitor.contact') }}">Book A Tour</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
