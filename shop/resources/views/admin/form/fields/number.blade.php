<input type="number" name="{{ $field['name'] }}" min="0" id="{{ $field['name'] }}"
    value="{{ old($field['name']) != null ? old($field['name']) : @$field['value'] }}" class="form-control"
    @if (strpos($field['class'], 'required') !== false) required @endif>
