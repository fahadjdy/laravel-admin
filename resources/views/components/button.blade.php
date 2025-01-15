<button class="btn btn-{{ $type ?? 'primary' }}">
    @if(isset($icon)) <i class="fa fa-{{ $icon }}"></i> @endif
    {{ $slot }}
</button>
