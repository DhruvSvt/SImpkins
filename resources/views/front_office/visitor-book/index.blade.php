@extends('layouts.master')

@section('title')
    {{ __('visitor-book') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('visitor-book') }}
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('create') . ' ' . __('visitor-book') }}
                        </h4>
                        <form class="pt-3 student-registration-form" enctype="multipart/form-data"
                            action="{{ route('visitor-book.store') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('visitor_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('visitor_name', null, ['placeholder' => __('visitor_name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('date') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('date', null, ['placeholder' => __('date'), 'class' => 'datepicker-popup form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('in_time') }} <span class="text-danger">*</span></label>
                                    {!! Form::time('in_time', null, ['placeholder' => __('in_time'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('out_time') }} </label>
                                    {!! Form::time('out_time', null, ['placeholder' => __('out_time'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('purpose') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('purpose', null, ['placeholder' => __('purpose'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('remarks') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('remarks', null, ['placeholder' => __('remarks'), 'class' => 'form-control']) !!}
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
