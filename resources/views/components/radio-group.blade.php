<div>
    @if ($allOption)
        <label for="{{ $name }}" class='mb-1 flex items-center'>
            <input type="radio" name='{{ $name }}' value='' @checked(!request($name))>
            <span class='ml-2'>All</span>
        </label>
    @endif
    @foreach ($optionsWithLabel as $label => $option)
        <label for="$name" class='mb-1 flex items-center'>
            <input type="radio" name='{{ $name }}' value='{{ $option }}' @checked($value ?? request($name) === $option)>
            <span class='ml-2'>{{ ucfirst($label) }}</span>
        </label>
    @endforeach
    @error($name)
        <p class='mt-1 text-xs text-red-500'>
            {{ $message }}
        </p>
    @enderror
</div>
