@extends('layouts.visitorsApp')
@section('content')
    <!-- main-area -->
    <div class="splash-container">
        <img src="{{ config('app.url') }}visitors/assets/img/features/icon.png" alt="">
        <div class="school-name">Simpkins</div>
    </div>
    <main>

        <section id="home" class="slider-area fix p-relative">

            {{-- <div class="slider-active" style="background: #141b22;">
            <div class="single-slider slider-bg"
                style="background-image:linear-gradient(rgba(2,2,2,0) 38%,#000 100%,rgba(1,1,1,.66))">
                <video autoplay="" muted="" loop="" playsinline="" class="fixed-background" preload="auto">
                    <source src="{{ config('app.url') }}visitors/assets/video/demo_video.mp4" type="video/mp4"
                        style="background-size: cover">
                </video>
                <div class="container">
                    <div class="row justify-content-md-center">

                        <div class="col-lg-7 text-center">
                            <div class="slider-content s-slider-content mt-130">

                                <h5 data-animation="fadeInUp" data-delay=".4s">LEADING CBSE SCHOOL IN Agra</h5>
                                <p data-animation="fadeInUp" data-delay=".6s">Trained Educators to channelize
                                    Students energy and resources </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-bg"
                style="background-image:linear-gradient(rgba(2,2,2,0) 38%,#000 100%,rgba(1,1,1,.66)),url({{ config('app.url') }}visitors/assets/img/slider/photo.jpeg); background-size: cover;">
                <div class="container">
                    <div class="row justify-content-md-center">

                        <div class="col-lg-7 text-center">
                            <div class="slider-content s-slider-content mt-130">
                                <h5 data-animation="fadeInUp" data-delay=".4s">welcome To Simpkins School</h5>

                                <p data-animation="fadeInUp" data-delay=".6s">Trained Educators to channelize
                                    Students energy and resources </p>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div> --}}
            <!-- Background video -->
            <div class="video-background-holder">
                <div class="video-background-overlay" style="    background-size: cover;background: url({{  config('app.url')  }}visitors/assets/img/bg/banner.jpg);">
                    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" preload="auto">
                        <source src="{{ config('app.url') }}visitors/assets/video/Zenith1Trim.mp4" type="video/mp4">
                    </video>
                    {{-- <iframe src="https://www.youtube.com/embed/ql7TjZuRzQM?si=WnxgzXQFNf9f7A_B" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
                </div>
                <div class="video-background-content container h-100">
                    <div class="d-flex h-100 text-center align-items-center">
                        {{-- <div class="w-100 text-white">
                        <h1 class="text-white">Repeatedly ranked #1</h1>
                        <p class="lead mb-0">Simpkins School is located in the heart of the historical city of Agra. The
                            school was founded three decades<br> back with a commitment to excellence and for<br>
                            providing
                            opportunities to enable young people<br> to be best positioned, consequent to their
                            education.
                        </p>
                    </div> --}}
                    </div>
                </div>
            </div>
            <!-- End -->

        </section>
        <!-- slider-area -->


        <!-- about-area -->
        <section class="about-area about-p pt-60 pb-60 p-relative fix" >
            <div class="animations-02"><img src="{{ config('app.url') }}visitors/assets/img/bg/an-img-02.png"
                    alt="contact-bg-an-01"></div>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-content s-about-content pl-15 wow fadeInRight  animated mb-5"
                            data-animation="fadeInRight" data-delay=".4s">
                            <div class="about-title second-title pb-15">

                                <h2>Welcome to Simpkins School in Agra</h2>
                            </div>
                            <p class="txt-clr">‘If your plan is for one year, plant rice; If your plan is for ten years,
                                plant trees; If your plan is for a hundred years, Educate children.’- Confucius
                                Simpkins School is located in the heart of the historical city of Agra. The school was
                                founded three decades back with a commitment to excellence and for providing
                                opportunities to enable young people to be best positioned, consequent to their
                                education. Today, we have grown into one of the city’s leading institutions with
                                branches across the city, providing quality education to our students, facilitated by
                                dedicated educators who are trained to channelize their energy and resources towards
                                child-centered qualitative learning. The school follows the CBSE curriculum and runs
                                from classes Pre Nursery to 12th. This day-school is co-educational and the medium of
                                instruction here is English. School Session runs from April to March.</p>


                        </div>
                    </div>

                    {{-- <div id="thank_you" style="display: none; text-align: center;">
                    <h2>Thank You!</h2>
                    <p>Your form has been submitted successfully.</p>
                </div> --}}
                    <div class="offset-lg-1 col-lg-5 col-md-12 col-sm-12">
                        <div class="row justify-content-center align-items-center">
                            <div class="section-title wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                                <h2>
                                    Make An Enquiry
                                </h2>
                            </div>
                            <form action="{{ route('visitor.contact') }}" method="post"
                                class="contact-form mt-30 wow fadeInUp animated" id="my_form" data-animation="fadeInUp"
                                data-delay=".4s">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-name mb-20">
                                            <input type="text" id="name" name="name" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-subject mb-20">
                                            <input type="text" id="email" name="email" placeholder="Email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-subject mb-20">
                                            <input type="text" id="phone" name="mobile" placeholder="Phone No."
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-message mb-0">
                                            <textarea name="comments" id="message" cols="30" rows="4" placeholder="Write comments"></textarea>
                                        </div>
                                        <div class="slider-btn">
                                            <button type="submit" class="btn ss-btn" data-animation="fadeInRight"
                                                data-delay=".8s"><span>Submit Now</span> <i
                                                    class="fal fa-angle-right"></i></button>
                                        </div>
                                        {{-- <div id="thank_you" style="display: none;">
                                        <img src="{{ config('app.url')}}visitors/assets/img/thanks.png" width="550"
                                            height="400" srcset="">
                                    </div> --}}
                                    </div>
                                </div>
                            </form>

                            <!-- Thanku popup -->
                            {{-- @if (Session::has('success'))
                        <script>
                            swal("Response", "{{ Session::get('success') }}", 'success', {
                            title: "<i>Thank You !</i>",
                            html: "We've Reach Out to you Soon",
                            confirmButtonText: "<u>Ok</u>",
                        });
                        </script>
                        @endif

                        @if (Session::has('error'))
                        <script>
                            swal("Response", "{{ Session::get('error') }}", 'error', {
                            title: "<i>Error</i>",
                            confirmButtonText: "<u>Ok</u>",
                        });
                        </script>
                        @endif --}}



                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- about-area-end -->
        <section class="steps-area p-relative" style="background-color: #ffc627;">
            <div class="animations-10"><img src="{{ config('app.url') }}visitors/assets/img/bg/an-img-10.png"
                    alt="an-img-01"></div>
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="section-title mb-35 wow fadeInDown animated" data-animation="fadeInDown"
                            data-delay=".4s">
                            <h2 style="color: black;">Why Simkins is the best school for your child</h2>

                        </div>
                        <ul class="pr-20">
                            <li>
                                <div class="step-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                    <div class="dnumber">
                                        <div class="date-box"><img
                                                src="{{ config('app.url') }}visitors/assets/img/features/6094dedbd09b7e7e99655d08_pointer-icon.png"
                                                alt="icon"></div>
                                    </div>
                                    <div class="text">
                                        <h3 style="color: black;">Best Teachers</h3>
                                        <p style="color: black;font-size: 17px;">Each of our teacher is well qualified & trained so that they can do justice
                                            while delivering a world class curriculum.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="step-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                    <div class="dnumber">
                                        <div class="date-box"><img
                                                src="{{ config('app.url') }}visitors/assets/img/features/6094dedbd09b7e7e99655d08_pointer-icon.png"
                                                alt="icon"></div>
                                    </div>
                                    <div class="text">
                                        <h3 style="color: black;">Activity Based Learning</h3>
                                        <p style="color: black;font-size: 17px;">Convert every class to a lab. All our learning happens in experiential
                                            learning mode.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="step-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                    <div class="dnumber">
                                        <div class="date-box"><img
                                                src="{{ config('app.url') }}visitors/assets/img/features/6094dedbd09b7e7e99655d08_pointer-icon.png"
                                                alt="icon"></div>
                                    </div>
                                    <div class="text">
                                        <h3 style="color: black;">Safety & Security</h3>
                                        <p style="color: black;font-size: 17px;"> Students are safeguarded to the best and taken utmost care with measures
                                            like 24/7 guardhouse, CCTV cameras, and more.</p>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="step-img wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                            <img src="{{ config('app.url') }}visitors/assets/img/slider/photo1).jpeg" alt="class image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- courses-area -->

        {{-- <section class="about-area about-p pt-90 pb-90 p-relative fix"
            style="background-image: url({{ config('app.url') }}visitors/assets/img/features/6094de56e25239dee2b95d18_stars.png),none,none; background-position: 96% 262px,8px 250px,10px 40px;background-repeat: no-repeat;">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft"
                            data-delay=".4s">
                            <img src="{{ config('app.url') }}visitors/assets/img/features/GALL-51.jpg" alt="img">

                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-5 col-md-12 col-sm-12">
                        <div class="about-content s-about-content pl-15 wow fadeInRight  animated"
                            data-animation="fadeInRight" data-delay=".4s">
                            <div class="about-title second-title pb-25">
                                <h2>Global Culture Community</h2>
                            </div>
                            <p class="txt-clr">Our community is being called to reimagine the future. As the only
                                university where a renowned design school comes together with premier colleges, we are
                                making learning more relevant and transformational.</p>
                            <p class="txt-clr">At Estuidar University, we prepare you to launch your career by pro
                                supportive, creative, and professional environment from contacts.</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-100">
                <div class="row justify-content-center mt-3 align-items-center">

                    <div class="col-lg-5 col-md-12 col-sm-12 mt-3">
                        <div class="about-content s-about-content pl-15 wow fadeInRight  animated"
                            data-animation="fadeInRight" data-delay=".4s">
                            <div class="about-title second-title pb-25">
                                <h2>Award Winning Institution - Simpkins</h2>
                            </div>
                            <p class="txt-clr">Our community is being called to reimagine the future. As the only
                                university where a renowned design school comes together with premier colleges, we are
                                making learning more relevant and transformational.</p>
                            <p class="txt-clr">At Simpkins University, we prepare you to launch your career by pro
                                supportive, creative, and professional environment from which to learn practical skills,
                                build a network of industry contacts.</p>

                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-6 col-md-12 col-sm-12">
                        <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft"
                            data-delay=".4s">
                            <img src="{{ config('app.url') }}visitors/assets/img/features/GALL-52.jpg" alt="img">

                        </div>
                        <img src="{{ config('app.url') }}visitors/assets/img/features/609507dc6ac5fd7a99c02759_spiral-bulb-png.png"
                            loading="lazy" alt="" class="choose-cbse" style="position: absolute;right: 74px;">
                    </div>
                </div>
            </div>
        </section> --}}


        <!-- frequently-area -->
        {{-- <section class="faq-area pt-90 pb-90 p-relative fix">
        <div class="animations-10"><img src="{{ config('app.url') }}visitors/assets/img/bg/an-img-04.png"
                alt="an-img-01"></div>
        <div class="animations-08"><img src="{{ config('app.url') }}visitors/assets/img/bg/an-img-05.png"
                alt="contact-bg-an-01"></div>
        <div class="container">
            <div class="row justify-content-center  align-items-center">
                <div class="col-lg-7">
                    <div class="section-title wow fadeInLeft animated" data-animation="fadeInDown animated"
                        data-delay=".2s">
                        <div class="mb-5 link-card-colorful sign-up-form">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Latest Notice</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Upcoming Events<img
                                            src="https://mdayurvediccollege.in/demo/vtedu/assets/frontend/default/img/new_icon_blink.gif"
                                            width="20"></button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                @if ($notices && count($notices) > 0)
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <marquee behavior="scroll" direction="up" scrollamount="4"
                                        style="height: 309px;    overflow-y: auto;" onmouseover="this.stop()"
                                        onmouseout="this.start()">
                                        <ul class="mCSB_container">
                                            @foreach ($notices as $notice)
                                            <li class="notification">
                                                <a href="{{ config('app.url') }}storage/{{ $notice->link }}"
                                                    target="_blank">
                                                    {{ $notice->title }}
                                                    @if ($notice->is_new)
                                                    <img src="https://mdayurvediccollege.in/demo/vtedu/assets/frontend/default/img/new_icon_blink.gif"
                                                        width="20">
                                                    @endif
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </marquee>
                                </div>
                                @endif
                                @if ($events && count($events) > 0)
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <marquee behavior="scroll" direction="up" scrollamount="4"
                                        style="height: 309px;    overflow-y: auto;" onmouseover="this.stop()"
                                        onmouseout="this.start()">
                                        <ul class="mCSB_container">
                                            @foreach ($events as $event)
                                            <li class="notification">
                                                <a href="{{ config('app.url') }}storage/{{ $notice->link }}"
                                                    target="_blank">
                                                    {{ $event->title }}
                                                    @if ($event->is_new)
                                                    <img src="https://mdayurvediccollege.in/demo/vtedu/assets/frontend/default/img/new_icon_blink.gif"
                                                        width="20">
                                                    @endif
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </marquee>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="contact-bg02">
                        <div class="section-title wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                            <h2>
                                Make An Enquiry
                            </h2>
                        </div>
                        <form action="{{ route('visitor.contact') }}" method="post"
                            class="contact-form mt-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-name mb-20">
                                        <input type="text" id="name" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="text" id="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="text" id="phone" name="mobile" placeholder="Phone No." required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-message mb-0">
                                        <textarea name="comments" id="message" cols="30" rows="10"
                                            placeholder="Write comments"></textarea>
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
    </section> --}}
        <!-- frequently-area-end -->
        <!-- video-area -->

        <!-- Aluminai Cards Start -->
        <div class="container  center-container">
            <h2 class="text-center m-4" style="visibility: visible;">
                Our Alumni</h2>
            <div class="row">
                <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-1 g-3">
                    @foreach ($aluminais as $alu)
                        <div class="card" style="border: none;">
                            <img src="{{ config('app.url') }}storage/{{ $alu->image }}" class="card-img-top"
                                alt="img" />
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $alu->description }}
                                </p>
                                <h5 class="card-title">{{ $alu->name }}</h5>
                                <p class="card-text">{{ $alu->std_title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>`
        </div>
        <!-- Aluminai Cards Start -->
        <div class="white-curve-main top"></div>
        <div class="stats-main-div">
            {{-- <div class="main-stats-wrapper">
                <div>
                    <h3 class="counter main-stats">4</h3>
                    <h4 class="stats-caption">Campus</h4>
                </div>
                <div>
                    <div class="hor-div-3 centre-align">
                        <h3 class="counter main-stats">1.5k+</h3>
                    </div>
                    <h4 class="stats-caption">Active Students</h4>
                </div>
                <div id="w-node-_2be81a79-976a-16ed-c2f4-7f0694264efe-2207cad4">
                    <div class="hor-div-3 centre-align">
                        <h3 class="counter main-stats">100+</h3>
                    </div>
                    <h4 class="stats-caption">Faculty</h4>
                </div>
                <div>
                    <h3 class="counter main-stats">20k+</h3>
                    <h4 class="stats-caption">Alumni</h4>
                </div>
            </div> --}}
        </div>
        <div class="white-curve-main"></div>
        <!-- Success Story Cards Start -->
        <div
            class="block-inline-blockasu-edu-anim-content-buttons bg white-bg bg-top bg-percent-100 max-size-container center-container  pt-50 pb-30">
            <div class="container">
                <h2 class="text-center m-4" style="visibility: visible;">
                    Our Succes story</h2>
                <div class="row">
                    @foreach ($success_story as $ss)
                        <div class="col-sm-4">
                            <div class="content-section my-2"
                                style="background: url({{ config('app.url') }}storage/{{ $ss->image }}) rgb(0 0 0 / 36%);
                                background-blend-mode: multiply;
                                padding: 41px 13px;
                                color: #fff;">
                                <div class="image-holder"></div>
                                <div class="content-holder px-4">
                                    <h2 style="font-size: 30px;color: #fff;font-weight: 700;">{{ $ss->title }}
                                    </h2>
                                    <div class="hidden-details">
                                        <div class="long-text mt-1 mb-3">
                                            <p style="color: #fff;font-weight: 400; ">{{ $ss->description }}</p>
                                        </div>

                                        <div class="link-area mb-3">
                                        </div>

                                        <div class="tags-area mb-3">
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="col-sm-4">
                    <div class="content-section my-2" style="background: url('https://www.asu.edu/sites/default/files/2022-08/KE-pillar-macroTech_0.jpg') rgb(0 0 0 / 36%);
                                        background-blend-mode: multiply;
                                        padding: 41px 13px;
                                        color: #fff;">
                        <div class="content-holder px-4">
                            <h2 style="font-size: 30px;color: #fff;font-weight: 700;">Experience world-class academics
                            </h2>
                            <div class="hidden-details">
                                <div class="long-text mt-1 mb-3">
                                    <p style="color: #fff;font-weight: 400;">As a comprehensive public research
                                        university, ASU is committed to
                                        providing excellence in education through the Academic Enterprise,
                                        and enables the success of each unique student and increases access
                                        to higher education for all.</p>
                                </div>

                                <div class="link-area mb-3">
                                </div>

                                <div class="tags-area mb-3">
                                </div>

                                <div class="button-area">
                                    <!-- START INSERT: Button Component -->
                                    <a href="https://www.asu.edu/academics" class="btn btn-md btn-gold" role="link"
                                        data-ga-animated-content-section-section="experience world-class academics"
                                        data-ga-animated-content-section="learn more">
                                        Learn more
                                    </a>

                                    <!-- END INSERT: Button Component -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="content-section my-2" style="background: url('https://www.asu.edu/sites/default/files/2022-08/LE-pillar-online.jpg') rgb(0 0 0 / 36%);
                                        background-blend-mode: multiply;
                                        padding: 41px 13px;
                                        color: #fff;">
                        <div class="image-holder"></div>
                        <div class="content-holder px-4">
                            <h2 style="font-size: 30px;color: #fff;font-weight: 700;">Experience world-class academics
                            </h2>
                            <div class="hidden-details">
                                <div class="long-text mt-1 mb-3">
                                    <p style="color: #fff;font-weight: 400;">As a comprehensive public research
                                        university, ASU is committed to
                                        providing excellence in education through the Academic Enterprise,
                                        and enables the success of each unique student and increases access
                                        to higher education for all.</p>
                                </div>

                                <div class="link-area mb-3">
                                </div>

                                <div class="tags-area mb-3">
                                </div>

                                <div class="button-area">
                                    <!-- START INSERT: Button Component -->
                                    <a href="https://www.asu.edu/academics" class="btn btn-md btn-gold" role="link"
                                        data-ga-animated-content-section-section="experience world-class academics"
                                        data-ga-animated-content-section="learn more">
                                        Learn more
                                    </a>

                                    <!-- END INSERT: Button Component -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div> --}}

                </div>
            </div>

        </div>


        <section class="gmp-2 mission-wrp testimonial-area pt-90 pb-90 p-relative fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-50 wow fadeInDown animated" data-animation="fadeInDown"
                            data-delay=".4s">
                            <h2>
                                Hear what parents have to say about us
                            </h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="testimonial-active wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">

                            <div class="single-testimonial text-center">
                                <div class="qt-img">
                                    <img src="{{ config('app.url') }}visitors/assets/img/testimonial/qt-icon.png"
                                        alt="img">
                                </div>
                                <p>"I would like to show my appreciation to the teachers who have taught my son and has guided him to achieving amazing results in his IGs and A levels. they have been a source of confidence and inspiration for my child to work hard and achieve the level where he is today! Wishing the teachers all the best in their future endeavors"</p>

                                <div class="ta-info">
                                    <h6>Sneha Som</h6>
                                    <span>Mother of Aavya Singh KG</span>
                                </div>
                            </div>
                            <div class="single-testimonial text-center">
                                <div class="qt-img">
                                    <img src="{{ config('app.url') }}visitors/assets/img/testimonial/qt-icon.png"
                                        alt="img">
                                </div>
                                <p>“I would like to say that I am very impressed with the children's events and their performances. Thank You for all the effort the teachers have put in with them. The events are very fun, entertaining and educational for them. Keep it up Simpkins!”</p>

                                <div class="ta-info">
                                    <h6>Richa Mishra</h6>
                                    <span>Mother of Riya Mishra LKG</span>
                                </div>
                            </div>
                            <div class="single-testimonial text-center">
                                <div class="qt-img">
                                    <img src="{{ config('app.url') }}visitors/assets/img/testimonial/qt-icon.png"
                                        alt="img">
                                </div>
                                <p>"Being efficient and receiving the curriculum email has been really helpful. I am writing to express my gratitude to the head for sharing the same. Using this as a guide would really help parents like me to understand the curriculum and provide support to my child. Thank You"</p>

                                <div class="ta-info">
                                    <h6>Reshma verma</h6>
                                    <span>Mother of Kavya verma KG</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->
        <!-- search-area -->


        <!-- brand-area-end -->
        <!-- blog-area -->
        <section id="blog" class="blog-area p-relative fix pt-90 pb-45" style="">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title center-align mb-50 text-center wow fadeInDown animated"
                            data-animation="fadeInDown" data-delay=".4s">

                            <h2>
                                Student Life @ Simpkins
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#0"><img
                                        src="{{ config('app.url') }}visitors/assets/img/features/GALL-65.jpg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#0"><img
                                        src="{{ config('app.url') }}visitors/assets/img/features/GALL-66.jpg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#0"><img
                                        src="{{ config('app.url') }}visitors/assets/img/features/GALL-64.jpg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#0"><img
                                        src="{{ config('app.url') }}visitors/assets/img/features/GALL-68.jpg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#0"><img
                                        src="{{ config('app.url') }}visitors/assets/img/features/GALL-56 (1).jpg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#0"><img
                                        src="{{ config('app.url') }}visitors/assets/img/features/GALL-54.jpg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#0"><img
                                        src="{{ config('app.url') }}visitors/assets/img/features/GALL-62.jpg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#0"><img
                                        src="{{ config('app.url') }}visitors/assets/img/features/GALL-63.jpg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-area-end -->
        <!-- newslater-area -->

    </main>
    @if (Session::has('success'))
        <script>
            let msg = "{{ Session::get('success') }}"
            window.onload = function() {
                if(!msg) return;
                swal("Success", msg, 'success', {
                    timer: 3000,
                    buttons: {
                        confirm: "OK",
                    },
                });
            }
        </script>
    @endif
    <!-- main-area-end -->
@endsection
