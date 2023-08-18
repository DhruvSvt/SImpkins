<?php $__env->startSection('title'); ?>
    <?php echo e(__('manage') . ' ' . __('assignment')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('assignment')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create') . ' ' . __('assignment')); ?>

                        </h4>
                        <form class="pt-3 add-assignment-form" id="create-form" action="<?php echo e(route('assignment.store')); ?>"
                            method="POST" novalidate="novalidate">
                            <div class="form-group">
                                <label><?php echo e(__('class') . ' ' . __('section')); ?> <span class="text-danger">*</span></label>
                                <select name="class_section_id" id="class_section_id" class="class_section_id form-control">
                                    <option value="">--<?php echo e(__('select_class_section')); ?>--</option>
                                    <?php $__currentLoopData = $class_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($section->id); ?>" data-class="<?php echo e($section->class->id); ?>">
                                            <?php echo e($section->class->name . ' ' . $section->section->name . ' - ' . $section->class->medium->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('subject')); ?> <span class="text-danger">*</span></label>
                                <select name="subject_id" id="subject_id" class="subject_id form-control">
                                    <option value="">--<?php echo e(__('select_subject')); ?>--</option>
                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('assignment_name')); ?> <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name"
                                    placeholder="<?php echo e(__('assignment_name')); ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('assignment_instructions')); ?></label>
                                <textarea id="instructions" name="instructions" placeholder="<?php echo e(__('assignment_instructions')); ?>"
                                    class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('files')); ?> </label>
                                <input type="file" name="file[]" class="form-control" multiple />
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('last_submission_date')); ?> <span class="text-danger">*</span></label>
                                <input type="datetime-local" name="due_date"
                                    placeholder="<?php echo e(__('last_submission_date')); ?>" class='form-control'>
                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('points')); ?></label>
                                <input type="number" id="points" name="points" placeholder="<?php echo e(__('points')); ?>"
                                    class="form-control" min="1" />
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="resubmission"
                                            id="resubmission_allowed" value=""><?php echo e(__('resubmission_allowed')); ?>

                                    </label>
                                </div>
                            </div>

                            <div class="form-group" id="extra_days_for_resubmission_div" style="display: none;">
                                <label><?php echo e(__('extra_days_for_resubmission')); ?> <span class="text-danger">*</span></label>
                                <input type="text" id="extra_days_for_resubmission" name="extra_days_for_resubmission"
                                    placeholder="<?php echo e(__('extra_days_for_resubmission')); ?>" class="form-control" />
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?> />
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list') . ' ' . __('assignment')); ?>

                        </h4>

                        <div id="toolbar">
                            <div class="row">
                                <div class="col">
                                    <select name="filter_subject_id" id="filter_subject_id" class="form-control">
                                        <option value=""><?php echo e(__('all')); ?></option>
                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($subject->id); ?>">
                                                <?php echo e($subject->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <select name="filter_class_section_id" id="filter_class_section_id"
                                            class="form-control">
                                            <option value=""><?php echo e(__('all')); ?></option>
                                            <?php $__currentLoopData = $class_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($class->id); ?>">
                                                    <?php echo e($class->class->name . '-' . $class->section->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <table aria-describedby="mydesc" class='table table-striped' id='table_list' data-toggle="table"
                            data-url="<?php echo e(route('assignment.show', 1)); ?>" data-click-to-select="true"
                            data-side-pagination="server" data-pagination="true"
                            data-page-list="[5, 10, 20, 50, 100, 200, All]" data-search="true" data-toolbar="#toolbar"
                            data-show-columns="true" data-show-refresh="true" data-fixed-columns="true"
                            data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false"
                            data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                            data-maintain-selected="true" data-export-types='["txt","excel"]'
                            data-export-options='{ "fileName": "assignment-list-<?= date('d-m-y') ?>" ,"ignoreColumn":
                            ["operate"]}'
                            data-query-params="CreateAssignmentSubmissionQueryParams"
                            data-show-export="true">
                            <thead>
                                <tr>
                                    <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                        <?php echo e(__('id')); ?></th>
                                    <th scope="col" data-field="no" data-sortable="true"><?php echo e(__('no')); ?></th>
                                    <th scope="col" data-field="name" data-sortable="true"><?php echo e(__('name')); ?></th>
                                    <th scope="col" data-field="instructions" data-sortable="true">
                                        <?php echo e(__('instructions')); ?></th>
                                    <th scope="col" data-field="file" data-sortable="true"
                                        data-formatter="fileFormatter"><?php echo e(__('file')); ?></th>
                                    <th scope="col" data-field="class_section_name" data-sortable="true">
                                        <?php echo e(__('class_section')); ?></th>
                                    <th scope="col" data-field="subject_name" data-sortable="true">
                                        <?php echo e(__('subject')); ?></th>
                                    <th scope="col" data-field="due_date" data-sortable="true"><?php echo e(__('due_date')); ?>

                                    </th>
                                    <th scope="col" data-field="points" data-sortable="true"><?php echo e(__('points')); ?>

                                    </th>
                                    <th scope="col" data-field="resubmission" data-formatter="resubmissionFormatter"
                                        data-sortable="true"><?php echo e(__('resubmission')); ?></th>
                                    <th scope="col" data-field="extra_days_for_resubmission" data-sortable="true">
                                        <?php echo e(__('extra_days_for_resubmission')); ?></th>
                                    <th scope="col" data-field="session_year_id" data-sortable="true"
                                        data-visible="false"><?php echo e(__('session_year_id')); ?></th>
                                    <th scope="col" data-field="created_at" data-sortable="true"
                                        data-visible="false"> <?php echo e(__('created_at')); ?></th>
                                    <th scope="col" data-field="updated_at" data-sortable="true"
                                        data-visible="false"> <?php echo e(__('updated_at')); ?></th>
                                    <th scope="col" data-field="operate" data-sortable="false"
                                        data-events="assignmentEvents"><?php echo e(__('action')); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <?php echo e(__('edit') . ' ' . __('class') . ' ' . __('subject')); ?>

                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="pt-3 edit-assignment-form" id="edit-form" action="<?php echo e(url('assignment')); ?>"
                            novalidate="novalidate">
                            <input type="hidden" name="edit_id" id="edit_id" value="" />
                            <div class="modal-body">
                                <div class="form-group">
                                    <label><?php echo e(__('class') . ' ' . __('section')); ?> <span
                                            class="text-danger">*</span></label>
                                    <select name="class_section_id" id="edit_class_section_id"
                                        class="class_section_id form-control">
                                        <option value="">--<?php echo e(__('select_class_section')); ?>--</option>
                                        <?php $__currentLoopData = $class_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->id); ?>"
                                                data-class="<?php echo e($section->class->id); ?>">
                                                <?php echo e($section->class->name . ' ' . $section->section->name . ' - ' . $section->class->medium->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('subject')); ?> <span class="text-danger">*</span></label>
                                    <select name="subject_id" id="edit_subject_id" class="subject_id form-control">
                                        <option value="">--<?php echo e(__('select_subject')); ?>--</option>
                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('assignment_name')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" id="edit_name" name="name"
                                        placeholder="<?php echo e(__('assignment_name')); ?>" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('assignment_instructions')); ?></label>
                                    <textarea id="edit_instructions" name="instructions" placeholder="<?php echo e(__('assignment_instructions')); ?>"
                                        class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__('old_files')); ?> </label>
                                    <div id="old_files"></div>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('upload_new_files')); ?> </label>
                                    <input type="file" name="file[]" class="form-control" multiple />
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('last_submission_date')); ?> <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="due_date" id="edit_due_date"
                                        placeholder="<?php echo e(__('last_submission_date')); ?>" class='form-control'>
                                    <span class="input-group-addon input-group-append"></span>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('points')); ?></label>
                                    <input type="number" id="edit_points" name="points"
                                        placeholder="<?php echo e(__('points')); ?>" class="form-control" min="1" />
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="resubmission"
                                                id="edit_resubmission_allowed"
                                                value="1"><?php echo e(__('resubmission_allowed')); ?>

                                        </label>
                                    </div>
                                </div>

                                <div class="form-group" id="edit_extra_days_for_resubmission_div" style="display: none;">
                                    <label><?php echo e(__('extra_days_for_resubmission')); ?> <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="edit_extra_days_for_resubmission"
                                        name="extra_days_for_resubmission"
                                        placeholder="<?php echo e(__('extra_days_for_resubmission')); ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(__('close')); ?></button>
                                <input class="btn btn-theme" type="submit" value=<?php echo e(__('edit')); ?> />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\php\eschool\resources\views/assignment/index.blade.php ENDPATH**/ ?>