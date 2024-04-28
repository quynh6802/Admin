<?php $value[] = old($field['name']) != null ? old($field['name']) : @$field['value']; ?>
<select name="{{ $field['name'] }}" id="{{ $field['name'] }}" class="form-control custom-select">
    @foreach ($field['option'] as $k => $v)
        <option value="{{ $k }}" {{ in_array($k, $value) ? 'selected ' : '' }}>
            {{ $v }}</option>
    @endforeach
</select>
