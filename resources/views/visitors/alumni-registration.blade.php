@extends('layouts.visitorsApp',['title' => 'Alumni Registration' .' | '. config('app.name')])
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
                            <h2>Alumni Registration</h2>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb-wrap2">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Alumni Registration</li>
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
                                Alumni Registration Form
                            </h2>
                        </div>
                        <form class="contact-form mt-30 contact-field " enctype="multipart/form-data"
                            action="{{ route('visitor.admission') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input placeholder="First Name" class="form-control" name="first_name" type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input placeholder="Last Name" class="form-control" name="Last_name" type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label> Date of Birth <span class="text-danger">*</span></label>
                                    <input placeholder="Date of Birth" class="form-control" name="dob" type="date">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Gender<span class="text-danger">*</span></label>
                                    <select name="gender" class="form-select" style="height: 45px; padding:0 13px;"
                                        required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Marital Status<span class="text-danger">*</span></label>
                                    <select name="martial" class="form-select" style="height: 45px; padding:0 13px;"
                                        required>
                                        <option value="">Select Status</option>
                                        <option value="Married">Married</option>
                                        <option value="Unmarried">Unmarried</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Mobile No.<span class="text-danger">*</span></label>
                                    <input placeholder="Mobile No" class="form-control" name="phn_no" type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Profession <span class="text-danger">*</span></label>
                                    <input placeholder="Profession" class="form-control" name="profession" type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input placeholder="Email" class="form-control" name="email" type="email">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Batch<span class="text-danger">*</span></label>
                                    <input placeholder="YYYY format" class="form-control" name="batch" type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Last Class<span class="text-danger">*</span></label>
                                    <select name="last_class" class="form-select" style="height: 45px; padding:0 13px;"
                                        required>
                                        <option value="">Last Class</option>
                                        <option value="KG">KG</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V">V</option>
                                        <option value="VI">VI</option>
                                        <option value="VII">VII</option>
                                        <option value="VIII">VIII</option>
                                        <option value="IX">IX</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Year of leaving school<span class="text-danger">*</span></label>
                                    <input placeholder="YYYY format" class="form-control" name="leaving_year"
                                        type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Home Town<span class="text-danger">*</span></label>
                                    <input placeholder="Home Town" class="form-control" name="home_town" type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Country<span class="text-danger">*</span></label>
                                    <select name="country" class="form-select" style="height: 45px; padding:0 13px;"
                                        required>
                                        <option value="">Select Your Country</option>
                                        @foreach ($countries as $country )
                                        <option value="{{ $country }}">{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="home_town" type="text">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Upload Your Document (only school related)</label>
                                    <input type="file" class="form-control" name="home_town" type="text">
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
