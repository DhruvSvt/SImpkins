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
                            {{ __('list') . ' ' . __('admission-enquiry') }}
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table table-responsive' id='table_list'
                                    data-toggle="table" data-url="{{ url('admission-enquiry-list') }}" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200, All]" data-search="true"
                                    data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                    data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                    data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                    data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "admission-enquiry-list-<?= date('d-m-y') ?>"
                                    ,"ignoreColumn":
                                    ["operate"]}' data-query-params="StudentDetailQueryParams"
                                    data-check-on-init="true">

                                    <thead>
                                        <tr>
                                            <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                {{ __('id') }}</th>
                                            <th scope="col" data-field="no" data-sortable="true">{{ __('no') }}</th>
                                            {{-- <th scope="col" data-field="user_id" data-sortable="false"
                                                data-visible="false">{{ __('user_id') }}</th> --}}
                                            <th scope="col" data-field="student_name" data-sortable="false">
                                                {{ __('student_name') }}</th>
                                            <th scope="col" data-field="admitted_class" data-sortable="false">
                                                {{ __('admitted_class') }}</th>
                                            <th scope="col" data-field="previous_school_name" data-sortable="false">
                                                {{ __('previous_school_name') }}</th>
                                            <th scope="col" data-field="father_name" data-sortable="false">
                                                {{ __('father') . ' ' . __('name') }}</th>
                                            <th scope="col" data-field="mother_name" data-sortable="false">
                                                {{ __('mother') . ' ' . __('name') }}</th>
                                            <th scope="col" data-field="last_class" data-sortable="false">
                                                {{ __('last_class') }}</th>
                                            <th scope="col" data-field="father_mobile" data-sortable="false">
                                                {{ __('father_mobile') }}</th>
                                            <th scope="col" data-field="address" data-sortable="false">
                                                {{ __('address') }}</th>
                                            <th scope="col" data-field="date" data-sortable="false">
                                                {{ __('date') }}</th>
                                            @canany(['admission-enquiry-edit', 'admission-enquiry-delete'])
                                            <th data-events="admissionEnquiryEvents" scope="col" data-field="operate"
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

    @can('admission-enquiry-edit')
    <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">{{ __('edit') . ' ' . __('admission-enquiry') }}</h4><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="edit-form" class="edit-student-registration-form" novalidate="novalidate"
                    action="{{ url('admission-enquiry') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('student_name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('student_name', null, [
                                    'placeholder' => __('student_name'),
                                    'class' => 'form-control',
                                    'id' => 'edit_student_name',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('admitted_class') }} <span class="text-danger">*</span></label>
                                {!! Form::text('admitted_class', null, [
                                    'placeholder' => __('admitted_class'),
                                    'class' => 'form-control',
                                    'id' => 'edit_admitted_class',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('previous_school_name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('previous_school_name', null, [
                                    'placeholder' => __('previous_school_name'),
                                    'class' => 'form-control',
                                    'id' => 'edit_previous_school_name',
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
                                <label>{{ __('last_class') }} <span class="text-danger">*</span></label>
                                {!! Form::text('last_class', null, [
                                    'placeholder' => __('last_class'),
                                    'class' => 'form-control',
                                    'id' => 'edit_last_class',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('father_mobile') }} <span class="text-danger">*</span></label>
                                {!! Form::text('father_mobile', null, [
                                    'readonly',
                                    'placeholder' => __('father_mobile'),
                                    'class' => 'datepicker-popup form-control',
                                    'id' => 'edit_father_mobile',
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
                                <label>{{ __('date') }} <span class="text-danger">*</span></label>
                                {!! Form::text('date', null, [
                                    'readonly',
                                    'placeholder' => __('date'),
                                    'class' => 'datepicker-popup form-control',
                                    'id' => 'edit_date',
                                ]) !!}
                                <span class="input-group-addon input-group-append">
                                </span>
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
