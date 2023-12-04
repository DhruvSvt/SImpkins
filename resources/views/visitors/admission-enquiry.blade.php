@extends('layouts.visitorsApp',['title' => 'Admission Enquiry' .' | '. config('app.name')])
@section('content')
<!-- main-area -->
<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex  p-relative align-items-center"
        style="background-image:linear-gradient(rgba(2,2,2,0) 38%,#000 100%,rgba(1,1,1,.66)),url({{ config('app.url') }}visitors/assets/img/features/shutterstock_263211977.avif); background-size: cover;">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-left">
                        <div class="breadcrumb-title">
                            <h2>Admission Enquiry</h2>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb-wrap2">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admission Enquiry</li>
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
                <div class="col-lg-12 order-2">
                    <div class="contact-bg">
                        <div class="section-title center-align text-center mb-50">
                            <h2>
                                Admission Enquiry Form
                            </h2>
                        </div>
                        <form class="contact-form mt-30 contact-field " enctype="multipart/form-data"
                            action="{{ route('visitor.admission') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Student Name <span class="text-danger">*</span></label>
                                    <input placeholder="Student Name" class="form-control" name="student_name"
                                        type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label> Date of Birth <span class="text-danger">*</span></label>
                                    <input placeholder="Date of Birth" class="form-control" name="dob" type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>gender<span class="text-danger">*</span></label>
                                    <input placeholder="Gender" class="form-control" name="gender" type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Contact No.<span class="text-danger">*</span></label>
                                    <input placeholder="Contact Number" class="form-control" name="contact_no"
                                        type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Admitted Class <span class="text-danger">*</span></label>
                                    <input placeholder="Admitted Class" class="form-control" name="admitted_class"
                                        type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Previous School Name <span class="text-danger">*</span></label>
                                    <input placeholder="Previous School Name" class="form-control"
                                        name="previous_school_name" type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Father&#039;s Name <span class="text-danger">*</span></label>
                                    <input placeholder="Father&#039;s Name" class="form-control" name="father_name"
                                        type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Mother&#039;s Name <span class="text-danger">*</span></label>
                                    <input placeholder="Mother&#039;s Name" class="form-control" name="mother_name"
                                        type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Last Class <span class="text-danger">*</span></label>
                                    <input placeholder="Last Class" class="form-control" name="last_class" type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Father&#039;s Mobile <span class="text-danger">*</span></label>
                                    <input placeholder="Father&#039;s Mobile" class="form-control" name="father_mobile"
                                        type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Mother&#039;s Mobile <span class="text-danger">*</span></label>
                                    <input placeholder="Mother&#039;s Mobile" class="form-control" name="mother_mobile"
                                        type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Apply Date<span class="text-danger">*</span></label>
                                    <input placeholder="Date" class="form-control datepicker-popup form-control"
                                        name="date" type="text">
                                </div>
                                <div class="form-group col-12">
                                    <label>Address<span class="text-danger">*</span></label>
                                    <textarea placeholder="Address" class="form-control" id="address" rows="2"
                                        name="address" cols="50"></textarea>
                                </div>

                            </div>
                            <div class="slider-btn">
                                <button class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s"><span>Submit
                                        Now</span></button>
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
