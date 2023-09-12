@extends('layouts.master')

@section('title')
    {{ __('pages') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('pages') }}
            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('list') . ' ' . __('pages') }}
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table table-responsive' id='table_list'
                                    data-toggle="table" data-url="{{ url('pages-list') }}" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200, All]" data-search="true"
                                    data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                    data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                    data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                    data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "pages-list-<?= date('d-m-y') ?>"
                                    ,"ignoreColumn":
                                    ["operate"]}' data-query-params="StudentDetailQueryParams"
                                    data-check-on-init="true">
                                    

                                    <thead>
                                        <tr>
                                            <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                {{ __('id') }}</th>
                                            <th scope="col" data-field="no" data-sortable="true">{{ __('no') }}</th>
                                            <th scope="col" data-field="page_name" data-sortable="false">
                                                {{ __('page') . ' ' . _('name') }}</th>
                                            <th scope="col" data-field="slug" data-sortable="false">
                                                {{ __('slug') }}</th>
                                            <th scope="col" data-field="menu_name" data-sortable="false">
                                                {{ __('menu') . ' ' . _('name') }}</th>
                                            <th scope="col" data-field="banner_image"
                                                data-formatter="bannerImageFormatter" data-sortable="false">
                                                {{ __('banner_image') }}</th>
                                            <th scope="col" data-field="content_image"
                                                data-formatter="contentImageFormatter" data-sortable="false">
                                                {{ __('content_image') }}</th>
                                            {{-- @canany(['pages-edit', 'pages-delete']) --}}
                                            <th data-events="pageEvents" scope="col" data-field="operate"
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

    {{-- @can('pages-edit') --}}
    <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">{{ __('edit') . ' ' . __('pages') }}</h4><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="edit-form" class="edit-student-registration-form" novalidate="novalidate"
                    action="{{ url('pages') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('page') . ' ' . __('name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('page_name', null, [
                                    'placeholder' => __('page') . ' ' . __('name'),
                                    'class' => 'form-control',
                                    'id' => 'edit_page_name',
                                    'required' => true,
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('menu') }} <span class="text-danger">*</span></label>
                                <select required name="menu_id" class="form-control" id="edit_menu_id">
                                    <option value="">{{ __('select') . ' ' . __('menu') }}
                                    </option>
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('banner_image') }}</label>
                                <input type="file" name="banner_image" class="file-upload-default" />
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="{{ __('banner_image') }}" required="required"
                                        id="edit_banner_image" />
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-theme"
                                            type="button">{{ __('upload') }}</button>
                                    </span>
                                </div>
                                <div style="width: 100px;">
                                    <img src="" id="edit-banner-image-tag" class="img-fluid w-100" />
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>{{ __('content') }} <span class="text-danger">*</span></label>
                                <textarea class="ckeditor form-control" id="usingckeditor" name="content" placeholder="Content"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{{ __('content-image') }}</label>
                                <input type="file" name="content_image" class="file-upload-default" />
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="{{ __('content-image') }}" required="required"
                                        id="edit_content_image" />
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-theme"
                                            type="button">{{ __('upload') }}</button>
                                    </span>
                                </div>
                                <div style="width: 100px;">
                                    <img src="" id="edit-content-image-tag" class="img-fluid w-100" />
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
