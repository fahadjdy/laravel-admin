<!-- resources/views/components/input.blade.php -->
<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" class="form-control" id="{{ $id }}" name="{{ $name }}" value="{{ $value ?? '' }}">
</div>
