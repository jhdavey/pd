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

    <?php if (isset($component)) { $__componentOriginal7eb75b6122f4dbdf4983085b747c5104 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7eb75b6122f4dbdf4983085b747c5104 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-message','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7eb75b6122f4dbdf4983085b747c5104)): ?>
<?php $attributes = $__attributesOriginal7eb75b6122f4dbdf4983085b747c5104; ?>
<?php unset($__attributesOriginal7eb75b6122f4dbdf4983085b747c5104); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7eb75b6122f4dbdf4983085b747c5104)): ?>
<?php $component = $__componentOriginal7eb75b6122f4dbdf4983085b747c5104; ?>
<?php unset($__componentOriginal7eb75b6122f4dbdf4983085b747c5104); ?>
<?php endif; ?>

    <div class="md:flex md:justify-between items-center mt-2">
        <h1 class="text-2xl font-bold">
            <?php echo e($build->user->name); ?>'s <?php echo e($build['year']); ?> <?php echo e($build['make']); ?> <?php echo e($build['model']); ?> <?php echo e($build['trim']); ?>

        </h1>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', $build)): ?>
        <div class="flex flex-wrap space-x-2">
            <a href="/mods/<?php echo e($build->id); ?>/create" class="mt-2 font-bold px-4 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Add mod</a>

            <a href="/builds/<?php echo e($build->id); ?>/edit" class="mt-2 font-bold px-4 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Edit Build</a>
        </div>
        <?php endif; ?>
    </div>

    <img class="mx-auto w-auto max-h-[780px] rounded-lg mt-5" src="<?php echo e(Storage::url($build->image)); ?>" alt="Build Feature Image">

    <?php if($build->images->isNotEmpty()): ?>
    <div class="p-2 w-full grid grid-cols-2 place-items-center md:grid md:grid-cols-5 gap-3">
        <?php $__currentLoopData = $build->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="#" class="image-link" data-image-url="<?php echo e(Storage::url($image->path)); ?>">
            <img class="w-full md:max-w-44 rounded-lg" src="<?php echo e(Storage::url($image->path)); ?>" alt="Additional Build Image">
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>

    <!-- Image Modal Structure -->
    <div id="image-modal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
        <div class="relative bg-background p-4 rounded-lg max-w-full max-h-full md:max-w-4xl">
            <button id="close-modal" class="absolute top-0 right-0 text-red-500 bg-white rounded p-3">X</button>
            <img id="modal-image" src="" alt="Full Size Image" class="max-w-full max-h-full">
        </div>
    </div>

    <div class="my-3 flex flex-wrap gap-2">
        <?php $__currentLoopData = $build->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

    <div class="px-2 my-2 md:flex md:justify-between items-center">
        <?php if (isset($component)) { $__componentOriginal755230460fd16c04121658d92fbf99f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal755230460fd16c04121658d92fbf99f7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-heading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Vehicle Specs <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $attributes = $__attributesOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__attributesOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $component = $__componentOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__componentOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>

        <p class="text-lg">Build type: <?php echo e($build->build_category); ?></p>
    </div>

    <div class="space-y-2">
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
            <div class="md:grid md:grid-cols-2 md:gap-2">
                <div>
                    <ul class="list-none space-y-2">
                        <?php if($build->hp): ?><li><span class="font-bold">Horsepower:</span> <?php echo e($build->hp); ?></li><?php endif; ?>
                        <?php if($build->whp): ?><li><span class="font-bold">Wheel HP:</span> <?php echo e($build->whp); ?></li><?php endif; ?>
                        <?php if($build->torque): ?><li><span class="font-bold">Torque:</span> <?php echo e($build->torque); ?></li><?php endif; ?>
                        <?php if($build->weight): ?><li><span class="font-bold">Curb Weight:</span> <?php echo e($build->weight); ?></li><?php endif; ?>
                    </ul>
                </div>

                <ul class="list-none space-y-2">
                    <?php if($build->zeroSixty): ?><li><span class="font-bold">0-60 Time:</span> <?php echo e($build->zeroSixty); ?></li><?php endif; ?>
                    <?php if($build->zeroOneHundred): ?><li><span class="font-bold">0-100 Time:</span> <?php echo e($build->zeroOneHundred); ?></li><?php endif; ?>
                    <?php if($build->quarterMile): ?><li><span class="font-bold">1/4 Mile Time:</span> <?php echo e($build->quarterMile); ?></li><?php endif; ?>
                </ul>
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
            <div class="md:grid md:grid-cols-2 md:gap-2">
                <div>
                    <ul class="list-none space-y-2">
                        <?php if($build->vehicleLayout): ?><li><span class="font-bold">Platform Layout:</span> <?php echo e($build->vehicleLayout); ?></li><?php endif; ?>
                        <?php if($build->engineType): ?><li><span class="font-bold">Engine Type:</span> <?php echo e($build->engineType); ?></li><?php endif; ?>
                        <?php if($build->engineCode): ?><li><span class="font-bold">Engine Code:</span> <?php echo e($build->engineCode); ?></li><?php endif; ?>
                        <?php if($build->fuel): ?><li><span class="font-bold">Fuel Type:</span> <?php echo e($build->fuel); ?></li><?php endif; ?>
                    </ul>
                </div>

                <div>
                    <ul class="list-none space-y-2">
                        <?php if($build->trans): ?><li><span class="font-bold">Transmission Type:</span> <?php echo e($build->trans); ?></li><?php endif; ?>
                        <?php if($build->suspension): ?><li><span class="font-bold">Suspension Type:</span> <?php echo e($build->suspension); ?></li><?php endif; ?>
                        <?php if($build->brakes): ?><li><span class="font-bold">Brake Setup:</span> <?php echo e($build->brakes); ?></li><?php endif; ?>
                    </ul>
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
    </div>

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

    <section class="space-y-2">
        <?php if($build->modifications->isEmpty()): ?>
        <div class="md:flex md:space-x-5 items-center">
            <p class="font-bold italic text-lg">No modifications have been added yet.</p>
            <br />
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', $build)): ?>
            <a href="/mods/<?php echo e($build->id); ?>/create" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Add mod</a>
            <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="w-full flex justify-between items-center">
            <?php if (isset($component)) { $__componentOriginal755230460fd16c04121658d92fbf99f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal755230460fd16c04121658d92fbf99f7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-heading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Modifications <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $attributes = $__attributesOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__attributesOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $component = $__componentOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__componentOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', $build)): ?>
            <a href="/mods/<?php echo e($build->id); ?>/create" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Add mod</a>
            <?php endif; ?>
        </div>

        <?php $__currentLoopData = $modificationsByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $modifications): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div x-data="{ open: false }" class="mb-4">
            <div class="flex justify-between items-center cursor-pointer p-2 my-2 bg-white/10 rounded-lg shadow-md" @click="open = !open">
                <h3 class="text-lg font-bold"><?php echo e($category); ?></h3>
                <svg class="w-6 h-6 transition-transform transform" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
            <div x-show="open" x-transition class="w-full mt-3 space-y-4">
                <?php $__currentLoopData = $modifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal36665f0dc0e45320e21db1e20a989acf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36665f0dc0e45320e21db1e20a989acf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.panel','data' => ['class' => 'mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4']); ?>
                    <div class="space-y-2 md:flex md:justify-between">
                        <p class="text-lg font-bold"><?php echo e($modification->brand); ?> <?php echo e($modification->name); ?></p>

                        <?php if(isset($modification->part)): ?>
                        <p>Part No: <?php echo e($modification->part); ?> <?php if(isset($modification->price)): ?>| $<?php echo e($modification->price); ?></p><?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <?php if(isset($modification->notes)): ?>
                    <p class="mt-3"><span class="font-bold">Notes:</span> <?php echo $modification->notes; ?></p>
                    <?php endif; ?>

                    <?php if($modification->images->isNotEmpty()): ?>
                    <div class="mt-4 w-full grid grid-cols-2 place-items-center md:grid md:grid-cols-5 gap-3">
                        <?php $__currentLoopData = $modification->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(Storage::url($image->image_path)); ?>" data-lightbox="mod-images-<?php echo e($modification->id); ?>" data-title="Modification Image" class="w-full">
                            <img src="<?php echo e(Storage::url($image->image_path)); ?>" alt="Modification Image" class="md:max-w-44 rounded">
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>

                    <a href="<?php echo e(route('mods.edit', ['build' => $modification->build_id, 'modification' => $modification->id])); ?>">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', $build)): ?><p class="text-sm text-end mt-4">edit mod</p><?php endif; ?>
                    </a>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </section>

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

    <!-- Build Notes Section -->
    <div class="mt-6">
        <!-- View build notes -->
        <?php if (isset($component)) { $__componentOriginal755230460fd16c04121658d92fbf99f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal755230460fd16c04121658d92fbf99f7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-heading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Build Notes <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $attributes = $__attributesOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__attributesOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $component = $__componentOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__componentOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>

        <?php if($build->notes->isNotEmpty()): ?>
        <?php $__currentLoopData = $build->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mt-4">
            <?php if (isset($component)) { $__componentOriginal36665f0dc0e45320e21db1e20a989acf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36665f0dc0e45320e21db1e20a989acf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.panel','data' => ['class' => 'break-words']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'break-words']); ?>
                <p><?php echo $note->body; ?></p>
                <p class="text-sm"><?php echo e($note->updated_at ? 'Edited' : 'Posted'); ?> by <?php echo e($note->user->name); ?> <?php echo e($note->updated_at ? $note->updated_at->setTimezone('America/New_York')->format('F j, Y \a\t g:i A') : $note->created_at->setTimezone('America/New_York')->format('F j, Y \a\t g:i A')); ?></p>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $note)): ?>
                <a href="<?php echo e(route('notes.edit', $note)); ?>" class="text-blue-500">Edit</a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $note)): ?>
                <form action="<?php echo e(route('notes.destroy', $note)); ?>" method="POST" class="inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
                <?php endif; ?>
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
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <p>No notes on this build yet...</p>
        <?php endif; ?>

        <!-- Add build note -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', $build)): ?>
        <form action="<?php echo e(route('notes.store', $build)); ?>" method="POST" class="mt-6">
            <?php echo csrf_field(); ?>

            <?php if (isset($component)) { $__componentOriginal55969134f145d87f901b914edda86cfe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal55969134f145d87f901b914edda86cfe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.text-area','data' => ['label' => 'Add a Note','name' => 'body','placeholder' => 'notes...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.text-area'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Add a Note','name' => 'body','placeholder' => 'notes...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal55969134f145d87f901b914edda86cfe)): ?>
<?php $attributes = $__attributesOriginal55969134f145d87f901b914edda86cfe; ?>
<?php unset($__attributesOriginal55969134f145d87f901b914edda86cfe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal55969134f145d87f901b914edda86cfe)): ?>
<?php $component = $__componentOriginal55969134f145d87f901b914edda86cfe; ?>
<?php unset($__componentOriginal55969134f145d87f901b914edda86cfe); ?>
<?php endif; ?>

            <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-sm mt-2"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <button type="submit" class="mt-4 font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Post Note</button>
        </form>
        <?php endif; ?>
    </div>

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

    <!-- Comments Section -->
    <div class="mt-6">
        <?php if (isset($component)) { $__componentOriginal755230460fd16c04121658d92fbf99f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal755230460fd16c04121658d92fbf99f7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-heading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Comments <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $attributes = $__attributesOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__attributesOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $component = $__componentOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__componentOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>

        <?php if($build->comments->isNotEmpty()): ?>
        <?php $__currentLoopData = $build->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mt-4">
            <?php if (isset($component)) { $__componentOriginal36665f0dc0e45320e21db1e20a989acf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36665f0dc0e45320e21db1e20a989acf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.panel','data' => ['class' => 'break-words']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'break-words']); ?>
                <p><?php echo e($comment->body); ?></p>
                <p class="text-sm">
                    <?php echo e($comment->updated_at ? 'Edited' : 'Posted'); ?> by
                    <a href="<?php echo e(route('garage.show', $comment->user->id)); ?>" class="text-blue-500">
                        <?php echo e($comment->user->name); ?>

                    </a>
                    <?php echo e($comment->updated_at ? $comment->updated_at->setTimezone('America/New_York')->format('F j, Y \a\t g:i A') : $comment->created_at->setTimezone('America/New_York')->format('F j, Y \a\t g:i A')); ?>

                </p>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $comment)): ?>
                <a href="<?php echo e(route('comments.edit', $comment)); ?>" class="text-blue-500">Edit</a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $comment)): ?>
                <form action="<?php echo e(route('comments.destroy', $comment)); ?>" method="POST" class="inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
                <?php endif; ?>
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
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <p>No comments on this build yet...</p>
        <?php endif; ?>

        <!-- Add a comment -->
        <?php if(auth()->guard()->check()): ?>
        <form action="<?php echo e(route('comments.store', $build)); ?>" method="POST" class="mt-6">
            <?php echo csrf_field(); ?>
            <textarea name="body" rows="2" class="w-full break-words border rounded-md bg-white/10 border-white/10 px-4 py-2 placeholder:text-white/10 resize-none overflow-hidden" placeholder="Love the wheel choice!" required><?php echo e(old('body')); ?></textarea>
            <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-sm mt-2"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <button type="submit" class="mt-4 font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">Post Comment</button>
        </form>
        <?php endif; ?>
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
<?php endif; ?>

<!-- Comment text area auto resize -->
<style>
    textarea {
        overflow-y: hidden;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.querySelector('textarea[name="body"]');

        if (textarea) {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            // Initial height setting for pre-filled textarea
            textarea.style.height = 'auto';
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }
    });
</script>

<!-- Image modal view -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('image-modal');
    const modalImage = document.getElementById('modal-image');
    const closeModalButton = document.getElementById('close-modal');
    const imageLinks = document.querySelectorAll('.image-link');

    imageLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const imageUrl = this.getAttribute('data-image-url');
            modalImage.setAttribute('src', imageUrl);
            modal.classList.remove('hidden');
        });
    });

    closeModalButton.addEventListener('click', function () {
        modal.classList.add('hidden');
    });

    // Close modal on clicking outside the image
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
});

</script><?php /**PATH C:\Users\jhdav\OneDrive\coding\php\pd\resources\views/builds/show.blade.php ENDPATH**/ ?>