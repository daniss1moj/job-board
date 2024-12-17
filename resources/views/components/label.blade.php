  <label for="{{ $for }}" {{ $attributes->class('mb-2 block text-sm font-medium') }}>
      {{ $slot }} @if ($required)
          <span class='text-red-500'>*</span>
      @endif
  </label>
