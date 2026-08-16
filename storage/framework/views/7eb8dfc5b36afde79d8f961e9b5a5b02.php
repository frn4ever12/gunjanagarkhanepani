<?php $__env->startSection('title', 'Officials - Admin'); ?>

<?php $__env->startSection('page-title', 'पदाधिकारीहरू'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>पदाधिकारीहरू</span>
        <a href="<?php echo e(route('admin.officials.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ पदाधिकारी
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>फोटो</th>
                        <th>नाम</th>
                        <th>पद</th>
                        <th>गृहपृष्ठ</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $officials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $official): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php if($official->photo): ?>
                            <img src="<?php echo e(asset('storage/' . $official->photo)); ?>" alt="<?php echo e($official->name); ?>" class="rounded-circle" width="50" height="50">
                            <?php else: ?>
                            <span class="badge bg-secondary">No Photo</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($official->name); ?></td>
                        <td><?php echo e($official->position); ?></td>
                        <td>
                            <?php if($official->show_on_homepage): ?>
                            <span class="badge bg-success">Yes</span>
                            <?php else: ?>
                            <span class="badge bg-secondary">No</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($official->is_active): ?>
                            <span class="badge bg-success">Active</span>
                            <?php else: ?>
                            <span class="badge bg-secondary">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.officials.edit', $official)); ?>" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('admin.officials.destroy', $official)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($officials->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/admin/officials/index.blade.php ENDPATH**/ ?>