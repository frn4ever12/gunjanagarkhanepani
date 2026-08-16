<?php $__env->startSection('title', 'Create Official - Admin'); ?>

<?php $__env->startSection('page-title', 'नयाँ पदाधिकारी सिर्जना गर्नुहोस्'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">नयाँ पदाधिकारी</div>
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('admin.officials.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <div class="mb-3">
                <label class="form-label">नाम *</label>
                <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">पद *</label>
                <input type="text" class="form-control" name="position" value="<?php echo e(old('position')); ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Designation</label>
                <input type="text" class="form-control" name="designation" value="<?php echo e(old('designation')); ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">फोटो *</label>
                <input type="file" class="form-control" name="photo" required>
                <small class="text-muted">JPEG, JPG, PNG, GIF, WEBP (Max: 5MB)</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">जीवनी</label>
                <textarea class="form-control" name="bio" rows="3"><?php echo e(old('bio')); ?></textarea>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">फोन</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">इमेल</label>
                    <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="<?php echo e(old('order', 0)); ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">गृहपृष्ठमा देखाउनुहोस्</label>
                    <select class="form-control" name="show_on_homepage">
                        <option value="1" <?php echo e(old('show_on_homepage', true) ? 'selected' : ''); ?>>Yes</option>
                        <option value="0" <?php echo e(old('show_on_homepage', true) ? '' : 'selected'); ?>>No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_active">
                        <option value="1" <?php echo e(old('is_active', true) ? 'selected' : ''); ?>>Active</option>
                        <option value="0" <?php echo e(old('is_active', true) ? '' : 'selected'); ?>>Inactive</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>सुरक्षा गर्नुहोस्
            </button>
            <a href="<?php echo e(route('admin.officials.index')); ?>" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/admin/officials/create.blade.php ENDPATH**/ ?>