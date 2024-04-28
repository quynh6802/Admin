<label for="{{ $field['name'] }}" class="kt-checkbox">Active
    <input name="{{ $field['name'] }}" type="checkbox" class="" id="{{ $field['name'] }}"
        {{ old(@$field['name']) != null || (isset($field['value']) && $field['value'] != 0) ? 'checked' : '' }}>
</label>
