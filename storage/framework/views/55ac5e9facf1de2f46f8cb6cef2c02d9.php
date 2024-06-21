<?php
$socialMedia = [
'instagram' => ['label' => 'IG', 'url' => 'https://instagram.com/', 'property' => $user->instagram],
'facebook' => ['label' => 'FB', 'url' => 'https://facebook.com/', 'property' => $user->facebook],
'tiktok' => ['label' => 'TikTok', 'url' => 'https://tiktok.com/@', 'property' => $user->tiktok],
'youtube' => ['label' => 'YT', 'url' => 'https://youtube.com/', 'property' => $user->youtube],
];
?>

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

    <?php if(auth()->guard()->check()): ?>
    <div class="w-full text-end mb-1">
        <a href="/profile/<?php echo e($authUser->id); ?>" class="hover:text-gray-500">Edit Profile</a>
    </div>
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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-3">
            <!-- Top Row: Profile Image, Title, Followers, and Follow/Unfollow Button -->
            <div class="flex flex-col md:flex-row md:space-x-6 items-center justify-between md:col-span-2">
                <div class="flex items-center space-x-4">
                    <?php if($user->profile_image): ?>
                    <div class="mt-2 md:mt-0">
                        <img src="<?php echo e(Storage::url($user->profile_image)); ?>" alt="Profile Image" class="h-20 w-20 rounded-full object-cover">
                    </div>
                    <?php endif; ?>

                    <h1 class="font-bold text-3xl"><?php echo e($user->name); ?>'s Garage</h1>
                </div>

                <div class="text-center md:text-end mt-4 md:mt-0">
                    <p class="text-sm"><?php echo e($followerCount); ?> followers</p>
                    <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::id() !== $user->id): ?>
                    <?php if(Auth::user()->follows->contains($user->id)): ?>
                    <form action="<?php echo e(route('unfollow', $user->id)); ?>" method="POST" class="inline-block">
                        <?php echo csrf_field(); ?>
                        <button class="text-xl font-bold mt-2 md:mt-0" type="submit">Unfollow</button>
                    </form>
                    <?php else: ?>
                    <form action="<?php echo e(route('follow', $user->id)); ?>" method="POST" class="inline-block">
                        <?php echo csrf_field(); ?>
                        <button class="text-xl font-bold mt-2 md:mt-0" type="submit">Follow</button>
                    </form>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Bottom Row: Bio and Social Media Links -->
            <div>
                <p class="ml-2 text-center md:text-start"><?php echo $user->bio; ?></p>
            </div>

            <div class="text-center md:text-end">
                <ul class="space-y-2">
                    <?php $__currentLoopData = $socialMedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($media['property'])): ?>
                    <li><?php echo e($media['label']); ?>: <a href="<?php echo e($media['url'] . $media['property']); ?>" target="_blank" class="text-blue-300"><?php echo e($media['property']); ?></a></li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    <?php if(auth()->guard()->check()): ?>
    <?php if(Auth::id() === $user->id): ?>
    <div class="w-full grid place-items-end">
        <a href="/builds/create" class="font-bold px-5 py-2 bg-white/10 hover:bg-white/25 rounded-lg transition-colors duration-200">New Build</a>
    </div>
    <?php endif; ?>
    <?php endif; ?>

    <div class="mt-6">
        <?php $__currentLoopData = $builds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $build): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if (isset($component)) { $__componentOriginal1fd51119b27aeec645bf1eaf6dd9dd59 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1fd51119b27aeec645bf1eaf6dd9dd59 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.build-card-wide','data' => ['build' => $build]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('build-card-wide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['build' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($build)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1fd51119b27aeec645bf1eaf6dd9dd59)): ?>
<?php $attributes = $__attributesOriginal1fd51119b27aeec645bf1eaf6dd9dd59; ?>
<?php unset($__attributesOriginal1fd51119b27aeec645bf1eaf6dd9dd59); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1fd51119b27aeec645bf1eaf6dd9dd59)): ?>
<?php $component = $__componentOriginal1fd51119b27aeec645bf1eaf6dd9dd59; ?>
<?php unset($__componentOriginal1fd51119b27aeec645bf1eaf6dd9dd59); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php endif; ?><?php /**PATH C:\Users\jhdav\OneDrive\coding\php\pd\resources\views/garage/show.blade.php ENDPATH**/ ?>