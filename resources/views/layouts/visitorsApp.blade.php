<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ $title ?? 'Welcome to Simpkins School' }}</title>
    <meta name="description"
        content="Providing opportunities to enable young people to be best positioned, consequent to their education" />
    <link rel="canonical" href="https://mdayurvediccollege.in/demo/simpkins" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Welcome to Simpkins School" />
    <meta property="og:description"
        content="Providing opportunities to enable young people to be best positioned, consequent to their education" />
    <meta property="og:url" content="https://mdayurvediccollege.in/demo/simpkins" />
    <meta property="og:site_name" content="Simpkins School" />
    <meta property="og:image" content="https://mdayurvediccollege.in/demo/simpkins/assets/img/features/icon.png" />


    <link rel="shortcut icon" type="image/x-icon"
        href="https://mdayurvediccollege.in/demo/simpkins/assets/img/features/icon.png">
    <meta name="theme-color" content="#40B9EB">
    <meta name="msapplication-TileColor" content="#40B9EB">
    <meta name="msapplication-navbutton-color" content="#40B9EB">
    <meta name="apple-mobile-web-app-status-bar-style" content="#40B9EB">



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ config('app.url') }}visitors/assets/img/features/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
        <!-- Font Awsome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- sweet alert cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="{{ config('app.url') }}visitors/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}visitors/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}visitors/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ config('app.url') }}visitors/assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}visitors/assets/css/dripicons.css">
    <link rel="stylesheet" href="{{ config('app.url') }}visitors/assets/css/slick.css">
    <link rel="stylesheet" href="{{ config('app.url') }}visitors/assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{ config('app.url') }}visitors/assets/css/default.css">
    <link rel="stylesheet" href="{{ config('app.url') }}visitors/assets/css/style.css">
    <link rel="stylesheet" href="{{ config('app.url') }}visitors/assets/css/responsive.css?v=85">
    <!--qeducato-->

</head>

<body>
    <!-- header -->
    @include('visitors.inc.header')
    <!-- header-end -->

    <!-- main-area -->
    @yield('content')
    <!-- main-area-end -->

    <!-- footer -->
    @include('visitors.inc.footer')
    <div class="div-block-189 button-enq tokyo noida-sticky-right-btn">
        <a href="#" class="button-14 enquire w-button" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">Enquire Now</a>
        <a href="{{ route('visitor.contact') }}" class="button-14 book-a-tour-button w-button" target="_blank">BOOK A
            TOUR</a>
    </div>

    <!-- Modal -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2 mb-2 p-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="section-title wow fadeInDown animated" data-animation="fadeInDown" data-delay=".2s">
                            <h2 class="d-inline-block">
                                Make An Enquiry
                            </h2>
                            <div class="d-inline-block" style="float: right;">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <form action="http://127.0.0.1:8000/contact" method="post"
                            class="contact-form mt-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <input type="hidden" name="_token" value="0JA1HsCTNZX0cso4VaaTxgHWdeLM6qxwVV8tuC3F">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-name mb-20">
                                        <input type="text" id="name" name="name" placeholder="Name"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="text" id="email" name="email" placeholder="Email"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="text" id="phone" name="mobile" placeholder="Phone No."
                                            required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-message mb-0">
                                        <textarea name="comments" id="message" cols="30" rows="4" placeholder="Write comments"></textarea>
                                    </div>
                                    <div class="slider-btn">
                                        <button class="btn ss-btn" data-animation="fadeInRight"
                                            data-delay=".8s"><span>Submit Now</span> <i
                                                class="fal fa-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal End -->

    <!-- footer-end -->

    <!-- JS here -->
    <script src="{{ config('app.url') }}visitors/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/popper.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/bootstrap.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/slick.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/paroller.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/wow.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/js_isotope.pkgd.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/imagesloaded.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/parallax.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/jquery.waypoints.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/jquery.scrollUp.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/jquery.meanmenu.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/parallax-scroll.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/element-in-view.js"></script>
    <script src="{{ config('app.url') }}visitors/assets/js/main.js"></script>

</body>

</html>
