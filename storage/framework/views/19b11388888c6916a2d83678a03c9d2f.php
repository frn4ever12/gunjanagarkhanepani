<?php $__env->startSection('title', 'नागरिक वडापत्र - गुन्जनगर खानेपानी आयोजना'); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginalb00c7f6baf7ea834a0251f4153d10b8b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb00c7f6baf7ea834a0251f4153d10b8b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-banner','data' => ['title' => 'नागरिक वडापत्र','breadcrumb' => ['हाम्रो बारेमा', 'नागरिक वडापत्र']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('page-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'नागरिक वडापत्र','breadcrumb' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['हाम्रो बारेमा', 'नागरिक वडापत्र'])]); ?>
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
                <h2>नागरिक वडापत्र</h2>
                <p>गुन्जनगर खानेपानी आयोजनाको नागरिक वडापत्र:</p>
                <ul>
                    <li>गुणस्तरीय खानेपानी सेवा प्रदान गर्ने</li>
                    <li>समयमै सेवा दिने</li>
                    <li>पारदर्शिता बनाउने</li>
                    <li>जनविश्वास अर्जन गर्ने</li>
                    <li>ग्राहक सन्तुष्टि सुनिश्चित गर्ने</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/pages/citizen-charter.blade.php ENDPATH**/ ?>