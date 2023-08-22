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
                            {{ __('list') . ' ' . __('employees') }}
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table table-responsive' id='table_list'
                                    data-toggle="table" data-url="{{ url('employees-list') }}" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200, All]" data-search="true"
                                    data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                    data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                    data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                    data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "employees-list-<?= date('d-m-y') ?>"
                                    ,"ignoreColumn":
                                    ["operate"]}' data-query-params="StudentDetailQueryParams"
                                    data-check-on-init="true">

                                    <thead>
                                        <tr>
                                            <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                {{ __('id') }}</th>
                                            <th scope="col" data-field="no" data-sortable="true">{{ __('no') }}</th>
                                            <th scope="col" data-field="user_id" data-sortable="false"
                                                data-visible="false">{{ __('user_id') }}</th>
                                            <th scope="col" data-field="employee_code" data-sortable="false">
                                                {{ __('employee_code') }}</th>
                                            <th scope="col" data-field="is_front_office_text" data-sortable="false">
                                                {{ __('front_office') }}</th>
                                            <th scope="col" data-field="first_name" data-sortable="false">
                                                {{ __('first_name') }}</th>
                                            <th scope="col" data-field="last_name" data-sortable="false">
                                                {{ __('last_name') }}</th>
                                            <th scope="col" data-field="father_name" data-sortable="false">
                                                {{ __('father') . ' ' . __('name') }}</th>
                                            <th scope="col" data-field="mother_name" data-sortable="false">
                                                {{ __('mother') . ' ' . __('name') }}</th>
                                            <th scope="col" data-field="religion" data-sortable="false">
                                                {{ __('religion') }}</th>
                                            <th scope="col" data-field="gender" data-sortable="false">
                                                {{ __('gender') }}</th>
                                            <th scope="col" data-field="category" data-sortable="false">
                                                {{ __('category') }}</th>
                                            <th scope="col" data-field="dob" data-sortable="false">{{ __('dob') }}
                                            </th>
                                            <th scope="col" data-field="designation" data-sortable="false">
                                                {{ __('designation') }}
                                            </th>
                                            <th scope="col" data-field="date_of_joining" data-sortable="false">
                                                {{ __('date_of_joining') }}</th>
                                            <th scope="col" data-field="address" data-sortable="false">
                                                {{ __('address') }}</th>
                                            <th scope="col" data-field="aadhar_card" data-sortable="false">
                                                {{ __('aadhar_card') }}</th>
                                            <th scope="col" data-field="pancard" data-sortable="false">
                                                {{ __('pancard') }}</th>
                                            <th scope="col" data-field="bank_name" data-sortable="false">
                                                {{ __('bank_name') }}</th>
                                            <th scope="col" data-field="bank_acc_no" data-sortable="false">
                                                {{ __('bank_acc_no') }}</th>
                                            <th scope="col" data-field="ifsc_code" data-sortable="false">
                                                {{ __('ifsc_code') }}</th>
                                            @canany(['employee-edit', 'employee-delete'])
                                                <th data-events="employeeEvents" scope="col" data-field="operate"
                                                    data-sortable="false">{{ __('action') }}</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can('student-edit')
        <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('edit') . ' ' . __('employees') }}</h4><br>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
                    </div>
                    <form id="edit-form" class="edit-student-registration-form" novalidate="novalidate"
                        action="{{ url('employees') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="edit_id" id="edit_id">

                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('employee_code') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('employee_code', null, [
                                        'placeholder' => __('employee_code'),
                                        'class' => 'form-control',
                                        'id' => 'edit_employee_code',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('name', null, [
                                        'placeholder' => __('name'),
                                        'class' => 'form-control',
                                        'id' => 'edit_name',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('father_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('father_name', null, [
                                        'placeholder' => __('father_name'),
                                        'class' => 'form-control',
                                        'id' => 'edit_father_name',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('mother_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('mother_name', null, [
                                        'placeholder' => __('mother_name'),
                                        'class' => 'form-control',
                                        'id' => 'edit_mother_name',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('religion') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('religion', null, [
                                        'placeholder' => __('religion'),
                                        'class' => 'form-control',
                                        'id' => 'edit_religion',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label>{{ __('gender') }} <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('gender', 'male', ['id' => 'gender']) !!}
                                                {{ __('male') }}
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('gender', 'female', ['id' => 'gender']) !!}
                                                {{ __('female') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('category') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('category', null, [
                                        'placeholder' => __('category'),
                                        'class' => 'form-control',
                                        'id' => 'edit_category',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('image') }} <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="{{ __('image') }}" required="required" id="edit_image" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button">{{ __('upload') }}</button>
                                        </span>
                                    </div>
                                    <div style="width: 100px;">
                                        <img src="" id="edit-employee-image-tag" class="img-fluid w-100" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('dob') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('dob', null, [
                                        'readonly',
                                        'placeholder' => __('dob'),
                                        'class' => 'datepicker-popup form-control',
                                        'id' => 'edit_dob',
                                    ]) !!}
                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('designation') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('designation', null, [
                                        'placeholder' => __('designation'),
                                        'class' => 'form-control',
                                        'id' => 'edit_designation',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('date_of_joining') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('date_of_joining', null, [
                                        'readonly',
                                        'placeholder' => __('date_of_joining'),
                                        'class' => 'datepicker-popup form-control',
                                        'id' => 'edit_date_of_joining',
                                    ]) !!}
                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('address') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('address', null, [
                                        'placeholder' => __('address'),
                                        'class' => 'form-control',
                                        'id' => 'edit_address',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('aadhar_card') }}</label>
                                    {!! Form::text('aadhar_card', null, [
                                        'placeholder' => __('aadhar_card'),
                                        'class' => 'form-control',
                                        'id' => 'edit_aadhar_card',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('pancard') }}</label>
                                    {!! Form::text('pancard', null, [
                                        'placeholder' => __('pancard'),
                                        'class' => 'form-control',
                                        'id' => 'edit_pancard',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('bank_name') }}</label>
                                    {!! Form::text('bank_name', null, [
                                        'placeholder' => __('bank_name'),
                                        'class' => 'form-control',
                                        'id' => 'edit_bank_name',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('bank_acc_no') }}</label>
                                    {!! Form::text('bank_acc_no', null, [
                                        'placeholder' => __('bank_acc_no'),
                                        'class' => 'form-control',
                                        'id' => 'edit_bank_acc_no',
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('ifsc_code') }}</label>
                                    {!! Form::text('ifsc_code', null, [
                                        'placeholder' => __('ifsc_code'),
                                        'class' => 'form-control',
                                        'id' => 'edit_ifsc_code',
                                    ]) !!}

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-md-3">
                                    <label>{{ __('front_office') }}</label>
                                    {{ Form::checkbox('is_front_office', '1', false, ['id' => 'edit_is_front_office', 'placeholder' => __('is_front_office')]) }}
                                </div>
                                <div class="row" id="front_office_container" style="display: none">
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label>{{ __('email') }} <span class="text-danger">*</span></label>
                                        {!! Form::email('email', null, [
                                            'id' => 'edit_email',
                                            'placeholder' => __('email'),
                                            'class' => 'form-control',
                                            'required' => true,
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label>{{ __('password') }} <span class="text-danger">*</span></label>
                                        {!! Form::password('password', null, [
                                            'id' => 'edit_password',
                                            'placeholder' => __('password'),
                                            'class' => 'form-control',
                                            'autocomplete' => 'off',
                                            'required' => true,
                                        ]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-theme" type="submit" value={{ __('submit') }}>
                            <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
@endsection


@section('js')
    <script type="text/javascript">
        function queryParams(p) {
            return {
                limit: p.limit,
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                search: p.search
            };
        }
    </script>
    <script>
        $('#edit_is_front_office').change(function() {
            if ($(this).is(':checked')) {
                $('#front_office_container').show();
            } else {
                $('#front_office_container').hide();
            }
        });
    </script>
@endsection
