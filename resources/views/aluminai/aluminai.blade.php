@extends('layouts.master')

@section('title')
    {{ __('aluminai') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('aluminai') }}
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('create') . ' ' . __('aluminai') }}
                        </h4>
                        <form class="pt-3 student-registration-form" enctype="multipart/form-data"
                            action="{{ route('aluminai.store') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('name', null, ['placeholder' => __('name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('description') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('std_title', null, ['placeholder' => __('Student Titile'), 'class' => 'form-control']) !!}
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
                                {{-- <div class="form-group col-12">
                                    <label>{{ __('description') }} <span class="text-danger">*</span></label>
                                    {!! Form::textarea('description', null, ['placeholder' => __('description'), 'class' => 'form-control', 'rows' => 2]) !!}
                                </div> --}}
                            </div>
                            <input class="btn btn-theme" type="submit" value={{ __('submit') }}>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
