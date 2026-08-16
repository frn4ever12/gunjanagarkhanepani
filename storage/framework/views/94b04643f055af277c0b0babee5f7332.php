<?php $__env->startSection('title', 'Edit Slider - Admin'); ?>

<?php $__env->startSection('page-title', 'स्लाइडर सम्पादन गर्नुहोस्'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">स्लाइडर सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('admin.sliders.update', $slider)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="<?php echo e(old('title', $slider->title)); ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">उपशीर्षक</label>
                <input type="text" class="form-control" name="subtitle" value="<?php echo e(old('subtitle', $slider->subtitle)); ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">चित्र</label>
                <input type="file" class="form-control" name="image">
                <?php if($slider->image): ?>
                <?php if(str_starts_with($slider->image, 'http://') || str_starts_with($slider->image, 'https://')): ?>
                <small class="text-muted">Current: <a href="<?php echo e($slider->image); ?>" target="_blank">View Image</a></small>
                <?php else: ?>
                <small class="text-muted">Current: <a href="<?php echo e(asset('storage/' . $slider->image)); ?>" target="_blank">View Image</a></small>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">बटन पाठ</label>
                    <input type="text" class="form-control" name="button_text" value="<?php echo e(old('button_text', $slider->button_text)); ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">बटन URL</label>
                    <input type="url" class="form-control" name="button_url" value="<?php echo e(old('button_url', $slider->button_url)); ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="<?php echo e(old('order', $slider->order)); ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">ओभरले देखाउनुहोस्</label>
                    <select class="form-control" name="show_overlay">
                        <option value="1" <?php echo e(old('show_overlay', $slider->show_overlay) ? 'selected' : ''); ?>>Yes</option>
                        <option value="0" <?php echo e(old('show_overlay', $slider->show_overlay) ? '' : 'selected'); ?>>No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_active">
                        <option value="1" <?php echo e(old('is_active', $slider->is_active) ? 'selected' : ''); ?>>Active</option>
                        <option value="0" <?php echo e(old('is_active', $slider->is_active) ? '' : 'selected'); ?>>Inactive</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="<?php echo e(route('admin.sliders.index')); ?>" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/admin/sliders/edit.blade.php ENDPATH**/ ?>