@extends('layouts.master')

@section('title')
    {{ __('employees') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('employees') }}
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('create') . ' ' . __('employees') }}
                        </h4>
                        <form class="pt-3 student-registration-form" enctype="multipart/form-data"
                            action="{{ route('employees.store') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('employee_code') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('employee_code', null, ['placeholder' => __('employee_code'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('name', null, ['placeholder' => __('name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('father_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('father_name', null, ['placeholder' => __('father_name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('mother_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('mother_name', null, ['placeholder' => __('mother_name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('religion') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('religion', null, ['placeholder' => __('religion'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label>{{ __('gender') }} <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('gender', 'male') !!}
                                                {{ __('male') }}
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('gender', 'female') !!}
                                                {{ __('female') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('image') }} <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="{{ __('image') }}" required="required" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button">{{ __('upload') }}</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('category') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('category', null, ['placeholder' => __('category'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('dob') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('dob', null, ['placeholder' => __('dob'), 'class' => 'datepicker-popup form-control']) !!}
                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('designation') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('designation', null, ['placeholder' => __('designation'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('date_of_joining') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('date_of_joining', null, ['placeholder' => __('date_of_joining'), 'class' => 'datepicker-popup form-control']) !!}
                                </div>
                                <div class="form-group col-12">
                                    <label>{{ __('address') }} <span class="text-danger">*</span></label>
                                    {!! Form::textarea('address', null, ['placeholder' => __('address'), 'class' => 'form-control', 'rows' => 2,]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('aadhar_card') }}</label>
                                    {!! Form::text('aadhar_card', null, ['placeholder' => __('aadhar_card'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('pancard') }}</label>
                                    {!! Form::text('pancard', null, ['placeholder' => __('pancard'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('bank_name') }}</label>
                                    {!! Form::text('bank_name', null, ['placeholder' => __('bank_name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('bank_acc_no') }}</label>
                                    {!! Form::text('bank_acc_no', null, ['placeholder' => __('bank_acc_no'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('ifsc_code') }}</label>
                                    {!! Form::text('ifsc_code', null, ['placeholder' => __('ifsc_code'), 'class' => 'form-control']) !!}
                                </div>

                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('front_office') }}</label>
                                {{ Form::checkbox('front_office', '1', false, ['id' => 'front_office','placeholder' => __('front_office')]) }}
                            </div>
                            <div class="row" id="front_office_container" style="display: none">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{{ __('email') }} <span class="text-danger">*</span></label>
                                    {!! Form::email('email', null, ['placeholder' => __('email'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{{ __('password') }} <span class="text-danger">*</span></label>
                                    {!! Form::password('password', null, ['placeholder' => __('password'), 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <input class="btn btn-theme" type="submit" value={{ __('submit') }}>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#front_office').change(function() {
            if ($(this).is(':checked')) {
                $('#front_office_container').show();
            }
            else {
                $('#front_office_container').hide();
            }
        });
    </script>
@endsection
