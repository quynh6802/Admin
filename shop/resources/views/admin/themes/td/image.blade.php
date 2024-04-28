@php
    if ($item->{$field['name']} != null) {
        $item->{$field['name']} = '/uploads/' . $item->{$field['name']};
    }
@endphp
<li class="list-inline-item">
    <img alt="Avatar" class="table-avatar file_image_thumb"
        src="{{ $item->{$field['name']} == '' ? '/uploads/avatar.png' : $item->{$field['name']} }}">
</li>
<style>
    .projects .table-avatar img,
    .projects img.table-avatar {
        border-radius: 0 !important;
    }
</style>
