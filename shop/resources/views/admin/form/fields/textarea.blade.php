<textarea id="{{ $field['name'] }}" name="{{ $field['name'] }}"
    @if (isset($field['inner'])) {{ $field['inner'] }} @endif class="form-control">{{ old($field['name']) != null ? old($field['name']) : @$field['value'] }}</textarea>
