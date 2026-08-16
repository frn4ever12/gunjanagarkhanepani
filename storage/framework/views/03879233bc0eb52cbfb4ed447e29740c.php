<?php $__env->startSection('title', 'Notices - Admin'); ?>

<?php $__env->startSection('page-title', 'सूचनाहरू'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>सूचनाहरू</span>
        <a href="<?php echo e(route('admin.notices.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ सूचना
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>शीर्षक</th>
                        <th>प्रकाशन मिति</th>
                        <th>प्राथमिकता</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($notice->title); ?></td>
                        <td><?php echo e($notice->publish_date->format('Y-m-d')); ?></td>
                        <td>
                            <?php if($notice->is_pinned): ?>
                            <span class="badge bg-danger">Pinned</span>
                            <?php endif; ?>
                            <span class="badge bg-info">Priority: <?php echo e($notice->priority); ?></span>
                        </td>
                        <td>
                            <?php if($notice->is_published): ?>
                            <span class="badge bg-success">Published</span>
                            <?php else: ?>
                            <span class="badge bg-secondary">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.notices.edit', $notice)); ?>" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('admin.notices.destroy', $notice)); ?>" method="POST" class="d-inline">
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
        <?php echo e($notices->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/admin/notices/index.blade.php ENDPATH**/ ?>