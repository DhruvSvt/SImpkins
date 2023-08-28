@extends('layouts.master')

@section('title')
    {{ __('students') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('students') }}
            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('create') . ' ' . __('students') }}
                        </h4>
                        <form class="pt-3 student-registration-form" enctype="multipart/form-data"
                            action="{{ route('students.store') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('full_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('full_name', null, ['placeholder' => __('full_name'), 'class' => 'form-control']) !!}

                                </div>
                                {{-- <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('last_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('last_name', null, ['placeholder' => __('last_name'), 'class' => 'form-control']) !!}

                                </div> --}}
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('mobile') }}</label>
                                    {!! Form::text('mobile', null, ['placeholder' => __('mobile'), 'class' => 'form-control']) !!}
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
                                    <label>{{ __('image') }} </label>
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
                                    <label>{{ __('dob') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('dob', null, ['placeholder' => __('dob'), 'class' => 'datepicker-popup form-control']) !!}
                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('class') . ' ' . __('section') }} <span
                                            class="text-danger">*</span></label>
                                    <select name="class_section_id" id="class_section" class="form-control select2">
                                        <option value="">{{ __('select') . ' ' . __('class') . ' ' . __('section') }}
                                        </option>
                                        @foreach ($class_section as $section)
                                            <option value="{{ $section->id }}">{{ $section->class->name }} -
                                                {{ $section->section->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label> {{ __('category') }} <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control">
                                        <option value="">{{ __('select') . ' ' . __('category') }}</option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('admission_no') }}</label>
                                    {!! Form::text('admission_no', $admission_no, [
                                        'placeholder' => __('admission_no'),
                                        'class' => 'form-control',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('roll_no') }}</label>
                                    {!! Form::text('roll_number', null, ['placeholder' => __('roll_no'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('caste') }}</label>
                                    {!! Form::text('caste', null, ['placeholder' => __('caste'), 'class' => 'form-control']) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('religion') }}</label>
                                    {!! Form::text('religion', null, ['placeholder' => __('religion'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('admission_date') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('admission_date', null, [
                                        'readonly',
                                        'placeholder' => __('admission_date'),
                                        'class' => 'datepicker-popup form-control',
                                    ]) !!}
                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('blood_group') }}</label>
                                    <select name="blood_group" class="form-control">
                                        <option value="">{{ __('select') . ' ' . __('blood_group') }}</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('session') }} </label>
                                    {!! Form::text('session', null, ['placeholder' => __('session'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('status') }} </label>
                                    <select name="status" class="form-control">
                                        <option value="">{{ __('select') . ' ' . __('status') }}</option>
                                        <option value="1">Active</option>
                                        <option value="0-">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label>{{ __('current_address') }} <span class="text-danger">*</span></label>
                                    {!! Form::textarea('current_address', null, [
                                        'placeholder' => __('current_address'),
                                        'class' => 'form-control',
                                        'id' => 'current_address',
                                        'rows' => 2,
                                    ]) !!}
                                </div>
                                <div class="form-group col-12">
                                    <label>{{ __('permanent_address') }}</label>
                                    {!! Form::textarea('permanent_address', null, [
                                        'placeholder' => __('permanent_address'),
                                        'class' => 'form-control',
                                        'id' => 'permanent_address',
                                        'rows' => 2,
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('admitted_class') }}</label>
                                    {!! Form::text('admitted_class', null, ['placeholder' => __('admitted_class'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-12 d-flex">
                                    <div class="col-sm-12 col-md-3">
                                        <label>{{ __('aadhar_card') }}</label>
                                        {!! Form::number('aadhar_card', null, ['placeholder' => __('aadhar_card'), 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <label>{{ __('is_handicap') }}</label>
                                        {{ Form::checkbox('is_handicap', '1', false, ['placeholder' => __('is_handicap')]) }}
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <label>{{ __('is_only_child') }}</label>
                                        {{ Form::checkbox('is_only_child', '1', false, ['placeholder' => __('is_only_child')]) }}
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <label>{{ __('is_minority') }}</label>
                                        {{ Form::checkbox('is_minority', '1', false, ['placeholder' => __('is_minority')]) }}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>{{ __('parent_guardian_details') }}</h4><br>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label>{{ __('father_email') }}</label>
                                    <select class="father-search w-100" id="father_email" name="father_email"></select>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('father') . ' ' . __('full_name') }} <span
                                            class="text-danger">*</span></label>
                                    {!! Form::text('father_full_name', null, [
                                        'placeholder' => __('father') . ' ' . __('full_name'),
                                        'class' => 'form-control',
                                        'id' => 'father_full_name',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('father') . ' ' . __('mobile') }}<span class="text-danger">*</span></label>
                                    {!! Form::text('father_mobile', null, [
                                        'placeholder' => __('father') . ' ' . __('mobile'),
                                        'class' => 'form-control',
                                        'id' => 'father_mobile',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('father') . ' ' . __('dob') }}</label>
                                    {!! Form::text('father_dob', null, [
                                        'placeholder' => __('father') . ' ' . __('dob'),
                                        'class' => 'form-control datepicker-popup form-control',
                                        'id' => 'father_dob',
                                    ]) !!}
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('father') . ' ' . __('occupation') }}</label>
                                    {!! Form::text('father_occupation', null, [
                                        'placeholder' => __('father') . ' ' . __('occupation'),
                                        'class' => 'form-control',
                                        'id' => 'father_occupation',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('father') . ' ' . __('image') }}</label>
                                    <input type="file" name="father_image" class="father_image file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="{{ __('father') . ' ' . __('image') }}" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button">{{ __('upload') }}</button>
                                        </span>
                                    </div>
                                    <div style="width: 100px;">
                                        <img src="" id="father-image-tag" class="img-fluid w-100" />
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('father') . ' ' . __('annual_income') }}</label>
                                    {!! Form::text('father_annual_income', null, [
                                        'placeholder' => __('father') . ' ' . __('annual_income'),
                                        'class' => 'form-control',
                                        'id' => 'father_annual_income',
                                    ]) !!}
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label>{{ __('mother_email') }} </label>
                                    <select class="mother-search w-100" id="mother_email" name="mother_email"></select>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('mother') . ' ' . __('full_name') }} <span
                                            class="text-danger">*</span></label>
                                    {!! Form::text('mother_full_name', null, [
                                        'placeholder' => __('mother') . ' ' . __('full_name'),
                                        'class' => 'form-control',
                                        'id' => 'mother_full_name',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('mother') . ' ' . __('mobile') }} <span
                                            class="text-danger">*</span></label>
                                    {!! Form::text('mother_mobile', null, [
                                        'placeholder' => __('mother') . ' ' . __('mobile'),
                                        'class' => 'form-control',
                                        'id' => 'mother_mobile',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('mother') . ' ' . __('dob') }} </label>
                                    {!! Form::text('mother_dob', null, [
                                        'placeholder' => __('mother') . ' ' . __('dob'),
                                        'class' => 'form-control datepicker-popup form-control',
                                        'id' => 'mother_dob',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('mother') . ' ' . __('occupation') }}</label>
                                    {!! Form::text('mother_occupation', null, [
                                        'placeholder' => __('mother') . ' ' . __('occupation'),
                                        'class' => 'form-control',
                                        'id' => 'mother_occupation',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('mother') . ' ' . __('image') }}</label>
                                    <input type="file" name="mother_image" class="mother_image file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="{{ __('mother') . ' ' . __('image') }}" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button">{{ __('upload') }}</button>
                                        </span>
                                    </div>
                                    <div style="width: 100px;">
                                        <img src="" id="mother-image-tag" class="img-fluid w-100" />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"
                                            id="show-guardian-details">{{ __('guardian_details') }}
                                    </label>
                                </div>
                            </div>
                            <div class="row" id="guardian_div" style="display:none;">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label>{{ __('guardian') . ' ' . __('email') }}</label>
                                    <select class="guardian-search form-control" id="guardian_email"
                                        name="guardian_email"></select>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('guardian') . ' ' . __('full_name') }}</label>
                                    {!! Form::text('guardian_full_name', null, [
                                        'placeholder' => __('guardian') . ' ' . __('full_name'),
                                        'class' => 'form-control',
                                        'id' => 'guardian_full_name',
                                    ]) !!}
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('guardian') . ' ' . __('mobile') }}</label>
                                    {!! Form::text('guardian_mobile', null, [
                                        'placeholder' => __('guardian') . ' ' . __('mobile'),
                                        'class' => 'form-control',
                                        'id' => 'guardian_mobile',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label>{{ __('gender') }}</label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('guardian_gender', 'male') !!}
                                                {{ __('male') }}
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('guardian_gender', 'female') !!}
                                                {{ __('female') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('guardian') . ' ' . __('dob') }}</label>
                                    {!! Form::text('guardian_dob', null, [
                                        'placeholder' => __('guardian') . ' ' . __('dob'),
                                        'class' => 'form-control datepicker-popup form-control',
                                        'id' => 'guardian_dob',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('guardian') . ' ' . __('occupation') }}</label>
                                    {!! Form::text('guardian_occupation', null, [
                                        'placeholder' => __('guardian') . ' ' . __('occupation'),
                                        'class' => 'form-control',
                                        'id' => 'guardian_occupation',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('guardian') . ' ' . __('image') }}</label>
                                    <input type="file" name="guardian_image"
                                        class="guardian_image file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="{{ __('guardian') . ' ' . __('image') }}" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button">{{ __('upload') }}</button>
                                        </span>
                                    </div>
                                    <div style="width: 100px;">
                                        <img src="" id="guardian-image-tag" class="img-fluid w-100" />
                                    </div>
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
