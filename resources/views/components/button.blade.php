<button class="btn {{ $type ?? 'btn-primary' }} {{ $size ?? 'btn-md' }}">
    @if(isset($icon)) <i class="{{ $icon }}"></i> @endif
    {{ $slot }}
</button>
