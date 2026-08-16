<?php $__env->startSection('title', 'कर्मचारी विवरण - गुन्जनगर खानेपानी आयोजना'); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginalb00c7f6baf7ea834a0251f4153d10b8b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb00c7f6baf7ea834a0251f4153d10b8b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-banner','data' => ['title' => 'कर्मचारी विवरण','breadcrumb' => ['हाम्रो बारेमा', 'कर्मचारी विवरण']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('page-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'कर्मचारी विवरण','breadcrumb' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['हाम्रो बारेमा', 'कर्मचारी विवरण'])]); ?>
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
                <h2>कर्मचारी विवरण</h2>
                <p>गुन्जनगर खानेपानी आयोजनाका कर्मचारीहरू:</p>
                
                <?php if($staff && $staff->count() > 0): ?>
                <div class="row">
                    <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staffMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="official-card-page">
                            <?php if($staffMember->photo): ?>
                            <img src="<?php echo e(asset('uploads/' . $staffMember->photo)); ?>" alt="<?php echo e($staffMember->name); ?>" class="official-photo-page">
                            <?php else: ?>
                            <div class="official-photo-placeholder-page">
                                <?php echo e(substr($staffMember->name, 0, 1)); ?>

                            </div>
                            <?php endif; ?>
                            <h4><?php echo e($staffMember->name); ?></h4>
                            <p class="designation"><?php echo e($staffMember->position); ?></p>
                            <?php if($staffMember->email): ?>
                            <p class="contact-info">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:<?php echo e($staffMember->email); ?>"><?php echo e($staffMember->email); ?></a>
                            </p>
                            <?php endif; ?>
                            <?php if($staffMember->phone): ?>
                            <p class="contact-info">
                                <i class="fas fa-phone"></i>
                                <?php echo e($staffMember->phone); ?>

                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <p>कर्मचारी विवरण उपलब्ध छैन।</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/pages/staff.blade.php ENDPATH**/ ?>