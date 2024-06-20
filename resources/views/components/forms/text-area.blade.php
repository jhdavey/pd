@props(['label', 'name', 'value' => '', 'rows' => 3, 'placeholder' => ''])

<div class="mb-4">
    <label for="{{ $name }}">
        <span class="ml-1 w-2 h-2 bg-white inline-block"></span>
    <label class="font-bold" for="{{ $name }}">{{ $label }}</label>
    <textarea 
        name="{{ $name }}" 
        id="{{ $name }}" 
        rows="{{ $rows }}" 
        placeholder="{{ $placeholder }}" 
        class="tinytextarea {{ $errors->has($name) ? 'border-red-500' : '' }}"
        {{ $attributes }}
    >{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- TinyMCE Rich text editor -->
<script src="https://cdn.tiny.cloud/1/swcectlvcctnntnb8qbjbtqpn40l9x0v8apa51tpbfly3o9c/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '.tinytextarea', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    skin: 'oxide-dark',
    content_css: 'dark',
    height: 200,
    branding: false, // Set maximum height
  });
</script>
