<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['build']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['build']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    use Illuminate\Support\Facades\Storage;
?>

<div class="mt-5">
    <a href="/builds/<?php echo e($build['id']); ?>">
        <?php if (isset($component)) { $__componentOriginal36665f0dc0e45320e21db1e20a989acf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36665f0dc0e45320e21db1e20a989acf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.panel','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <div class="md:flex md:space-x-6">
                <img class="w-auto max-h-48 md:max-w-40 mx-auto rounded-lg" src="<?php echo e(Storage::url($build->image)); ?>" alt="Build Feature Image">                

                <div class="w-full">
                    <div class="md:flex md:justify-between">
                        <p class="text-center md:text-left font-bold text-2xl group-hover:text-gray-500 transition-colors duration-200">
                            <?php echo e($build->year); ?> <?php echo e($build->make); ?> <?php echo e($build->model); ?> <?php echo e($build->trim); ?></p>
                        <p class="text-center">Build type: <?php echo e($build->build_category); ?></p>
                    </div>
                    <div class="text-center md:text-left md:flex md:space-x-5 mt-4">
                        <ul class="list-none">
                            <?php if(isset($build['hp'])): ?>
                                <li><span class="font-bold text-lg">Horsepower:</span> <?php echo e($build['hp']); ?></li>
                            <?php endif; ?>
                            <?php if(isset($build['whp'])): ?>
                                <li><span class="font-bold text-lg">Wheel HP:</span> <?php echo e($build['whp']); ?></li>
                            <?php endif; ?>
                            
                        </ul>
                        <ul class="list-none">
                            <?php if(isset($build['torque'])): ?>
                                <li><span class="font-bold text-lg">Torque:</span> <?php echo e($build['torque']); ?> lb-ft</li>
                            <?php endif; ?>
                            <?php if(isset($build['weight'])): ?>
                                <li><span class="font-bold text-lg">Curb weight:</span> <?php echo e($build['weight']); ?> lbs</li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div name="col-3" class="mt-3 flex flex-wrap gap-2 justify-center md:justify-end">
                        <?php $__currentLoopData = $build->tags->slice(0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal9ccaa90195d4e06c31c1de306aacdf44 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ccaa90195d4e06c31c1de306aacdf44 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tag','data' => ['tag' => $tag]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tag)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ccaa90195d4e06c31c1de306aacdf44)): ?>
<?php $attributes = $__attributesOriginal9ccaa90195d4e06c31c1de306aacdf44; ?>
<?php unset($__attributesOriginal9ccaa90195d4e06c31c1de306aacdf44); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ccaa90195d4e06c31c1de306aacdf44)): ?>
<?php $component = $__componentOriginal9ccaa90195d4e06c31c1de306aacdf44; ?>
<?php unset($__componentOriginal9ccaa90195d4e06c31c1de306aacdf44); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
                    </div>
                </div>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal36665f0dc0e45320e21db1e20a989acf)): ?>
<?php $attributes = $__attributesOriginal36665f0dc0e45320e21db1e20a989acf; ?>
<?php unset($__attributesOriginal36665f0dc0e45320e21db1e20a989acf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal36665f0dc0e45320e21db1e20a989acf)): ?>
<?php $component = $__componentOriginal36665f0dc0e45320e21db1e20a989acf; ?>
<?php unset($__componentOriginal36665f0dc0e45320e21db1e20a989acf); ?>
<?php endif; ?>
    </a>
</div>
<?php /**PATH C:\Users\jhdav\OneDrive\coding\php\pd\resources\views/components/build-card-wide.blade.php ENDPATH**/ ?>