<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['label', 'name', 'value' => '', 'rows' => 2, 'placeholder' => '']));

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

foreach (array_filter((['label', 'name', 'value' => '', 'rows' => 2, 'placeholder' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="mb-2">
  <label for="<?php echo e($name); ?>" class="flex items-center gap-x-2">
    <span class="w-2 h-2 bg-white inline-block rounded-sm"></span>

    <span class="font-bold"><?php echo e($label); ?></span>
  </label>

  <textarea name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" rows="<?php echo e($rows); ?>" placeholder="<?php echo e($placeholder); ?>" class="mt-2 w-full break-words border rounded-md bg-white/10 border-white/10 px-4 py-2 placeholder:text-white/10 resize-none overflow-hidden <?php echo e($errors->has($name) ? 'border-red-500' : ''); ?>" <?php echo e($attributes); ?>><?php echo e(old($name, $value)); ?></textarea>

  <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div><?php /**PATH C:\Users\jhdav\OneDrive\coding\php\pd\resources\views/components/forms/text-area.blade.php ENDPATH**/ ?>