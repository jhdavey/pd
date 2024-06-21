<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="space-y-5">

        <section>
            <?php if (isset($component)) { $__componentOriginal755230460fd16c04121658d92fbf99f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal755230460fd16c04121658d92fbf99f7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-heading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Featured Builds <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $attributes = $__attributesOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__attributesOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $component = $__componentOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__componentOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>

            <div class="grid lg:grid-cols-3 gap-4 mt-6">
                <?php $__currentLoopData = $featuredBuilds->slice(0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $build): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal5fde05e695b542f28145d5693d094737 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5fde05e695b542f28145d5693d094737 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.build-card','data' => ['build' => $build]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('build-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['build' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($build)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5fde05e695b542f28145d5693d094737)): ?>
<?php $attributes = $__attributesOriginal5fde05e695b542f28145d5693d094737; ?>
<?php unset($__attributesOriginal5fde05e695b542f28145d5693d094737); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5fde05e695b542f28145d5693d094737)): ?>
<?php $component = $__componentOriginal5fde05e695b542f28145d5693d094737; ?>
<?php unset($__componentOriginal5fde05e695b542f28145d5693d094737); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

        <?php if(auth()->guard()->check()): ?>
        <?php if (isset($component)) { $__componentOriginald0495422f48e6edfdb236e328bf8de98 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0495422f48e6edfdb236e328bf8de98 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.divider','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0495422f48e6edfdb236e328bf8de98)): ?>
<?php $attributes = $__attributesOriginald0495422f48e6edfdb236e328bf8de98; ?>
<?php unset($__attributesOriginald0495422f48e6edfdb236e328bf8de98); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0495422f48e6edfdb236e328bf8de98)): ?>
<?php $component = $__componentOriginald0495422f48e6edfdb236e328bf8de98; ?>
<?php unset($__componentOriginald0495422f48e6edfdb236e328bf8de98); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal755230460fd16c04121658d92fbf99f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal755230460fd16c04121658d92fbf99f7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-heading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Following <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $attributes = $__attributesOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__attributesOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $component = $__componentOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__componentOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>
        <?php if($followingBuilds->isEmpty()): ?>
            <p>You are not following any users with builds yet.</p>
        <?php else: ?>
            <ul>
            <div class="grid lg:grid-cols-3 gap-4 mt-6">
                <?php $__currentLoopData = $followingBuilds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $build): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal5fde05e695b542f28145d5693d094737 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5fde05e695b542f28145d5693d094737 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.build-card','data' => ['build' => $build]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('build-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['build' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($build)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5fde05e695b542f28145d5693d094737)): ?>
<?php $attributes = $__attributesOriginal5fde05e695b542f28145d5693d094737; ?>
<?php unset($__attributesOriginal5fde05e695b542f28145d5693d094737); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5fde05e695b542f28145d5693d094737)): ?>
<?php $component = $__componentOriginal5fde05e695b542f28145d5693d094737; ?>
<?php unset($__componentOriginal5fde05e695b542f28145d5693d094737); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            </ul>
        <?php endif; ?>
    <?php endif; ?>

        <?php if (isset($component)) { $__componentOriginald0495422f48e6edfdb236e328bf8de98 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0495422f48e6edfdb236e328bf8de98 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.divider','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0495422f48e6edfdb236e328bf8de98)): ?>
<?php $attributes = $__attributesOriginald0495422f48e6edfdb236e328bf8de98; ?>
<?php unset($__attributesOriginald0495422f48e6edfdb236e328bf8de98); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0495422f48e6edfdb236e328bf8de98)): ?>
<?php $component = $__componentOriginald0495422f48e6edfdb236e328bf8de98; ?>
<?php unset($__componentOriginald0495422f48e6edfdb236e328bf8de98); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal755230460fd16c04121658d92fbf99f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal755230460fd16c04121658d92fbf99f7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-heading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Browse Builds <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $attributes = $__attributesOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__attributesOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $component = $__componentOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__componentOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>

        <section>
            <p>Browse by category:</p>
            <div class="flex flex-wrap gap-2 mt-2">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('search', ['build_category' => $category->build_category])); ?>" class="px-4 py-2 text-sm bg-white/10 hover:bg-white/25 rounded-xl font-bold transition-colors duration-200">
                    <?php echo e($category->build_category); ?>

                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        
        <section>
            <p>Browse by tag:</p>
            <div class="flex flex-wrap gap-2 mt-2">
                <?php $__currentLoopData = $tags->slice(0, 25); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        </section>

        <!-- Filter Form -->
        <form method="GET" action="<?php echo e(route('filtered')); ?>" class="md:flex justify-between items-end">
            <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['type' => 'text','name' => 'year','label' => 'Year','id' => 'year','value' => ''.e(request('year')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'year','label' => 'Year','id' => 'year','value' => ''.e(request('year')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $attributes = $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $component = $__componentOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['type' => 'text','name' => 'make','label' => 'Make','id' => 'make','value' => ''.e(request('make')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'make','label' => 'Make','id' => 'make','value' => ''.e(request('make')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $attributes = $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $component = $__componentOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['type' => 'text','name' => 'model','label' => 'Model','id' => 'model','value' => ''.e(request('model')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'model','label' => 'Model','id' => 'model','value' => ''.e(request('model')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $attributes = $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $component = $__componentOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>

            <button type="submit" class="font-bold px-8 py-2 my-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">
                Filter
            </button>
        </form>

        <!-- Recently added builds -->

        <section>
            <?php if($builds->isEmpty()): ?>
            <div class="text-center text-gray-500">
                No builds found...
            </div>
            <?php else: ?>

            <?php if (isset($component)) { $__componentOriginal755230460fd16c04121658d92fbf99f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal755230460fd16c04121658d92fbf99f7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-heading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Recently Updated <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $attributes = $__attributesOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__attributesOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $component = $__componentOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__componentOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>

            <div class="grid lg:grid-cols-3 gap-4 mt-6">
                <?php $__currentLoopData = $builds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $build): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal5fde05e695b542f28145d5693d094737 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5fde05e695b542f28145d5693d094737 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.build-card','data' => ['build' => $build]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('build-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['build' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($build)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5fde05e695b542f28145d5693d094737)): ?>
<?php $attributes = $__attributesOriginal5fde05e695b542f28145d5693d094737; ?>
<?php unset($__attributesOriginal5fde05e695b542f28145d5693d094737); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5fde05e695b542f28145d5693d094737)): ?>
<?php $component = $__componentOriginal5fde05e695b542f28145d5693d094737; ?>
<?php unset($__componentOriginal5fde05e695b542f28145d5693d094737); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </section>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\Users\jhdav\OneDrive\coding\php\pd\resources\views/builds/index.blade.php ENDPATH**/ ?>