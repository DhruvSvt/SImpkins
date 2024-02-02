@extends('layouts.master')

@section('title')
{{ __('message') }}
@endsection

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Message').' '.__('Template') }}
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ __('select').' '.__('template') }}
                    </h4>
                    <div class="row" id="toolbar">
                        <div class="form-group col-sm-12 col-md-4">
                            <select required name="attendance_type" id="attendance_type" class="form-control select2"
                                style="width:100%;" tabindex="-1" aria-hidden="true">
                                <option value="">{{__('select')}}</option>
                                <option value="1">{{__('present')}}</option>
                                <option value="0">{{__('absent')}}</option>
                                <option value="3">{{__('holiday')}}</option>

                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            {{-- <label>{{ __('class') }} {{ __('section') }} <span class="text-danger">*</span></label>
                            --}}
                            <select required name="class_section_id" id="timetable_class_section"
                                class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                <option value="">{{__('select')}}</option>
                                @foreach($classes as $class)
                                <option value="{{$class->id}}" data-class="{{$class->id}}">
                                    {{$class->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            {{-- <label>{{ __('date') }} <span class="text-danger">*</span></label> --}}
                            {!! Form::text('date', null, ['required','readonly', 'placeholder' => __('date'), 'class' =>
                            'datepicker-popup form-control','id'=>'date','data-date-end-date'=>"0d"]) !!}
                            {{-- <span class="input-group-addon input-group-append">
                            </span> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function queryParams(p) {
            return {
                limit: p.limit,
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                search: p.search,
                'class_section_id': $('#timetable_class_section').val(),
                'date': $('#date').val(),
                'attendance_type': $('#attendance_type').val(),
            };
        }
</script>

<script>
    $('#date,#attendance_type').on('input change', function () {
            $('.student_table').bootstrapTable('refresh');
        });
</script>
@endsection