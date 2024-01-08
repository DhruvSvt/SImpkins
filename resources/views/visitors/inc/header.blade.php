<div style="background:#ffc627">
    <div class="main-menu text-right text-xl-right .mini-header">
        <nav class="nav-menu-top-wrapper w-nav-menu">
            <div style="display:flex">
                <div style="width:58%;">
                    <marquee width="100%" behavior="alternate" style="
                    color: red;
                    vertical-align: bottom;
                    font-weight: bold;">
                        Admission Open for 2024 - 25
                    </marquee>
                </div>
                <div style="width:auto;">
                    <ul class="first-ul" style="margin-right: 5.2rem;width:max-content;">
                        <li>
                            <a class="d-none d-md-block" href="{{ config('app.url') }}visitors/assets/doc/NOTI-1.pdf"
                                target="_blank">Mandatory Public
                                Disclosure</a>
                        </li>
                        <li>
                            <a href="{{ config('app.url') }}dashboard">
                                <i class="icon fal fa-lock"></i> ERP Login</a>
                        </li>
                        <li>
                            <a href="{{ config('app.url') }}admission"><i class="icon fal fa-envelope"></i>
                                Admission Enquiry</a>
                        </li>
                        <li>
                            <a href="/{{ 'contact' }}"><i class="icon fal fa-phone-office"></i> Contact Us</a>
                        </li>
                        {{-- <li><a class="book_tour" href="{{ route('visitor.contact') }}">Book A Tour</a></li> --}}
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<header class="header-area header-three">
    <div class="menu-area">

        <div class="row">
            <div class="col-lg-2 col-12 text-center d-flex">
                <a href="/" class="m-auto">
                    <img loading="lazy" src="{{ config('app.url') }}visitors/assets/img/logo/simpkins_logo.jpg"
                        alt="logo" style="height: 94px;width: 106px;" aspect-ratio: 409/512">
                </a>
            </div>
            <div class="col-lg-8 col-12">

                <div class="text-center mt-10">

                    <h2 class="d-inline w-100 simpkins" style="font-size: 2.2rem">
                        SIMPKINS SCHOOL
                    </h2>
                    <p style="font-size: 12px;
                    line-height: 1.5;
                    color: #404040;
                    font-weight: 600;    margin-bottom: 2px;">
                        (Maruti Estate, Bodla Road, Shahganj, Agra, U.P – 282010)
                    </p>
                    <p class="address"
                        style="text-transform: uppercase;font-size: 0.90rem;color: black;font-weight: bolder;">
                        Affiliated to central board of secondary education, New Delhi
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-12 text-center d-flex ">
                <div class="m-auto">
                    <?php
                    date_default_timezone_set('Asia/Kolkata'); // Set the timezone to India (Asia/Kolkata)
                    ?>
                    <p style="font-size: 12px;
                    line-height: 1.5;
                    color: #646464;
                    font-weight: 600;">
                        CBSE Affiliation No. 2130149<br>
                        School Code : 60063<br>
                        Date :
                        <?= date('d-F-y') ?><br>
                        Current Time : <span id="current-time">Loading...</span>
                    </p>
                </div>
            </div>
        </div>

    </div>
</header>
<div class="menu-area" style="background: #ffc627">
    <div class="second-menu">
        <div class="row align-items-center" style="background: #ffc627">

            <div class="main-menu text-left text-xl-right masonry-gallery-huge">
                <nav id="mobile-menu">
                    <ul>
                        <li>
                            <a href="/">
                                <i class="fa fa-home" aria-hidden="true" style="color:black; font-size: 18px;"></i>
                            </a>
                        </li>
                        @php
                        $menus = App\Models\Menu::get();
                        @endphp
                        @foreach ($menus as $menu)
                        @php $pages = $menu->pages; @endphp
                        <li class="has-sub" @if($menu->order == 4) style="position:relative" @endif>
                            @if($menu->order == 4)
                            <div class="new-admission">
                                NEW
                            </div>
                            @endif
                            <a href="javascript:void(0)">{{ $menu->name }}</a>
                            @if (isset($pages) && count($pages) > 0)
                            <ul>
                                @foreach ($pages as $page)
                                <li><a href="/{{ $page->slug }}"> {{ $page->page_name }} </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                        <li>
                            <a href="/contact">
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('alumnai.create') }}">
                                Alumni Registration
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-12">
                <div class="mobile-menu"></div>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to update the time
    function updateTime() {
        const currentTimeElement = document.getElementById('current-time');
        const currentTime = new Date().toLocaleTimeString();
        currentTimeElement.textContent = currentTime;
    }

    // Update the time initially and set an interval to update it every second
    updateTime();
    setInterval(updateTime, 1000); // Update every 1 second (1000 milliseconds)
</script>
