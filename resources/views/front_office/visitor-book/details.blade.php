@extends('layouts.master')

@section('title')
    {{ __('student-book') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('student-book') }}
            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('list') . ' ' . __('student-book') }}
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table table-responsive' id='table_list'
                                    data-toggle="table" data-url="{{ url('visitor-book-list') }}" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200, All]" data-search="true"
                                    data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                    data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                    data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                    data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "student-book-list-<?= date('d-m-y') ?>"
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
                                            <th scope="col" data-field="visitor_name" data-sortable="false">
                                                {{ __('visitor_name') }}</th>
                                            <th scope="col" data-field="date" data-sortable="false">
                                                {{ __('date') }}</th>
                                            <th scope="col" data-field="in_time" data-sortable="false">
                                                {{ __('in_time') }}</th>
                                            <th scope="col" data-field="out_time" data-sortable="false">
                                                {{ __('out_time') }}</th>
                                            <th scope="col" data-field="purpose" data-sortable="false">
                                                {{ __('purpose') }}</th>
                                            <th scope="col" data-field="remarks" data-sortable="false">
                                                {{ __('remarks') }}</th>

                                            @canany(['resume-submit-edit', 'resume-submit-delete'])
                                            <th data-events="visitorRoomEvents" scope="col" data-field="operate"
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

    @can('resume-submit-edit')
    <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">{{ __('edit') . ' ' . __('student-book') }}</h4><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="edit-form" class="edit-student-registration-form" novalidate="novalidate"
                    action="{{ url('visitor-book') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="edit_id">

                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('visitor_name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('visitor_name', null, [
                                    'placeholder' => __('visitor_name'),
                                    'class' => 'form-control',
                                    'id' => 'edit_visitor_name',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('date') }} <span class="text-danger">*</span></label>
                                {!! Form::text('date', null, [
                                    'placeholder' => __('date'),
                                    'class' => 'datepicker-popup form-control',
                                    'id' => 'edit_date',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('in_time') }} <span class="text-danger">*</span></label>
                                {!! Form::time('in_time', null, [
                                    'placeholder' => __('in_time'),
                                    'class' => 'form-control',
                                    'id' => 'edit_in_time',
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('out_time') }} <span class="text-danger">*</span></label>
                                {!! Form::time('out_time', null, [
                                    'placeholder' => __('out_time'),
                                    'class' => 'form-control',
                                    'id' => 'edit_out_time',
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('purpose') }} <span class="text-danger">*</span></label>
                                {!! Form::text('purpose', null, [
                                    'placeholder' => __('purpose'),
                                    'class' => 'form-control',
                                    'id' => 'edit_purpose',
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('remarks') }} <span class="text-danger">*</span></label>
                                {!! Form::text('remarks', null, [
                                    'placeholder' => __('remarks'),
                                    'class' => 'form-control',
                                    'id' => 'edit_remarks',
                                ]) !!}
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
