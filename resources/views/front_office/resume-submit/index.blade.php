@extends('layouts.master')

@section('title')
    {{ __('resume-submit') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('resume-submit') }}
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('create') . ' ' . __('resume-submit') }}
                        </h4>
                        <form class="pt-3 student-registration-form" enctype="multipart/form-data"
                            action="{{ route('resume-submit.store') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('candidate_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('candidate_name', null, ['placeholder' => __('candidate_name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('father_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('father_name', null, ['placeholder' => __('father_name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('mobile') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('mobile', null, ['placeholder' => __('mobile'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('apply_for') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('apply_for', null, ['placeholder' => __('apply_for'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('highest_qualification') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('highest_qualification', null, [
                                        'placeholder' => __('highest_qualification'),
                                        'class' => 'form-control form-control',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('current_organization') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('current_organization', null, [
                                        'placeholder' => __('current_organization'),
                                        'class' => 'form-control form-control',
                                    ]) !!}
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
                            </div>
                            <input class="btn btn-theme" type="submit" value={{ __('submit') }}>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
