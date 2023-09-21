<div style="background:#ffc627">
    <div class="main-menu text-right text-xl-right .mini-header">
        <nav class="nav-menu-top-wrapper w-nav-menu">
            <ul class="first-ul" style="margin-right: 3.2rem;">
                <li><a class="d-none d-md-block" href="{{ config('app.url') }}visitors/assets/doc/NOTI-1.pdf"
                        target="_blank">Mandatory Public
                        Disclosure</a></li>
                <li><a href="#"><i class="icon fal fa-lock"></i> Login</a></li>
                <li><a href="admission-enquiry.html"><i class="icon fal fa-envelope"></i>
                        Admission Enquiry</a></li>
                <li><a href="contact.html"><i class="icon fal fa-phone-office"></i> Contact
                        Us</a></li>
                {{-- <li><a class="book_tour" href="{{ route('visitor.contact') }}">Book A Tour</a></li> --}}
            </ul>
        </nav>
    </div>
</div>
<header class="header-area header-three">
    <div class="menu-area">

        <div class="row">
            <div class="col-lg-2 col-12 text-center d-flex">
                <a href="" class="m-auto">
                    <img loading="lazy" src="{{ config('app.url') }}visitors/assets/img/logo/simpkins_logo.jpg"
                        alt="logo" style="height: 94px;width: 106px;" aspect-ratio: 409/512">
                </a>
            </div>
            <div class="col-lg-8 col-12">

                <div class="text-center mt-10">

                    <h2 class="d-inline w-100 simpkins" style="font-size: 2.2rem">
                        Simpkins School
                    </h2>
                    <p class=".address{" style="font-size: 0.7rem;">
                        (Maruti Estate, Bodla Road, Shahganj, Agra, U.P – 282010)
                    </p>
                    <p class="address" style="text-transform: uppercase; font-size: 0.74rem">
                        Affiliated to central board of secondary education, New Delhi
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-12 text-center d-flex ">
                <div class="m-auto">
                    <?php
                    date_default_timezone_set('Asia/Kolkata'); // Set the timezone to India (Asia/Kolkata)
                    ?>
                    <p class=".address{" style="font-size: 0.7rem;">
                        CBSE Affiliation No. 1234567<br>
                        Date : <?= date('Y-m-d') ?><br>
                        Current Time: <?php echo date('H:i:s'); ?>
                    </p>
                </div>
            </div>
        </div>

    </div>
</header>
<div class="menu-area">
    <div class="second-menu">
        <div class="row align-items-center" style="background: #ffc627">

            <div class="main-menu text-left text-xl-right masonry-gallery-huge">
                <nav id="mobile-menu">
                    <ul>
                        <li>
                            <a href="/">
                                <i class="fa fa-home" aria-hidden="true" style="color:#fff; font-size: 18px;"></i>
                            </a>
                        </li>
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
                    </ul>
                </nav>
            </div>
            <div class="col-12">
                <div class="mobile-menu"></div>
            </div>
        </div>
    </div>

</div>
