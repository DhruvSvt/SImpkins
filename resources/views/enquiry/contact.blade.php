@extends('layouts.master')

@section('title')
    {{ __('contact-enquiry') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('contact-enquiry') }}
            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('list') . ' ' . __('contact-enquiry') }}
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table table-responsive' id='table_list'
                                    data-toggle="table" data-url="{{ url('contact-enquiry-list') }}" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200, All]" data-search="true"
                                    data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                    data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                    data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                    data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "contact-enquiry-list-<?= date('d-m-y') ?>"
                                    ,"ignoreColumn":
                                    ["operate"]}' data-query-params="StudentDetailQueryParams"
                                    data-check-on-init="true">

                                    <thead>
                                        <tr>
                                            <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                {{ __('id') }}</th>
                                            <th scope="col" data-field="no" data-sortable="true">{{ __('no') }}</th>
                                            <th scope="col" data-field="name" data-sortable="false">
                                                {{ __('name') }}</th>
                                            {{-- <th scope="col" data-field="link" data-sortable="false">
                                                {{ __('link') }}</th> --}}
                                            <th scope="col" data-field="email" data-sortable="false">
                                                {{ __('email') }}</th>
                                            <th scope="col" data-field="mobile" data-sortable="false">
                                                {{ __('mobile') }}</th>
                                            <th scope="col" data-field="comments" data-sortable="false">
                                                {{ __('comments') }}</th>
                                            {{-- @canany(['contact-enquiry-edit', 'contact-enquiry-delete']) --}}
                                            <th data-events="noticeEvents" scope="col" data-field="operate"
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

    {{-- @can('contact-enquiry-edit') --}}
    {{-- <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">{{ __('edit') . ' ' . __('contact-enquiry') }}</h4><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="edit-form" class="edit-student-registration-form" novalidate="novalidate"
                    action="{{ url('contact-enquiry') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('title') }} <span class="text-danger">*</span></label>
                                {!! Form::text('title', null, [
                                    'placeholder' => __('title'),
                                    'class' => 'form-control',
                                    'id' => 'edit_title',
                                    'required' => true,
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('link') }} </label>
                                <input type="file" name="link" class="file-upload-default" />
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="{{ __('link') }}" required="required"
                                        id="edit_link" />
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-theme"
                                            type="button">{{ __('upload') }}</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('order') }} </label>
                                {!! Form::text('order', null, [
                                    'placeholder' => __('order'),
                                    'class' => 'form-control',
                                    'id' => 'edit_order',
                                    'required' => true,
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('new') }} </label>
                                {!! Form::checkbox('is_new', '1', false, [
                                    'placeholder' => __('new'),
                                    'class' => 'form-control',
                                    'id' => 'edit_is_new',
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('type') }} <span class="text-danger">*</span></label>
                                <select required name="type" class="form-control" id="edit_type">
                                    <option value="" selected disabled>{{ __('select') . ' ' . __('type') }}</option>
                                    <option value="EVENT">Event</option>
                                    <option value="NOTICE">Notice</option>
                                </select>
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
    </div> --}}
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
