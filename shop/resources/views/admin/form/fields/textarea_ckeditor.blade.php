<textarea id="{{ $field['name'] }}" name="{{ $field['name'] }}" class="form-control">{!! old($field['name']) != null ? old($field['name']) : @$field['value'] !!}</textarea>
<script>
    CKEDITOR.replace("{{ $field['name'] }}");
</script>
