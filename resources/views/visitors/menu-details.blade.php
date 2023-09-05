@extends('layouts.visitorsApp',['title' => $page->page_name .' | '. config('app.name')])
@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center"
            style="background-image:linear-gradient(rgba(2,2,2,0) 38%,#000 100%,rgba(1,1,1,.66)),
                url({{config('app.url')}}storage/{{ $page->banner_image }}); background-size: cover;">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>{{ $page->page_name ?? '-' }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $page->menu ? $page->menu->name : '-' }}</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- about-area -->
        <section class="gmp-2 mission-wrp about-area about-p pt-60 pb-60 p-relative fix">
            <div class="animations-02"><img src="{{ config('app.url') }}storage/{{ $page->content_image }}" alt="contact-bg-an-01"></div>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <div class="about-content s-about-content pl-15 wow fadeInRight  animated mb-5"
                            data-animation="fadeInRight" data-delay=".4s">
                            {{-- <div class="about-title second-title pb-15">
                                <h2>Welcome to Simpkins School in Agra</h2>
                            </div> --}}
                            <p class="txt-clr">
                                {!! $page->content !!}
                            </p>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- about-area-end -->
    </main>
    <!-- main-area-end -->
@endsection
