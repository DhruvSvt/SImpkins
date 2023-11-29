@extends('layouts.visitorsApp',['title' => 'Admission Enquiry' .' | '. config('app.name')])
@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center"
            style="background-image:linear-gradient(rgba(2,2,2,0) 38%,#000 100%,rgba(1,1,1,.66)),
            url({{ config('app.url') }}visitors/assets/img/features/TcR0k5AA.png); background-size: cover;">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Job Application</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ config('app.url') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Job Application</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- slider-area -->

        <section id="contact" class="gmp-2 mission-wrp contact-area after-none contact-bg pt-60 pb-60 p-relative fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="contact-bg">
                            <div class="section-title center-align text-center mb-50">
                                <h2>
                                    Job Application
                                </h2>
                            </div>
                            <form class="contact-form mt-30 contact-field " enctype="multipart/form-data"
                                action="{{ route('visitor.jobform') }}" method="POST"
                               >
                                @csrf
                                <div class="row">
                                   <div class="form-group col-sm-12 col-md-4">
                                            <label>Candidate Name <span class="text-danger">*</span></label>
                                            <input placeholder="Candidate Name" class="form-control" name="candidate_name" type="text" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label>Father's Name <span class="text-danger">*</span></label>
                                            <input placeholder="Father's Name" class="form-control" name="father_name" type="text" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label>Mobile <span class="text-danger">*</span></label>
                                            <input placeholder="Mobile" class="form-control" name="mobile" type="text" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label>Apply For <span class="text-danger">*</span></label>
                                            <input placeholder="Apply For" class="form-control" name="apply_for" type="text" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label>Highest Qualification <span class="text-danger">*</span></label>
                                            <input placeholder="Highest Qualification" class="form-control form-control" name="highest_qualification" type="text" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label>Current Organization <span class="text-danger">*</span></label>
                                            <input placeholder="Current Organization" class="form-control form-control" name="current_organization" type="text" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Address <span class="text-danger">*</span></label>
                                            <textarea placeholder="Address" class="form-control" id="address" rows="2" name="address" cols="50" required></textarea>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Resume (PDF)<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="resume" accept="application/pdf" required></textarea>
                                        </div>
                                    </div>
                                    <div class="slider-btn">
                                        <button class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s"><span>Submit
                                                Now</span></button>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <img src="{{ config('app.url') }}visitors/assets/img/features/for-a-job-3d-rendering-png.png">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- main-area-end -->
@endsection
