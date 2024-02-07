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
                    <form action="{{ route('message.store') }}" method="POST">
                        @csrf
                        <div class="row" id="toolbar">
                            <div class="form-group col-sm-12 col-md-4">
                                <label>Choose Message <span class="text-danger">*</span></label>
                                <select required name="template_id" id="template_name" class="form-control select2"
                                    style="width:100%;" tabindex="-1" aria-hidden="true">
                                    <option value="">{{__('select')}}</option>
                                    <option value="1">Holiday Message 1</option>
                                    <option value="2">Regular Classes</option>
                                    <option value="3">School Closed 1</option>
                                    <option value="4">Parents Teacher Meeting</option>
                                    <option value="5">Holiday Message 2</option>
                                    <option value="6">Month Attandance Counts</option>
                                    <option value="7">Collect Your Ward</option>
                                    <option value="8">School Close 2</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                {{-- <label>{{ __('class') }} {{ __('section') }} <span
                                        class="text-danger">*</span></label>
                                --}}
                                <label>Classes <span class="text-danger">*</span></label>
                                <select required name="class_id" id="class_id"
                                    class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                    <option value="">{{__('select')}}</option>
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}" data-class="{{$class->id}}">
                                        {{$class->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label>Template Message <span class="text-danger">*</span></label>
                            <textarea class="form-control" cols="50" rows="5" name="msg"></textarea>
                        </div>
                        <input class="btn btn-theme" type="submit" value="Sent">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $("select#template_name").on("change", function() {
            var selectedOption = $(this).val();
            if (selectedOption !== "") {
                // Make an AJAX request to the API
                $.ajax({
                    url: "/message/show/{id}",
                    method: "POST",
                    data: { selectedOption: selectedOption },
                   success: function(response) {
                    var templateMessage = response.template_message;
                    $("textarea[name='msg']").val(templateMessage);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }).trigger("change");
    });
</script>

<script>
    $(document).ready(function() {
        // Initially hide the Send button
        $("input[type='submit']").hide();

        // Function to check if all required fields are filled
        function checkFields() {
            var selectedTemplate = $("select#template_name").val();
            var message = $("textarea[name='msg']").val();
            // Check if all required fields are filled
            if (selectedTemplate !== "" && message.trim() !== "") {
                $("input[type='submit']").show();
            } else {
                $("input[type='submit']").hide();
            }
        }

        // Listen for changes in select and textarea fields
        $("select#template_name, textarea[name='msg']").on("change keyup", function() {
            checkFields();
        });

        // Trigger the check initially
        checkFields();
    });
</script>
@endsection
