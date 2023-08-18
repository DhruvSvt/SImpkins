<?php $__env->startSection('title'); ?>
    <?php echo e(__('attendance')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('attendance')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create') . ' ' . __('attendance')); ?>

                        </h4>
                        <form action="<?php echo e(route('attendance.store')); ?>" class="create-form" id="formdata">
                            <?php echo csrf_field(); ?>
                            <div class="row" id="toolbar">
                                <div class="form-group col-sm-12 col-md-4">
                                    
                                    <select required name="class_section_id" id="timetable_class_section"
                                            class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value=""><?php echo e(__('select') . ' ' . __('class')); ?></option>
                                        <?php $__currentLoopData = $class_sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->id); ?>" data-class="<?php echo e($section->class->id); ?>">
                                                <?php echo e($section->class->name); ?> - <?php echo e($section->section->name); ?> <?php echo e($section->class->medium->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    
                                    <?php echo Form::text('date', null, ['required', 'readonly', 'placeholder' => __('date'), 'class' => 'datepicker-popup form-control', 'id' => 'date','data-date-end-date'=>"0d"]); ?>

                                    <span class="input-group-addon input-group-append">
                                </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="holiday" id="holiday"
                                                   value="0">Holiday
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>

                            <div class="show_student_list">
                                <table aria-describedby="mydesc" class='table student_table' id='table_list'
                                       data-toggle="table" data-url="<?php echo e(url('student-list')); ?>" data-click-to-select="true"
                                       data-side-pagination="server" data-pagination="true"
                                       data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                                       data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                       data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                       data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                       data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                       data-export-options='{ "fileName": "student-list-<?= date('d-m-y') ?>" ,"ignoreColumn": ["operate"]}'
                                       data-query-params="queryParams">
                                    <thead>
                                    <tr>
                                        <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                            <?php echo e(__('id')); ?></th>
                                        <th scope="col" data-field="no" data-sortable="true"><?php echo e(__('no')); ?></th>

                                        <th scope="col" data-field="student_id" data-sortable="true">
                                            <?php echo e(__('student_id')); ?></th>
                                        <th scope="col" data-field="admission_no" data-sortable="true">
                                            <?php echo e(__('admission_no')); ?></th>
                                        <th scope="col" data-field="roll_no" data-sortable="true"><?php echo e(__('roll_no')); ?>

                                        </th>
                                        <th scope="col" data-field="name" data-sortable="false"><?php echo e(__('name')); ?>

                                        </th>
                                        <th scope="col" data-field="type" data-sortable="false"><?php echo e(__('type')); ?>

                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <input class="btn btn-theme btn_attendance" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
            };
        }
    </script>

    <script>
        $('#date').on('input change', function () {
            $('.student_table').bootstrapTable('refresh');
        });

        $('.btn_attendance').hide();
        function set_data(){
            $(document).ready(function()
            {
                student_class=$('#timetable_class_section').val();
                session_year=$('#date').val();

                if(student_class!='' && date!='' )
                {
                    $('.btn_attendance').show();
                }
                else{
                    $('.btn_attendance').hide();
                }
            });
        }
        $('#timetable_class_section,#date').on('change', function() {
            set_data();
        });
    </script>

    <script>
        $('input[name="holiday"]').click(function () {
            class_section_id = $('#timetable_class_section').val();
            date = $('#date').val();
            checkBox = document.getElementById('holiday');
            if (class_section_id != '' && date != '') {
                Swal.fire({
                    title: "<?php echo e(__('are_you_sure')); ?>",
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "<?php echo e(__('yes')); ?>"
                }).then((result) => {
                    if (checkBox.checked) {
                        if (result.isConfirmed == true) {
                            $("#holiday").val(3);
                            $('input[name="holiday"]').prop('checked', true);
                            $('.type').prop('required', false);
                        } else {
                            checkBox.checked = false;
                        }
                    } else {
                        if (result.isConfirmed == true) {
                            $("#holiday").val(0);
                            $('.type').prop('required', true);
                            return true;
                        } else {
                            checkBox.checked = true;
                        }

                    }
                })
            } else {
                Swal.fire({
                    title: "<?php echo e(__('select class & date')); ?>",
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "<?php echo e(__('yes')); ?>"
                }).then((result) => {
                    checkBox.checked = false;
                })
            }
        });
    </script>
    <script>
        $('#timetable_class_section,#date').on('change , input', function () {
            date = $('#date').val();
            class_section_id = $('#timetable_class_section').val();
            $.ajax({
                url: "<?php echo e(url('getAttendanceData')); ?>",
                type: "GET",
                data: {
                    date: date,
                    class_section_id: class_section_id
                },
                success: function (response) {
                    if (response == 3) {
                        $('input[name="holiday"]').attr('checked', true);
                        $("#holiday").val(3);
                        $('.type').prop('required', false);
                    } else {
                        $('input[name="holiday"]').attr('checked', false);
                        $("#holiday").val(0);
                        $('.type').prop('required', true);
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/mdcollegeagra/simpkins.mdayurvediccollege.in/resources/views/attendance/index.blade.php ENDPATH**/ ?>