@extends('layouts.master')

@section('title')
    {{ __('teacher') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('teacher') }}
            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('list') . ' ' . __('teacher') }}
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table table-responsive' id='table_list'
                                    data-toggle="table" data-url="{{ url('teacher_list') }}" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200, All]" data-search="true"
                                    data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                    data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                    data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                    data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "teacher-list-<?= date('d-m-y') ?>"
                                    ,"ignoreColumn":
                                    ["operate"]}' data-show-export="true" data-query-params="StudentDetailQueryParams"
                                    data-check-on-init="true">

                                    <thead>
                                        <tr>
                                            <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                {{ __('id') }}</th>
                                            <th scope="col" data-field="no" data-sortable="true">{{ __('no') }}</th>
                                            <th scope="col" data-field="user_id" data-sortable="false"
                                                data-visible="false">{{ __('user_id') }}</th>
                                            <th scope="col" data-field="image" data-formatter="imageFormatter" data-sortable="true">{{ __('image') }}</th>
                                            <th scope="col" data-field="teacher_code" data-sortable="false">
                                                {{ __('teacher_code') }}</th>
                                            <th scope="col" data-field="full_name" data-sortable="false">
                                                {{ __('full_name') }}</th>
                                            <th scope="col" data-field="mobile" data-sortable="false">
                                                {{ __('mobile') }}</th>
                                            <th scope="col" data-field="additional_mobile" data-sortable="false">
                                                {{ __('additional_mobile') }}</th>
                                            <th scope="col" data-field="email" data-sortable="false">
                                                {{ __('email') }}</th>
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
                                            <th scope="col" data-field="qualification" data-sortable="false">
                                                {{ __('qualification') }}</th>
                                            <th scope="col" data-field="ifsc_code" data-sortable="false">
                                                {{ __('ifsc_code') }}</th>
                                            <th scope="col" data-field="is_front_office" data-sortable="false">
                                                {{ __('is_front_office') }}</th>
                                            <th scope="col" data-field="spouse" data-sortable="false">
                                                {{ __('spouse') }}</th>
                                            <th scope="col" data-field="marital_status" data-sortable="false">
                                                {{ __('marital_status') }}</th>
                                            <th scope="col" data-field="pincode" data-sortable="false">
                                                {{ __('pincode') }}</th>
                                            <th scope="col" data-field="salary_mode" data-sortable="false">
                                                {{ __('salary_mode') }}</th>
                                            {{-- @canany(['teacher-edit', 'teacher-delete']) --}}
                                                <th data-events="teacherEvents" scope="col" data-field="operate"
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

    {{-- @can('teacher-edit') --}}
        <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('edit') . ' ' . __('teacher') }}</h4><br>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
                    </div>
                    <form id="edit-form" class="edit-student-registration-form" novalidate="novalidate"
                        action="{{ url('teachers') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="edit_id" id="edit_id">

                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('teacher_code') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('teacher_code', null, [
                                        'placeholder' => __('teacher_code'),
                                        'class' => 'form-control',
                                        'id' => 'edit_teacher_code',
                                        'required' => true,
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('name', null, [
                                        'placeholder' => __('name'),
                                        'class' => 'form-control',
                                        'id' => 'edit_name',
                                        'required' => true,
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('mobile') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('mobile', null, [
                                        'placeholder' => __('mobile'),
                                        'class' => 'form-control',
                                        'id' => 'edit_mobile',
                                        'required' => true,
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('additional_mobile') }}</label>
                                    {!! Form::text('additional_mobile', null, [
                                        'placeholder' => __('additional_mobile'),
                                        'class' => 'form-control',
                                        'id' => 'edit_additional_mobile',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('email') }}</label>
                                    {!! Form::text('email', null, [
                                        'placeholder' => __('email'),
                                        'class' => 'form-control',
                                        'id' => 'edit_email',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('father_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('father_name', null, [
                                        'placeholder' => __('father_name'),
                                        'class' => 'form-control',
                                        'id' => 'edit_father_name',
                                        'required' => true,
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('mother_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('mother_name', null, [
                                        'placeholder' => __('mother_name'),
                                        'class' => 'form-control',
                                        'id' => 'edit_mother_name',
                                        'required' => true,
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('religion') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('religion', null, [
                                        'placeholder' => __('religion'),
                                        'class' => 'form-control',
                                        'id' => 'edit_religion',
                                        'required' => true,
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label>{{ __('gender') }} <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('gender', 'male', null, ['class' => 'form-check-input edit', 'id' => 'gender']) !!}
                                                {{ __('male') }}
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('gender', 'female', null, ['class' => 'form-check-input edit', 'id' => 'gender']) !!}
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
                                        'required' => true,
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
                                        <img src="" id="edit-teacher-image-tag" class="img-fluid w-100" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('dob') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('dob', null, [
                                        'placeholder' => __('dob'),
                                        'class' => 'datepicker-popup form-control',
                                        'id' => 'edit_dob',
                                        'required' => true,
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
                                        'required' => true,
                                    ]) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('date_of_joining') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('date_of_joining', null, [
                                        'readonly',
                                        'placeholder' => __('date_of_joining'),
                                        'class' => 'datepicker-popup form-control',
                                        'id' => 'edit_date_of_joining',
                                        'required' => true,
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
                                        'required' => true,
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
                                    <label>{{ __('qualification') }}</label>
                                    {!! Form::text('qualification', null, [
                                        'placeholder' => __('qualification'),
                                        'class' => 'form-control',
                                        'id' => 'edit_qualification',
                                        'required' => true,
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
                                <div class="form-group col-sm-12 col-md-12">
                                    <label>{{ __('marital_status') }}</label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('marital_status', 'Married', null, ['class' => 'form-check-input edit', 'id' => 'marital_status']) !!}
                                                {{ __('married') }}
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('marital_status', 'Unmarried', null, ['class' => 'form-check-input edit', 'id' => 'marital_status']) !!}
                                                {{ __('unmarried') }}
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('marital_status', 'Not to be disclosed', null, ['class' => 'form-check-input edit', 'id' => 'marital_status']) !!}
                                                {{ __('not_to_be_disclosed') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('spouse') }}</label>
                                    {!! Form::text('spouse', null, ['placeholder' => __('spouse'), 'class' => 'form-control', 'id' => 'edit_spouse']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('pincode') }}</label>
                                    {!! Form::number('pincode', null, ['placeholder' => __('pincode'), 'class' => 'form-control', 'id' => 'edit_pincode']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('salary_mode') }}</label>
                                    <select required name="salary_mode" class="form-control" id="edit_salary_mode">
                                        <option value="" selected disabled>{{ __('select') . ' ' . __('salary_mode') }}
                                        <option value="{{ __('cash') }}"> {{ __('cash') }}</option>
                                        <option value="{{ __('bank') }}">{{ __('bank') }}</option>
                                    </select>
                                    {{-- {!! Form::text('pincode', null, ['placeholder' => __('pincode'), 'class' => 'form-control']) !!} --}}
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
