@extends('layouts.master')

@section('title')
    {{ __('event-notice') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('event-notice') }}
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('create') . ' ' . __('event-notice') }}
                        </h4>
                        <form class="pt-3 student-registration-form" enctype="multipart/form-data"
                            action="{{ route('event-notice.store') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('title') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('title', null, ['placeholder' => __('title'), 'class' => 'form-control', 'required' => true]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('file_upload') }} </label>
                                    <input type="file" name="file_upload" class="file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="{{ __('file_upload') }}" required="required" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button">{{ __('file_upload') }}</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('order') }}</label>
                                    {!! Form::text('order', null, ['placeholder' => __('order'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label>{{ __('new') }}</label>
                                    {!! Form::checkbox('is_new', '1', false, ['placeholder' => __('new')]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('type') }} <span class="text-danger">*</span></label>
                                    <select required name="type" class="form-control">
                                        <option value="" selected disabled>{{ __('select') . ' ' . __('type') }}</option>
                                        <option value="EVENT">Event</option>
                                        <option value="NOTICE">Notice</option>
                                    </select>
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
{{-- @section('script')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection --}}
