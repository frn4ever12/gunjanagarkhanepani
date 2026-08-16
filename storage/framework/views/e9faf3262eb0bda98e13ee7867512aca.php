<?php $__env->startSection('title', 'सञ्चालक समिति - गुन्जनगर खानेपानी आयोजना'); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginalb00c7f6baf7ea834a0251f4153d10b8b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb00c7f6baf7ea834a0251f4153d10b8b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-banner','data' => ['title' => 'सञ्चालक समिति','breadcrumb' => ['हाम्रो बारेमा', 'सञ्चालक समिति']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('page-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'सञ्चालक समिति','breadcrumb' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['हाम्रो बारेमा', 'सञ्चालक समिति'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb00c7f6baf7ea834a0251f4153d10b8b)): ?>
<?php $attributes = $__attributesOriginalb00c7f6baf7ea834a0251f4153d10b8b; ?>
<?php unset($__attributesOriginalb00c7f6baf7ea834a0251f4153d10b8b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb00c7f6baf7ea834a0251f4153d10b8b)): ?>
<?php $component = $__componentOriginalb00c7f6baf7ea834a0251f4153d10b8b; ?>
<?php unset($__componentOriginalb00c7f6baf7ea834a0251f4153d10b8b); ?>
<?php endif; ?>

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>सञ्चालक समिति</h2>
                <p>गुन्जनगर खानेपानी आयोजनाको सञ्चालक समितिका सदस्यहरू:</p>
                
                <?php if($officials && $officials->count() > 0): ?>
                <div class="row">
                    <?php $__currentLoopData = $officials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $official): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="official-card-page">
                            <?php if($official->photo): ?>
                            <img src="<?php echo e(asset('uploads/' . $official->photo)); ?>" alt="<?php echo e($official->name); ?>" class="official-photo-page">
                            <?php else: ?>
                            <div class="official-photo-placeholder-page">
                                <?php echo e(substr($official->name, 0, 1)); ?>

                            </div>
                            <?php endif; ?>
                            <h4><?php echo e($official->name); ?></h4>
                            <p class="designation"><?php echo e($official->position); ?></p>
                            <?php if($official->email): ?>
                            <p class="contact-info">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:<?php echo e($official->email); ?>"><?php echo e($official->email); ?></a>
                            </p>
                            <?php endif; ?>
                            <?php if($official->phone): ?>
                            <p class="contact-info">
                                <i class="fas fa-phone"></i>
                                <?php echo e($official->phone); ?>

                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <p>सञ्चालक समिति सदस्यहरूको जानकारी उपलब्ध छैन।</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/pages/board-of-directors.blade.php ENDPATH**/ ?>