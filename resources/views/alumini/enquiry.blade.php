@extends('layouts.master')

@section('title')
{{ __('alumini-enquiry') }}
@endsection

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('manage') . ' ' . __('alumini-enquiry') }}
        </h3>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ __('list') . ' ' . __('alumini-enquiry') }}
                    </h4>
                    <div class="row">
                        <div class="col-12">
                            <table aria-describedby="mydesc" class='table table-responsive' id='table_list'
                                data-toggle="table" data-url="{{ route('alumini.show') }}" data-click-to-select="true"
                                data-side-pagination="server" data-pagination="true"
                                data-page-list="[5, 10, 20, 50, 100, 200, All]" data-search="true"
                                data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                data-export-options='{ "fileName": "alumini.show-<?= date(' d-m-y') ?>"
                                ,"ignoreColumn":
                                ["operate"]}' data-query-params="StudentDetailQueryParams"
                                data-check-on-init="true">

                                <thead>
                                    <tr>
                                        <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                            {{ __('id') }}</th>
                                        <th scope="col" data-field="no" data-sortable="true">{{ __('no') }}</th>
                                        <th scope="col" data-field="image" data-formatter="imageFormatter"
                                            data-sortable="true">{{ __('image') }}</th>
                                        <th scope="col" data-field="first_name" data-sortable="false">
                                            {{ __('first_name') }}</th>
                                        <th scope="col" data-field="last_class" data-sortable="false">
                                            {{ __('last_name') }}</th>
                                        <th scope="col" data-field="dob" data-sortable="false">
                                            {{ __('dob') }}</th>
                                        <th scope="col" data-field="gender" data-sortable="false">
                                            {{ __('gender') }}</th>
                                        <th scope="col" data-field="martial" data-sortable="false">
                                            {{ __('Martial') }}</th>
                                        <th scope="col" data-field="phn_no" data-sortable="false">
                                            {{ __('Phone No') }}</th>
                                        <th scope="col" data-field="profession" data-sortable="false">
                                            {{ __('Profession') }}</th>
                                        <th scope="col" data-field="email" data-sortable="false">
                                            {{ __('email') }}</th>
                                        <th scope="col" data-field="last_class" data-sortable="false">
                                            {{ __('last_class') }}</th>
                                        <th scope="col" data-field="leaving_year" data-sortable="false">
                                            {{ __('Leaving Year') }}</th>
                                        <th scope="col" data-field="batch" data-sortable="false">
                                            {{ __('batch') }}</th>
                                        <th scope="col" data-field="home_town" data-sortable="false">
                                            {{ __('Home Town') }}</th>
                                        <th scope="col" data-field="country" data-sortable="false">
                                            {{ __('Country') }}</th>
                                        {{-- @canany(['contact-enquiry-edit', 'contact-enquiry-delete']) --}}
                                        <th data-events="alumniFetchEvents" scope="col" data-field="operate"
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
