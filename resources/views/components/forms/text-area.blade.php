@props(['label', 'name', 'value' => '', 'rows' => 2, 'placeholder' => ''])

<div class="mb-2">
  <label for="{{ $name }}" class="flex items-center gap-x-2">
    <span class="w-2 h-2 bg-white inline-block rounded-sm"></span>

    <span class="font-bold">{{ $label }}</span>
  </label>

  <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}" class="mt-2 w-full break-words border rounded-md bg-white/10 border-white/10 px-4 py-2 placeholder:text-white/10 resize-none overflow-hidden {{ $errors->has($name) ? 'border-red-500' : '' }}" {{ $attributes }}>{{ old($name, $value) }}</textarea>

  @error($name)
  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
  @enderror
</div>