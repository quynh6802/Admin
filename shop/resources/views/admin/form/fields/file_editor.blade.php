@php
    if (isset($field['value']) && $field['value'] != null) {
        $domain = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]";
        $field['value'] = $domain . '/uploads/' . $field['value'];
    }
@endphp
<div class="kt-avatar">
    <div class="kt-avatar-holder">
        <img src="{{ old($field['name']) != null ? old($field['name']) : @$field['value'] }}" id="avatar"
            class="img-thumbnail file-image-thumb" alt="...">
    </div>
    <label id="label_upload" for="avatar_upload" class="kt-avatar_upload">
        <i class="fas fa-pen"></i>
        <input type="file" hidden accept=".png,.jpg,.gif" id="avatar_upload" name="{{ $field['name'] }}"
            @if (strpos($field['class'], 'required' !== false)) required @endif value="">
    </label>
    <label class="kt-avatar_delete" id="delete_avatar">
        <i class="fas fa-times"></i>
    </label>
</div>
<script>
    $(document).ready(function() {
        @if (old($field['name']) == null && @$field['value'] == null)
            $("#avatar").attr("src", "/uploads/avatar.png");
        @endif
        $("#label_upload").click(function() {
            $("#avatar_upload").click();
        });

        // Khi input file thay đổi
        $("#avatar_upload").change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#avatar").attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        // Khi click vào biểu tượng xóa
        $("#delete_avatar").click(function() {
            $("#avatar").attr("src", "/uploads/avatar.png");
            $("#avatar").val("");

            // Sử dụng biến PHP bên trong biểu thức blade
            var fieldName = "{{ $field['name'] }}";
            $("<input>").attr({
                type: "hidden",
                name: "delete_" + fieldName,
                value: "1"
            }).prependTo("form");
        });
    });
</script>
