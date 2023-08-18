<?php $__env->startSection('title'); ?>
    <?php echo e(__('manage') . ' ' . __('lesson')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('lesson')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create') . ' ' . __('lesson')); ?>

                        </h4>
                        <form class="pt-3 add-lesson-form" id="create-form" action="<?php echo e(route('lesson.store')); ?>"
                            method="POST" novalidate="novalidate">
                            <div class="form-group">
                                <label><?php echo e(__('class') . ' ' . __('section')); ?> <span class="text-danger">*</span></label>
                                <select name="class_section_id" id="class_section_id" class="class_section_id form-control">
                                    <option value="">--<?php echo e(__('select')); ?>--</option>
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
                                    <option value="">--<?php echo e(__('select')); ?>--</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('lesson_name')); ?> <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" placeholder="<?php echo e(__('lesson_name')); ?>"
                                    class="form-control" />
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('lesson_description')); ?> <span class="text-danger">*</span></label>
                                <textarea id="description" name="description" placeholder="<?php echo e(__('lesson_description')); ?>" class="form-control"></textarea>
                            </div>

                            <h4 class="mb-3"><?php echo e(__('files')); ?></h4>

                            <div class="form-group">

                                <div class="row file_type_div" id="file_type_div">
                                    <div class="form-group col-md-2">
                                        <label><?php echo e(__('type')); ?> </label>
                                        <select id="file_type" name="file[0][type]" class="form-control file_type">
                                            <option value="">--<?php echo e(__('select')); ?>--</option>
                                            <option value="file_upload"><?php echo e(__('file_upload')); ?></option>
                                            <option value="youtube_link"><?php echo e(__('youtube_link')); ?></option>
                                            <option value="video_upload"><?php echo e(__('video_upload')); ?></option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3" id="file_name_div" style="display: none">
                                        <label><?php echo e(__('file_name')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" name="file[0][name]" class="file_name form-control"
                                            placeholder="<?php echo e(__('file_name')); ?>" required>
                                    </div>
                                    <div class="form-group col-md-3" id="file_thumbnail_div" style="display: none">
                                        <label><?php echo e(__('thumbnail')); ?> <span class="text-danger">*</span></label>
                                        <input type="file" name="file[0][thumbnail]" class="file_thumbnail form-control"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3" id="file_div" style="display: none">
                                        <label><?php echo e(__('file_upload')); ?> <span class="text-danger">*</span></label>
                                        <input type="file" name="file[0][file]" class="file form-control" placeholder=""
                                            required>
                                    </div>
                                    <div class="form-group col-md-3" id="file_link_div" style="display: none">
                                        <label><?php echo e(__('link')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" name="file[0][link]" class="file_link form-control"
                                            placeholder="<?php echo e(__('link')); ?>" required>
                                    </div>

                                    <div class="form-group col-md-1 col-md-1 pl-0 mt-4">
                                        <button type="button" class="btn btn-inverse-success btn-icon add-lesson-file">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-3 extra-files"></div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list') . ' ' . __('lesson')); ?>

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
                            <div class="col">
                                <select name="filter_lesson_id" id="filter_lesson_id" class="form-control">
                                    <option value=""><?php echo e(__('all')); ?></option>
                                    <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lesson->id); ?>">
                                            <?php echo e($lesson->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                        </div>

                        <table aria-describedby="mydesc" class='table table-striped' id='table_list' data-toggle="table"
                            data-url="<?php echo e(route('lesson.show', 1)); ?>" data-click-to-select="true"
                            data-side-pagination="server" data-pagination="true"
                            data-page-list="[5, 10, 20, 50, 100, 200, All]" data-search="true" data-toolbar="#toolbar"
                            data-show-columns="true" data-show-refresh="true" data-fixed-columns="true"
                            data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false"
                            data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                            data-maintain-selected="true" data-export-types='["txt","excel"]'
                            data-query-params="CreateLessionQueryParams"
                            data-export-options='{ "fileName": "lesson-list-<?= date('d-m-y') ?>" ,"ignoreColumn":
                            ["operate"]}'
                            data-show-export="true">
                            <thead>
                                <tr>
                                    <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                        <?php echo e(__('id')); ?></th>
                                    <th scope="col" data-field="no" data-sortable="true"><?php echo e(__('no')); ?></th>
                                    <th scope="col" data-field="name" data-sortable="true"><?php echo e(__('name')); ?></th>
                                    <th scope="col" data-field="description" data-sortable="true">
                                        <?php echo e(__('description')); ?></th>
                                    <th scope="col" data-field="class_section_name" data-sortable="true">
                                        <?php echo e(__('class_section')); ?></th>
                                    <th scope="col" data-field="subject_name" data-sortable="true">
                                        <?php echo e(__('subject')); ?></th>
                                    <th scope="col" data-field="file" data-formatter="fileFormatter"
                                        data-sortable="true"><?php echo e(__('file')); ?></th>
                                    <th scope="col" data-field="created_at" data-sortable="true"
                                        data-visible="false"> <?php echo e(__('created_at')); ?></th>
                                    <th scope="col" data-field="updated_at" data-sortable="true"
                                        data-visible="false"> <?php echo e(__('updated_at')); ?></th>
                                    <th scope="col" data-field="operate" data-sortable="false"
                                        data-events="lessonEvents"><?php echo e(__('action')); ?></th>
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
                                <?php echo e(__('edit') . ' ' . __('lesson')); ?>

                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="pt-3 edit-lesson-form" id="edit-form" action="<?php echo e(url('lesson')); ?>"
                            novalidate="novalidate">
                            <input type="hidden" name="edit_id" id="edit_id" value="" />
                            <div class="modal-body">
                                <div class="form-group">
                                    <label><?php echo e(__('class') . ' ' . __('section')); ?> <span
                                            class="text-danger">*</span></label>
                                    <select name="class_section_id" id="edit_class_section_id"
                                        class="class_section_id form-control">
                                        <option value="">--<?php echo e(__('select')); ?>--</option>
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
                                        <option value="">--<?php echo e(__('select')); ?>--</option>
                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('lesson_name')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" id="edit_name" name="name"
                                        placeholder="<?php echo e(__('lesson_name')); ?>" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('lesson_description')); ?> <span class="text-danger">*</span></label>
                                    <textarea id="edit_description" name="description" placeholder="<?php echo e(__('lesson_description')); ?>"
                                        class="form-control"></textarea>
                                </div>

                                <h4 class="mb-3"><?php echo e(__('files')); ?></h4>
                                <div class="row edit_file_type_div" id="edit_file_type_div">
                                    <input type="hidden" id="edit_file_id" name="edit_file[0][id]" />
                                    <div class="form-group col-md-2">
                                        <label><?php echo e(__('type')); ?></label>
                                        <select id="edit_file_type" name="edit_file[0][type]"
                                            class="form-control file_type">
                                            <option value="">--<?php echo e(__('select')); ?>--</option>
                                            <option value="file_upload"><?php echo e(__('file_upload')); ?></option>
                                            <option value="youtube_link"><?php echo e(__('youtube_link')); ?></option>
                                            <option value="video_upload"><?php echo e(__('video_upload')); ?></option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3" id="file_name_div" style="display: none">
                                        <label><?php echo e(__('file_name')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" name="edit_file[0][name]" class="file_name form-control"
                                            placeholder="<?php echo e(__('file_name')); ?>" required>
                                    </div>
                                    <div class="form-group col-md-3" id="file_thumbnail_div" style="display: none">
                                        <label><?php echo e(__('thumbnail')); ?> <span class="text-danger">*</span></label>
                                        <input type="file" name="edit_file[0][thumbnail]"
                                            class="file_thumbnail form-control">
                                        <div style="width: 60px">
                                            <img src="" id="file_thumbnail_preview" class="w-100">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3" id="file_div" style="display: none">
                                        <label><?php echo e(__('file_upload')); ?> <span class="text-danger">*</span></label>
                                        <input type="file" name="edit_file[0][file]" class="file form-control"
                                            placeholder="">
                                        <a href="" target="_blank" id="file_preview" class="w-100"></a>
                                    </div>
                                    <div class="form-group col-md-3" id="file_link_div" style="display: none">
                                        <label><?php echo e(__('link')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" name="edit_file[0][link]" class="file_link form-control"
                                            placeholder="<?php echo e(__('link')); ?>" required>
                                    </div>

                                    <div class="form-group col-md-1 pl-0 mt-4">
                                        <button type="button" class="btn btn-inverse-success btn-icon edit-lesson-file">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-3 edit-extra-files"></div>
                                <div>
                                    <div class="form-group pl-0 mt-4">
                                        <button type="button" class="col-md-3 btn btn-inverse-success edit-lesson-file">
                                            <?php echo e(__('add_new_files')); ?> <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\php\eschool\resources\views/lessons/index.blade.php ENDPATH**/ ?>