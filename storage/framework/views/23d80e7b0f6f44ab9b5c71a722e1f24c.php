<?php $__env->startSection('title', 'Homepage Management - Admin'); ?>

<?php $__env->startSection('page-title', 'गृहपृष्ठ व्यवस्थापन'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">गृहपृष्ठ खण्डहरू</div>
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('admin.homepage.update')); ?>">
            <?php echo csrf_field(); ?>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>खण्ड</th>
                            <th>सक्षम</th>
                            <th>क्रम</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($section->title); ?></td>
                            <td>
                                <input type="checkbox" name="section_<?php echo e($section->id); ?>" value="1" <?php echo e($section->is_enabled ? 'checked' : ''); ?>>
                            </td>
                            <td>
                                <input type="number" name="order_<?php echo e($section->id); ?>" value="<?php echo e($section->order); ?>" class="form-control form-control-sm" style="width: 80px;">
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/admin/homepage/index.blade.php ENDPATH**/ ?>