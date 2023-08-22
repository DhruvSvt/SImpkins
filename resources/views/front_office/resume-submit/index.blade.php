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
                                    <label>{{ __('visitor_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('visitor_name', null, ['placeholder' => __('visitor_name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('date') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('date', null, ['placeholder' => __('date'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('in_time') }} <span class="text-danger">*</span></label>
                                    {!! Form::time('in_time', null, ['placeholder' => __('in_time'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('out_time') }} <span class="text-danger">*</span></label>
                                    {!! Form::time('out_time', null, ['placeholder' => __('out_time'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('purpose') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('purpose', null, [
                                        'placeholder' => __('purpose'),
                                        'class' => 'form-control form-control',
                                    ]) !!}
                                </div>
                                <div class="form-group col-12">
                                    <label>{{ __('remarks') }} <span class="text-danger">*</span></label>
                                    {!! Form::textarea('remarks', null, [
                                        'placeholder' => __('remarks'),
                                        'class' => 'form-control',
                                        'id' => 'remarks',
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