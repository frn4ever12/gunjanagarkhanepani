<?php $__env->startSection('title', 'Services - Admin'); ?>

<?php $__env->startSection('page-title', 'सेवाहरू'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>सेवाहरू</span>
        <a href="<?php echo e(route('admin.services.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ सेवा
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>शीर्षक</th>
                        <th>विवरण</th>
                        <th>क्रम</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($service->title); ?></td>
                        <td><?php echo e(Str::limit($service->description, 50)); ?></td>
                        <td><?php echo e($service->order); ?></td>
                        <td>
                            <?php if($service->is_active): ?>
                            <span class="badge bg-success">Active</span>
                            <?php else: ?>
                            <span class="badge bg-secondary">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.services.edit', $service)); ?>" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('admin.services.destroy', $service)); ?>" method="POST" class="d-inline">
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
        <?php echo e($services->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/admin/services/index.blade.php ENDPATH**/ ?>