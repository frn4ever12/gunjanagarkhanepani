<?php $__env->startSection('title', 'Sliders - Admin'); ?>

<?php $__env->startSection('page-title', 'स्लाइडरहरू'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>स्लाइडरहरू</span>
        <a href="<?php echo e(route('admin.sliders.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ स्लाइडर
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>चित्र</th>
                        <th>शीर्षक</th>
                        <th>क्रम</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php if($slider->image): ?>
                            <?php if(str_starts_with($slider->image, 'http://') || str_starts_with($slider->image, 'https://')): ?>
                            <img src="<?php echo e($slider->image); ?>" alt="<?php echo e($slider->title); ?>" style="width: 100px; height: 50px; object-fit: cover;">
                            <?php else: ?>
                            <img src="<?php echo e(asset('storage/' . $slider->image)); ?>" alt="<?php echo e($slider->title); ?>" style="width: 100px; height: 50px; object-fit: cover;">
                            <?php endif; ?>
                            <?php else: ?>
                            <span class="badge bg-secondary">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($slider->title); ?></td>
                        <td><?php echo e($slider->order); ?></td>
                        <td>
                            <?php if($slider->is_active): ?>
                            <span class="badge bg-success">Active</span>
                            <?php else: ?>
                            <span class="badge bg-secondary">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.sliders.edit', $slider)); ?>" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('admin.sliders.destroy', $slider)); ?>" method="POST" class="d-inline">
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
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/admin/sliders/index.blade.php ENDPATH**/ ?>