<?php $__env->startSection('title'); ?>
    <?php echo e(__('sliders')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('sliders')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create') . ' ' . __('sliders')); ?>

                        </h4>
                        <div class="col-6">
                            <form class="pt-3 sliders-create-form" id="create-form" action="<?php echo e(route('sliders.store')); ?>" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label><?php echo e(__('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="file-upload-default"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('image')); ?>"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-gradient-primary" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                </div>
                                <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list') . ' ' . __('sliders')); ?>

                        </h4>
                        <table aria-describedby="mydesc" class='table table-striped' id='table_list'
                               data-toggle="table" data-url="<?php echo e(route('sliders.show', [1])); ?>" data-click-to-select="true"
                               data-side-pagination="server" data-pagination="true"
                               data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="false"
                               data-toolbar="#toolbar" data-show-columns="true"
                               data-show-refresh="true" data-fixed-columns="true"
                               data-fixed-number="2" data-fixed-right-number="1"
                               data-trim-on-search="false" data-mobile-responsive="true"
                               data-sort-name="id" data-sort-order="desc"
                               data-maintain-selected="true" data-export-types='["txt","excel"]'
                               data-export-options='{ "fileName": "slider-list-<?= date('d-m-y') ?>" ,"ignoreColumn": ["operate"]}'
                               data-show-export="true">
                            <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                <th scope="col" data-field="no" data-sortable="true"><?php echo e(__('no')); ?></th>
                                <th scope="col" data-field="image" data-sortable="true" data-formatter="imageFormatter"><?php echo e(__('image')); ?></th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-field="operate" data-sortable="false" data-events="actionEvents"><?php echo e(__('action')); ?></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit') . ' ' . __('sliders')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="pt-3 sliders-edit-form" id="edit-form" action="<?php echo e(url('sliders')); ?>" novalidate="novalidate">
                            <div class="modal-body">
                                <input type="hidden" name="edit_id" id="edit_id" value=""/>

                                <div class="form-group">
                                    <label><?php echo e(__('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" id="edit_image" name="image" class="file-upload-default"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" id="edit_image" class="form-control" disabled="" value="" "/>
                                        <span class="  input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="w-100 text-center">
                                        <img src="" id="edit_slider_image" class="w-100">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('close')); ?></button>
                                <input class="btn btn-theme" type="submit" value=<?php echo e(__('edit')); ?> />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        window.actionEvents = {
            'click .edit-data': function (e, value, row, index) {
                $('#edit_id').val(row.id);
                $('#edit_slider_image').attr('src', row.image);
            }
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/mdcollegeagra/simpkins.mdayurvediccollege.in/resources/views/sliders/index.blade.php ENDPATH**/ ?>