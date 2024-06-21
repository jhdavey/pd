<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['label', 'name', 'value' => '', 'rows' => 3, 'placeholder' => '']));

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

foreach (array_filter((['label', 'name', 'value' => '', 'rows' => 3, 'placeholder' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="mb-4">
    <label for="<?php echo e($name); ?>">
        <span class="ml-1 w-2 h-2 bg-white inline-block"></span>
    <label class="font-bold" for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
    <textarea 
        name="<?php echo e($name); ?>" 
        id="<?php echo e($name); ?>" 
        rows="<?php echo e($rows); ?>" 
        placeholder="<?php echo e($placeholder); ?>" 
        class="tinytextarea <?php echo e($errors->has($name) ? 'border-red-500' : ''); ?>"
        <?php echo e($attributes); ?>

    ><?php echo e(old($name, $value)); ?></textarea>
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
</div>

<!-- TinyMCE Rich text editor -->
<script src="https://cdn.tiny.cloud/1/swcectlvcctnntnb8qbjbtqpn40l9x0v8apa51tpbfly3o9c/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '.tinytextarea', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'image lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | image',
    skin: 'oxide-dark',
    content_css: 'dark',
    height: 200,
    branding: false,
    images_upload_url: '/image-upload',
    file_picker_types: 'image',
      images_upload_handler: function(blobInfo, success, failure) {
        let xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '/image-upload');
        xhr.setRequestHeader('X-CSRF-TOKEN', '<?php echo e(csrf_token()); ?>');
        xhr.onload = function() {
          let json;
          if (xhr.status != 200) {
            failure('HTTP Error: ' + xhr.status);
            return;
          }
          json = JSON.parse(xhr.responseText);
          if (!json || typeof json.location != 'string') {
            failure('Invalid JSON: ' + xhr.responseText);
            return;
          }
          success(json.location);
        };
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
      },
      file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function() {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function() {
            var id = 'blobid' + (new Date()).getTime();
            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);
            cb(blobInfo.blobUri(), { title: file.name });
          };
          reader.readAsDataURL(file);
        };
        input.click();
      }
    });
</script><?php /**PATH C:\Users\jhdav\OneDrive\coding\php\pd\resources\views/components/forms/text-area.blade.php ENDPATH**/ ?>