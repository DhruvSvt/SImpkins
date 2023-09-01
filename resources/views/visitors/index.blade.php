@extends('layouts.visitorsApp')
@section('content')
    <!-- main-area -->
    <main>
        <section id="home" class="slider-area fix p-relative">

            <div class="slider-active" style="background: #141b22;">
                <div class="single-slider slider-bg"
                    style="background-image:linear-gradient(rgba(2,2,2,0) 38%,#000 100%,rgba(1,1,1,.66)),url({{ config('app.url') }}visitors/assets/img/slider/AF1QipOkSeNIjWdozkFduU4ifj4XOZ8ptLcI2UoHiCTX=s1536.jpeg); background-size: cover;">
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
            </div>


        </section>
        <!-- slider-area -->


        <!-- about-area -->
        <section class="about-area about-p pt-60 pb-60 p-relative fix" style="background: #fff;">
            <div class="animations-02"><img src="{{ config('app.url') }}visitors/assets/img/bg/an-img-02.png" alt="contact-bg-an-01"></div>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-content s-about-content pl-15 wow fadeInRight  animated mb-5"
                            data-animation="fadeInRight" data-delay=".4s">
                            <div class="about-title second-title pb-15">

                                <h2>Welcome to Simpkins School in Agra</h2>
                            </div>
                            <p class="txt-clr">‘If your plan is for one year, plant rice; If your plan is for ten years,
                                plant trees; If your plan is for a hundred years, Educate children.’- Confucius</p>
                            <p>Simpkins School is located in the heart of the historical city of Agra. The school was
                                founded three decades back with a commitment to excellence and for providing
                                opportunities to enable young people to be best positioned, consequent to their
                                education. Today, we have grown into one of the city’s leading institutions with
                                branches across the city, providing quality education to our students, facilitated by
                                dedicated educators who are trained to channelize their energy and resources towards
                                child-centered qualitative learning. The school follows the CBSE curriculum and runs
                                from classes Pre Nursery to 12th. This day-school is co-educational and the medium of
                                instruction here is English. School Session runs from April to March.</p>

                            <a href="#" class="button-inner ">
                                <p class="button_text">Read more</p><img
                                    src="{{ config('app.url') }}visitors/assets/img/features/5f3ed15cfcf155b03d5adbe9_blue-arrow-03.svg" alt="Arrow"
                                    class="arrow_img">
                                <div class="button_background" style="width: 40px; height: 40px;"></div>
                            </a>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-5 col-md-12 col-sm-12">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <a href="#"
                                    class="link-card-colorful dark-blue w-inline-block wow fadeInLeft animated"
                                    data-animation="fadeInLeft" data-delay=".4s">
                                    <div>
                                        <div class="link-card-circle dark-blue"
                                            style="background-color: rgba(0, 90, 169, 0.1);"><img
                                                src="{{ config('app.url') }}visitors/assets/img/features/5f3ed15cfcf15581365adbea_uni placements-icon-04.svg"
                                                loading="lazy" alt="Placements"></div>
                                    </div>
                                    <div class="_10px-padding"></div>
                                    <h4>University Placements</h4>
                                    <div class="_12px-text" style="color: rgba(40, 51, 56, 0.6);">Our accomplished
                                        students have been accepted in over 50 universities around the world.</div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <a href="#"
                                    class="link-card-colorful dark-blue w-inline-block wow fadeInLeft animated"
                                    data-animation="fadeInLeft" data-delay=".5s">
                                    <div>
                                        <div class="link-card-circle dark-blue"
                                            style="background-color: rgba(0, 90, 169, 0.1);"><img
                                                src="{{ config('app.url') }}visitors/assets/img/features/64119eac1e4464f50bbb8597_scholarship-icon.png"
                                                loading="lazy" alt="Placements"></div>
                                    </div>
                                    <div class="_10px-padding"></div>
                                    <h4>Scholarships</h4>
                                    <div class="_12px-text" style="color: rgba(40, 51, 56, 0.6);">Our accomplished
                                        students have been accepted in over 50 universities around the world.</div>
                                </a>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <a href="#"
                                    class="link-card-colorful dark-blue w-inline-block wow fadeInLeft animated"
                                    data-animation="fadeInLeft" data-delay=".4s">
                                    <div>
                                        <div class="link-card-circle dark-blue"
                                            style="background-color: rgba(0, 90, 169, 0.1);"><img
                                                src="{{ config('app.url') }}visitors/assets/img/features/5f3ed15cfcf155745e5adbeb_results-icon-04.svg"
                                                loading="lazy" alt="Placements"></div>
                                    </div>
                                    <div class="_10px-padding"></div>
                                    <h4>Top Results</h4>
                                    <div class="_12px-text" style="color: rgba(40, 51, 56, 0.6);">Our accomplished
                                        students have been accepted in over 50 universities around the world.</div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <a href="#"
                                    class="link-card-colorful dark-blue w-inline-block wow fadeInLeft animated"
                                    data-animation="fadeInLeft" data-delay=".5s">
                                    <div>
                                        <div class="link-card-circle dark-blue"
                                            style="background-color: rgba(0, 90, 169, 0.1);"><img
                                                src="{{ config('app.url') }}visitors/assets/img/features/5f3ed15cfcf15546cf5adbed_awards-icon-04.svg"
                                                loading="lazy" alt="Placements"></div>
                                    </div>
                                    <div class="_10px-padding"></div>
                                    <h4>Awards Recoginision</h4>
                                    <div class="_12px-text" style="color: rgba(40, 51, 56, 0.6);">Our accomplished
                                        students have been accepted in over 50 universities around the world.</div>
                                </a>
                            </div>


                        </div>


                    </div>

                </div>
            </div>
        </section>
        <!-- about-area-end -->
        <section class="steps-area p-relative" style="background-color: #40B9EB;">
            <div class="animations-10"><img src="{{ config('app.url') }}visitors/assets/img/bg/an-img-10.png" alt="an-img-01"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="section-title mb-35 wow fadeInDown animated" data-animation="fadeInDown"
                            data-delay=".4s">
                            <h2>Why Simkins is the best school for your child</h2>

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
                                        <h3>Best Teachers</h3>
                                        <p>Each of our teacher is well qualified & trained so that they can do justice
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
                                        <h3>Activity Based Learning</h3>
                                        <p>Convert every class to a lab. All our learning happens in experiential
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
                                        <h3>Safety & Security</h3>
                                        <p> Students are safeguarded to the best and taken utmost care with measures
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

        <section class="about-area about-p pt-90 pb-90 p-relative fix"
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
                        <img src="{{ config('app.url') }}visitors/assets/img/features/609507dc6ac5fd7a99c02759_spiral-bulb-png.png" loading="lazy"
                            alt="" class="choose-cbse" style="position: absolute;right: 74px;">
                    </div>
                </div>
            </div>
        </section>

        <div class="white-curve-main top"></div>
        <div class="stats-main-div">
            <div class="main-stats-wrapper">
                <div>
                    <h3 class="counter main-stats">35</h3>
                    <h4 class="stats-caption">Campus World Wide</h4>
                </div>
                <div>
                    <h3 class="counter main-stats">10</h3>
                    <h4 class="stats-caption">Countries</h4>
                </div>
                <div id="w-node-_2be81a79-976a-16ed-c2f4-7f0694264efe-2207cad4">
                    <div class="hor-div-3 centre-align">
                        <h3 class="counter main-stats">2,300</h3>
                    </div>
                    <h4 class="stats-caption">Faculty</h4>
                </div>
                <div>
                    <div class="hor-div-3 centre-align">
                        <h3 class="counter main-stats">31,500</h3>
                        <h3 class="stasts-symbol-white plus-wrap hide">+</h3>
                    </div>
                    <h4 class="stats-caption">Active Students</h4>
                </div>
            </div>
        </div>
        <div class="white-curve-main"></div>
        <!-- frequently-area -->
        <section class="faq-area pt-90 pb-90 p-relative fix">
            <div class="animations-10"><img src="{{ config('app.url') }}visitors/assets/img/bg/an-img-04.png" alt="an-img-01"></div>
            <div class="animations-08"><img src="{{ config('app.url') }}visitors/assets/img/bg/an-img-05.png" alt="contact-bg-an-01"></div>
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
                                            data-bs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">Upcoming Events<img
                                                src="https://mdayurvediccollege.in/demo/vtedu/assets/frontend/default/img/new_icon_blink.gif"
                                                width="20"></button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <marquee behavior="scroll" direction="up" scrollamount="4"
                                            style="height: 309px;    overflow-y: auto;" onmouseover="this.stop()"
                                            onmouseout="this.start()">
                                            <ul class="mCSB_container">


                                                <li class="notification"> <a href="#" target="_blank"> Composite
                                                        Allotment of NEET (UG) 2022 <br> AIQ Counselling for Reference
                                                        Purpose Second Round <img
                                                            src="https://mdayurvediccollege.in/demo/vtedu/assets/frontend/default/img/new_icon_blink.gif"
                                                            width="20"> </a>
                                                </li>
                                                <li class="notification"> <a href="#" target="_blank"> Composite
                                                        Allotment of NEET (UG) 2022 <br> AIQ Counselling for Reference
                                                        Purpose Second Round </a>
                                                </li>
                                                <li class="notification"> <a href="#" target="_blank"> Composite
                                                        Allotment of NEET (UG) 2022 <br> AIQ Counselling for Reference
                                                        Purpose Second Round </a>
                                                </li>
                                                <li class="notification"> <a href="#" target="_blank"> JEE
                                                        (Main+Advanced) - Classroom / Online Courses &amp; Fee 2023-24
                                                        <img src="https://mdayurvediccollege.in/demo/vtedu/assets/frontend/default/img/new_icon_blink.gif"
                                                            width="20"> </a>
                                                </li>

                                            </ul>
                                        </marquee>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <marquee behavior="scroll" direction="up" scrollamount="4"
                                            style="height: 309px;    overflow-y: auto;" onmouseover="this.stop()"
                                            onmouseout="this.start()">
                                            <ul class="mCSB_container">


                                                <li class="notification"> <a href="#" target="_blank"> Pre-Medical
                                                        (NEET-UG) - Classroom / Online Courses &amp; Fee 2023-24 <img
                                                            src="https://mdayurvediccollege.in/demo/vtedu/assets/frontend/default/img/new_icon_blink.gif"
                                                            width="20"> </a>
                                                </li>
                                                <li class="notification"> <a href="#" target="_blank"> Composite
                                                        Allotment of NEET (UG) 2022 <br> AIQ Counselling for Reference
                                                        Purpose Second Round </a>
                                                </li>
                                                <li class="notification"> <a href="#" target="_blank"> Composite
                                                        Allotment of NEET (UG) 2022 <br> AIQ Counselling for Reference
                                                        Purpose Second Round </a>
                                                </li>
                                                <li class="notification"> <a href="#" target="_blank"> JEE
                                                        (Main+Advanced) - Classroom / Online Courses &amp; Fee 2023-24
                                                        <img src="https://mdayurvediccollege.in/demo/vtedu/assets/frontend/default/img/new_icon_blink.gif"
                                                            width="20"> </a>
                                                </li>
                                            </ul>
                                        </marquee>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5">
                        <div class="contact-bg02">
                            <div class="section-title wow fadeInDown animated" data-animation="fadeInDown"
                                data-delay=".4s">
                                <h2>
                                    Make An Enquiry
                                </h2>
                            </div>
                            <form action="#" method="post" class="contact-form mt-30 wow fadeInUp animated"
                                data-animation="fadeInUp" data-delay=".4s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-name mb-20">
                                            <input type="text" id="firstn" name="firstn" placeholder="First Name"
                                                required>
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
                                            <input type="text" id="phone" name="phone" placeholder="Phone No."
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-message mb-0">
                                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Write comments"></textarea>
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
        </section>
        <!-- frequently-area-end -->
        <!-- video-area -->

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
                                    <img src="{{ config('app.url') }}visitors/assets/img/testimonial/qt-icon.png" alt="img">
                                </div>
                                <p>the opportunity to explore their own learning at their own pace. It has given my
                                    child a nurturing environment as well as polish her natural skills. I am happy that
                                    she has developed a sense of ownership and better self-confidence through ECAs.</p>
                                <div class="testi-author">
                                    <img src="{{ config('app.url') }}visitors/assets/img/features/6214941bece17314c7c37488_Sweta Kesarwani.png"
                                        alt="img">
                                </div>
                                <div class="ta-info">
                                    <h6>Sneha Som</h6>
                                    <span>Mother of Aavya Singh KG</span>
                                </div>
                            </div>
                            <div class="single-testimonial text-center">
                                <div class="qt-img">
                                    <img src="{{ config('app.url') }}visitors/assets/img/testimonial/qt-icon.png" alt="img">
                                </div>
                                <p>the opportunity to explore their own learning at their own pace. It has given my
                                    child a nurturing environment as well as polish her natural skills. I am happy that
                                    she has developed a sense of ownership and better self-confidence through ECAs.</p>
                                <div class="testi-author">
                                    <img src="{{ config('app.url') }}visitors/assets/img/features/6214941bece17314c7c37488_Sweta Kesarwani.png"
                                        alt="img">
                                </div>
                                <div class="ta-info">
                                    <h6>Sneha Som</h6>
                                    <span>Mother of Aavya Singh KG</span>
                                </div>
                            </div>
                            <div class="single-testimonial text-center">
                                <div class="qt-img">
                                    <img src="{{ config('app.url') }}visitors/assets/img/testimonial/qt-icon.png" alt="img">
                                </div>
                                <p>the opportunity to explore their own learning at their own pace. It has given my
                                    child a nurturing environment as well as polish her natural skills. I am happy that
                                    she has developed a sense of ownership and better self-confidence through ECAs.</p>
                                <div class="testi-author">
                                    <img src="{{ config('app.url') }}visitors/assets/img/features/6214941bece17314c7c37488_Sweta Kesarwani.png"
                                        alt="img">
                                </div>
                                <div class="ta-info">
                                    <h6>Sneha Som</h6>
                                    <span>Mother of Aavya Singh KG</span>
                                </div>
                            </div>
                            <div class="single-testimonial text-center">
                                <div class="qt-img">
                                    <img src="{{ config('app.url') }}visitors/assets/img/testimonial/qt-icon.png" alt="img">
                                </div>
                                <p>the opportunity to explore their own learning at their own pace. It has given my
                                    child a nurturing environment as well as polish her natural skills. I am happy that
                                    she has developed a sense of ownership and better self-confidence through ECAs.</p>
                                <div class="testi-author">
                                    <img src="{{ config('app.url') }}visitors/assets/img/features/6214941bece17314c7c37488_Sweta Kesarwani.png"
                                        alt="img">
                                </div>
                                <div class="ta-info">
                                    <h6>Sneha Som</h6>
                                    <span>Mother of Aavya Singh KG</span>
                                </div>
                            </div>
                            <div class="single-testimonial text-center">
                                <div class="qt-img">
                                    <img src="{{ config('app.url') }}visitors/assets/img/testimonial/qt-icon.png" alt="img">
                                </div>
                                <p>the opportunity to explore their own learning at their own pace. It has given my
                                    child a nurturing environment as well as polish her natural skills. I am happy that
                                    she has developed a sense of ownership and better self-confidence through ECAs.</p>
                                <div class="testi-author">
                                    <img src="{{ config('app.url') }}visitors/assets/img/features/6214941bece17314c7c37488_Sweta Kesarwani.png"
                                        alt="img">
                                </div>
                                <div class="ta-info">
                                    <h6>Sneha Som</h6>
                                    <span>Mother of Aavya Singh KG</span>
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
        <section id="blog" class="blog-area p-relative fix pt-90 pb-90" style="">
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
                                <a href="#"><img src="{{ config('app.url') }}visitors/assets/img/features/GALL-65.jpg" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#"><img src="{{ config('app.url') }}visitors/assets/img/features/GALL-66.jpg" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#"><img src="{{ config('app.url') }}visitors/assets/img/features/GALL-64.jpg" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#"><img src="{{ config('app.url') }}visitors/assets/img/features/GALL-68.jpg" alt="img"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#"><img src="{{ config('app.url') }}visitors/assets/img/features/GALL-56 (1).jpg" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#"><img src="{{ config('app.url') }}visitors/assets/img/features/GALL-54.jpg" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#"><img src="{{ config('app.url') }}visitors/assets/img/features/GALL-62.jpg" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#"><img src="{{ config('app.url') }}visitors/assets/img/features/GALL-63.jpg" alt="img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-area-end -->
        <!-- newslater-area -->

    </main>
    <!-- main-area-end -->
@endsection
