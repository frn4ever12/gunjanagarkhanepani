<?php $__env->startSection('title', 'हाम्रो बारेमा - गुन्जनगर खानेपानी आयोजना'); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginalb00c7f6baf7ea834a0251f4153d10b8b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb00c7f6baf7ea834a0251f4153d10b8b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-banner','data' => ['title' => 'हाम्रो बारेमा','breadcrumb' => ['हाम्रो बारेमा']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('page-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'हाम्रो बारेमा','breadcrumb' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['हाम्रो बारेमा'])]); ?>
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
                <?php if($page): ?>
                    <h2><?php echo e($page->title_np ?? 'हाम्रो बारेमा'); ?></h2>
                    <div class="page-body">
                        <?php echo $page->content_np ?? $page->content ?? ''; ?>

                    </div>
                <?php else: ?>
                    <h2>हाम्रो बारेमा</h2>
                    <p>गुन्जनगर खानेपानी आयोजनाले गुन्जनगर नगरपालिकाका नागरिकहरूलाई गुणस्तरीय खानेपानी सेवा उपलब्ध गराउने प्रमुख उद्देश्य राखेको छ।</p>
                    <p>हाम्रो संगठनले सबै नागरिकलाई सुरक्षित, सरसफा र पर्याप्त खानेपानी आपूर्ति गर्ने प्रतिबद्धता व्यक्त गर्दछ।</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/pages/about.blade.php ENDPATH**/ ?>