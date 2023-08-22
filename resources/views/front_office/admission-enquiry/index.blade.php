@extends('layouts.master')

@section('title')
    {{ __('admission-enquiry') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('admission-enquiry') }}
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('create') . ' ' . __('admission-enquiry') }}
                        </h4>
                        <form class="pt-3 student-registration-form" enctype="multipart/form-data"
                            action="{{ route('admission-enquiry.store') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('student') . ' ' . __('name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('student_name', null, ['placeholder' => __('student') . ' ' . __('name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('admitted_class') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('admitted_class', null, ['placeholder' => __('admitted_class'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('previous_school_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('previous_school_name', null, [
                                        'placeholder' => __('previous_school_name'),
                                        'class' => 'form-control',
                                    ]) !!}
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
                                    <label>{{ __('last_class') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('last_class', null, ['placeholder' => __('last_class'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('father_mobile') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('father_mobile', null, ['placeholder' => __('father_mobile'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-12">
                                    <label>{{ __('address') }} <span class="text-danger">*</span></label>
                                    {!! Form::textarea('address', null, [
                                        'placeholder' => __('address'),
                                        'class' => 'form-control',
                                        'id' => 'address',
                                        'rows' => 2,
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('date') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('date', null, [
                                        'placeholder' => __('date'),
                                        'class' => 'form-control datepicker-popup form-control',
                                    ]) !!}
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
