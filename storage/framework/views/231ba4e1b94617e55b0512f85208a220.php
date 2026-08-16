<?php
use Illuminate\Support\Str;
?>

<?php $__env->startSection('title', 'Dashboard - Admin'); ?>

<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-3">
        <div class="stat-card primary">
            <i class="fas fa-bullhorn icon"></i>
            <h3><?php echo e($stats['notices']); ?></h3>
            <p>Total Notices</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card secondary">
            <i class="fas fa-newspaper icon"></i>
            <h3><?php echo e($stats['news']); ?></h3>
            <p>Total News</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card success">
            <i class="fas fa-download icon"></i>
            <h3><?php echo e($stats['downloads']); ?></h3>
            <p>Downloads</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card warning">
            <i class="fas fa-images icon"></i>
            <h3><?php echo e($stats['gallery_images']); ?></h3>
            <p>Gallery Images</p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="stat-card info">
            <i class="fas fa-cogs icon"></i>
            <h3><?php echo e($stats['services']); ?></h3>
            <p>Services</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card danger">
            <i class="fas fa-user-tie icon"></i>
            <h3><?php echo e($stats['officials']); ?></h3>
            <p>Officials</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card primary">
            <i class="fas fa-file-alt icon"></i>
            <h3><?php echo e($stats['pages']); ?></h3>
            <p>Pages</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card success">
            <i class="fas fa-envelope icon"></i>
            <h3><?php echo e($stats['messages']); ?></h3>
            <p>New Messages</p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Recent Notices</span>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                <?php if($recentNotices->count() > 0): ?>
                <div class="list-group list-group-flush">
                    <?php $__currentLoopData = $recentNotices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1"><?php echo e(Str::limit($notice->title, 30)); ?></h6>
                            <small class="text-muted"><?php echo e($notice->publish_date->format('Y-m-d')); ?></small>
                        </div>
                        <?php if($notice->is_pinned): ?>
                        <span class="badge bg-danger">Pinned</span>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <p class="text-muted text-center mb-0">No notices found</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Recent News</span>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                <?php if($recentNews->count() > 0): ?>
                <div class="list-group list-group-flush">
                    <?php $__currentLoopData = $recentNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1"><?php echo e(Str::limit($news->title, 30)); ?></h6>
                            <small class="text-muted"><?php echo e($news->publish_date->format('Y-m-d')); ?></small>
                        </div>
                        <?php if($news->is_featured): ?>
                        <span class="badge bg-warning">Featured</span>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <p class="text-muted text-center mb-0">No news found</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Recent Messages</span>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                <?php if($recentMessages->count() > 0): ?>
                <div class="list-group list-group-flush">
                    <?php $__currentLoopData = $recentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1"><?php echo e(Str::limit($message->subject, 25)); ?></h6>
                            <small class="text-muted"><?php echo e($message->name); ?></small>
                        </div>
                        <span class="badge bg-<?php echo e($message->status === 'new' ? 'danger' : ($message->status === 'processing' ? 'warning' : 'success')); ?>">
                            <?php echo e(ucfirst($message->status)); ?>

                        </span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <p class="text-muted text-center mb-0">No messages found</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>