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
                            {{ __('list') . ' ' . __('resume-submit') }}
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table table-responsive' id='table_list'
                                    data-toggle="table" data-url="{{ url('resume-submit-list') }}"
                                    data-click-to-select="true" data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200, All]" data-search="true"
                                    data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                    data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                    data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                    data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "resume-submit-list-<?= date('d-m-y') ?>"
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
                                            <th scope="col" data-field="candidate_name" data-sortable="false">
                                                {{ __('candidate_name') }}</th>
                                            <th scope="col" data-field="father_name" data-sortable="false">
                                                {{ __('father_name') }}</th>
                                            <th scope="col" data-field="mobile" data-sortable="false">
                                                {{ __('mobile') }}</th>
                                            <th scope="col" data-field="apply_for" data-sortable="false">
                                                {{ __('apply_for') }}</th>
                                            <th scope="col" data-field="highest_qualification" data-sortable="false">
                                                {{ __('highest_qualification') }}</th>
                                            <th scope="col" data-field="current_organization" data-sortable="false">
                                                {{ __('current_organization') }}</th>
                                            <th scope="col" data-field="address" data-sortable="false">
                                                {{ __('address') }}</th>
                                            {{-- @canany(['employee-edit', 'employee-delete']) --}}
                                            <th data-events="resumeSubmitEvents" scope="col" data-field="operate"
                                                data-sortable="false">{{ __('action') }}</th>
                                            {{-- @endcanany --}}
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

    {{-- @can('student-edit') --}}
    <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">{{ __('edit') . ' ' . __('resume-submit') }}</h4><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="edit-form" class="edit-student-registration-form" novalidate="novalidate"
                    action="{{ url('resume-submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('candidate_name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('candidate_name', null, [
                                    'placeholder' => __('candidate_name'),
                                    'class' => 'form-control',
                                    'id' => 'edit_candidate_name',
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
                                <label>{{ __('mobile') }} <span class="text-danger">*</span></label>
                                {!! Form::text('mobile', null, [
                                    'placeholder' => __('mobile'),
                                    'class' => 'form-control',
                                    'id' => 'edit_mobile',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('apply_for') }} <span class="text-danger">*</span></label>
                                {!! Form::text('apply_for', null, [
                                    'placeholder' => __('apply_for'),
                                    'class' => 'form-control',
                                    'id' => 'edit_apply_for',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('highest_qualification') }} <span class="text-danger">*</span></label>
                                {!! Form::text('highest_qualification', null, [
                                    'placeholder' => __('highest_qualification'),
                                    'class' => 'form-control',
                                    'id' => 'edit_highest_qualification',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('current_organization') }} <span class="text-danger">*</span></label>
                                {!! Form::text('current_organization', null, [
                                    'placeholder' => __('current_organization'),
                                    'class' => 'form-control',
                                    'id' => 'edit_current_organization',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('address') }} <span class="text-danger">*</span></label>
                                {!! Form::text('address', null, [
                                    'placeholder' => __('address'),
                                    'class' => 'form-control',
                                    'id' => 'edit_address',
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
    {{-- @endcan --}}
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
@endsection
