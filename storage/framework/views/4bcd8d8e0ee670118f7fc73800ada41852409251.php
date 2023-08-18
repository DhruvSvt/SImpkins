<?php $__env->startSection('title'); ?>
    <?php echo e(__('class_timetable')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage').' '.__('class_timetable')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('class')); ?> <?php echo e(__('section')); ?> <span class="text-danger">*</span></label>
                                    <select required name="class_section_id" id="timetable_class_section" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value=""><?php echo e(__('select')); ?></option>
                                        <?php $__currentLoopData = $class_sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->id); ?>" data-class="<?php echo e($section->class->id); ?>" data-section="<?php echo e($section->section->id); ?>"><?php echo e($section->class->name.' '.$section->section->name.' - '.$section->class->medium->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </h4>
                        <div class="row set_timetable"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $('#timetable_class_section').on('change', function (e) {
            var class_section_id = $(this).val();
            var class_id = $(this).find(':selected').attr('data-class');
            var section_id = $(this).find(':selected').attr('data-section');
            $.ajax({
                url: "<?php echo e(url('gettimetablebyclass')); ?>",
                type: "GET",
                data: {class_section_id: class_section_id, class_id: class_id},
                success: function (response) {
                    var html = '';
                    for (let i = 0; i < response['days'].length; i++) {
                        html += '<div class="col-lg-2 col-md-2 col-sm-2 col-12 project-grid">';
                        html += '<div class="project-grid-inner">';
                        html += '<div class="wrapper">';
                        html += '<h5 class="card-header header-sm">' + response['days'][i]['day_name'] + '</h5>';
                        for (let j = 0; j < response['timetable'].length; j++) {
                            if (response['days'][i]['day'] == response['timetable'][j]['day']) {
                                html += '<p class="card-body">'
                                    + response['timetable'][j]['subject_teacher']['subject']['name']
                                    + '<br>' + response['timetable'][j]['subject_teacher']['teacher']['user']['first_name'] + ' ' + response['timetable'][j]['subject_teacher']['teacher']['user']['last_name']
                                    + '<br>start time: ' + response['timetable'][j]['start_time'] + '<br>end time: '
                                    + response['timetable'][j]['end_time'] + '</p>';

                            }
                        }
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        $('.set_timetable').html(html);
                    }
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\php\eschool\resources\views/timetable/class_timetable.blade.php ENDPATH**/ ?>