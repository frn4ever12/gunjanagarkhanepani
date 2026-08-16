<?php $__env->startSection('title', 'Edit Official - Admin'); ?>

<?php $__env->startSection('page-title', 'पदाधिकारी सम्पादन गर्नुहोस्'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">पदाधिकारी सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('admin.officials.update', $official)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="mb-3">
                <label class="form-label">नाम *</label>
                <input type="text" class="form-control" name="name" value="<?php echo e(old('name', $official->name)); ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">पद *</label>
                <input type="text" class="form-control" name="position" value="<?php echo e(old('position', $official->position)); ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Designation</label>
                <input type="text" class="form-control" name="designation" value="<?php echo e(old('designation', $official->designation)); ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">फोटो</label>
                <input type="file" class="form-control" name="photo">
                <?php if($official->photo): ?>
                <small class="text-muted">Current: <a href="<?php echo e(asset('storage/' . $official->photo)); ?>" target="_blank">View Photo</a></small>
                <?php endif; ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">जीवनी</label>
                <textarea class="form-control" name="bio" rows="3"><?php echo e(old('bio', $official->bio)); ?></textarea>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">फोन</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo e(old('phone', $official->phone)); ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">इमेल</label>
                    <input type="email" class="form-control" name="email" value="<?php echo e(old('email', $official->email)); ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="<?php echo e(old('order', $official->order)); ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">गृहपृष्ठमा देखाउनुहोस्</label>
                    <select class="form-control" name="show_on_homepage">
                        <option value="1" <?php echo e(old('show_on_homepage', $official->show_on_homepage) ? 'selected' : ''); ?>>Yes</option>
                        <option value="0" <?php echo e(old('show_on_homepage', $official->show_on_homepage) ? '' : 'selected'); ?>>No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_active">
                        <option value="1" <?php echo e(old('is_active', $official->is_active) ? 'selected' : ''); ?>>Active</option>
                        <option value="0" <?php echo e(old('is_active', $official->is_active) ? '' : 'selected'); ?>>Inactive</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="<?php echo e(route('admin.officials.index')); ?>" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/admin/officials/edit.blade.php ENDPATH**/ ?>