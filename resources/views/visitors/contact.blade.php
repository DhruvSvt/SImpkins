@extends('layouts.visitorsApp')
@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center"
            style="background-image:linear-gradient(rgba(2,2,2,0) 38%,#000 100%,rgba(1,1,1,.66)),url({{ config('app.url') }}visitors/assets/img/features/contact-us-background-1.jpg); background-size: cover;">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Contact Enquiry</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Enquiry</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- slider-area -->
        <section id="services" class="services-area pt-120 pb-90 fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-50 wow fadeInDown animated" data-animation="fadeInDown"
                            data-delay=".4s">

                            <h2>
                                Get In Touch
                            </h2>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">

                        <div class="services-box text-center">
                            <div class="services-icon">
                                <img src="{{ config('app.url') }}visitors/assets/img/bg/contact-icon01.png" alt="image">
                            </div>
                            <div class="services-content2">
                                <h5><a href="tel:+919068531858">+91 – 9068531858, 8899290950</a></h5>
                                <p>Phone Support</p>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-4 col-md-4">

                        <div class="services-box text-center active">
                            <div class="services-icon">
                                <img src="{{ config('app.url') }}visitors/assets/img/bg/contact-icon02.png" alt="image">
                            </div>
                            <div class="services-content2">
                                <h5><a href="mailto:simpkinsagr@gmail.com">simpkinsagr@gmail.com</a></h5>
                                <p>Email Address</p>

                            </div>
                        </div>


                    </div>
                    <div class="col-lg-4 col-md-4">

                        <div class="services-box text-center">
                            <div class="services-icon">
                                <img src="{{ config('app.url') }}visitors/assets/img/bg/contact-icon03.png" alt="image">
                            </div>
                            <div class="services-content2">
                                <h5>Maruti Estate, Bodla Road, Shahganj, Agra, U.P – 282010</h5>
                                <p>Office Address</p>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </section>
        <section id="contact" class="gmp-2 mission-wrp faq-area pt-90 pb-90 p-relative fix">
            <div class="animations-10"><img src="{{ config('app.url') }}visitors/assets/img/bg/an-img-04.png" alt="an-img-01"></div>
            <div class="animations-08"><img src="{{ config('app.url') }}visitors/assets/img/bg/an-img-05.png" alt="contact-bg-an-01"></div>
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-lg-7">
                        <div class="section-title wow fadeInLeft animated" data-animation="fadeInDown animated"
                            data-delay=".2s">
                            <div class="mb-5 link-card-colorful sign-up-form">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1774.5992092988715!2d77.96584083843139!3d27.181499880120686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397477a5f61aa55d%3A0x873744ebdb0a59c5!2sSimpkins%20School!5e0!3m2!1sen!2sin!4v1692866759688!5m2!1sen!2sin"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>

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



    </main>
    <!-- main-area-end -->
@endsection
