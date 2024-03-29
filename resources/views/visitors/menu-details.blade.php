@extends('layouts.visitorsApp', ['title' => $page->page_name . ' | ' . config('app.name')])
@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center"
            style="min-height: auto;
        padding: 70px 0;
        background: #8c1d40;">

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
                                <li class="breadcrumb-item active" aria-current="page">{{ $page->page_name ?? '-' }}</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- about-area -->
        <section class="gmp-2 mission-wrp about-area about-p pt-60 pb-60 p-relative fix">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-8 col-sm-12 text-left">
                        <div class="about-content s-about-content pl-15 wow fadeInRight  animated mb-5"
                            data-animation="fadeInRight" data-delay=".4s">
                            <div> {!! $page->content !!}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex col-sm-12 text-center">
                        <img src="{{ config('app.url') }}storage/{{ $page->content_image }}"
                            class="m-auto img-fluid img-bordered img-thumbnail" onerror="this.style.display='none'">
                    </div>
                </div>
            </div>

        </section>
        <!-- about-area-end -->
    </main>
    <!-- main-area-end -->
@endsection
