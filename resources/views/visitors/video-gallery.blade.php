@extends('layouts.visitorsApp')
@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center"
            style="background-image:linear-gradient(rgba(2,2,2,0) 38%,#000 100%,rgba(1,1,1,.66)),url({{ config('app.url') }}visitors/assets/img/slider/AF1QipOkSeNIjWdozkFduU4ifj4XOZ8ptLcI2UoHiCTX=s1536.jpeg); background-size: cover;">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Video Gallery</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Video Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

        </section>
        <!-- breadcrumb-area-end -->

        <!-- Videos Area -->

        <section id="contact" class="gmp-2 mission-wrp faq-area pt-90 pb-90 p-relative fix">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/PUcZs-ol74g?si=NJezl9wsAIvlDFKS"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/OdOHrJuylnw?si=4s7XSSCxqbOXBXee"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/A4PBD4BG6rU?si=h-Ri0UoyYUxhFQdx"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="#">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/01k715qq5jc?si=huqlbdSt7V3Zj9S9"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <!-- main-area-end -->
@endsection
