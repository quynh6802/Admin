@php
    $images = explode('|', @$result->{$field['name']});
@endphp
<div class="dropzone">
    <div class="dropzone-msg">
        <h3 class="dropzone-msg-title">Click upload</h3>
        <p>upload up to 6 files</p>
        <p id="error_multiple_files"></p>
    </div>
    <div class="table-responsive" id="imageContainer">
        @if ($images[0] != '')
            @foreach ($images as $k => $v)
                <div class="priview">
                    <img class="img-thumbnail" src="{{ asset('uploads/' . $v) }}" style="width: 150px; height: 150px;"
                        alt="">
                    <div class="delete_file_image" id="{{ $v }}">
                        <label for="delete_file_image" style="cursor: pointer">Delete
                            image</label>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<input type="file" hidden accept=".png,.jpg,.gif" multiple id="image-extra-file">
<div id="value-image-extra">
    @if ($images[0] != '')
        @foreach ($images as $k => $v)
            <input type="hidden" class="input-compele-{{ $k }}" name="{{ $field['name'] }}[]"
                value="{{ $v }}">
        @endforeach
    @endif
</div>
<script>
    $(document).ready(function() {
        var field_name = {!! json_encode($field['name']) !!};

        // function load_image_data() {
        //     $.ajax({
        //         type: "POST",
        //         url: '{{ URL::to('/admin/ajax-upload-file') }}',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         processData: false,
        //         contentType: false,
        //         cache: false,
        //         success: function(data) {
        //             alert(data);
        //         },
        //         error: function(xhr, status, error) {
        //             alert("Error: " + error);
        //         }
        //     });
        // }
        $(".dropzone-msg").click(function() {
            $("#image-extra-file").click();
        });
        $("#image-extra-file").change(function() {
            // load_image_data();
            var error_image = '';
            var form_data = new FormData();
            var files = $('#image-extra-file')[0].files;
            if (files.length > 10) {
                alert("max");
                error_image = "Upload tối đa 6 hình ảnh";
            } else {
                for (var i = 0; i < files.length; i++) {
                    var name = document.getElementById('image-extra-file').files[i].name;
                    var ext = name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        error_image += '<p>Tập tin ' + i + ' không hiệu lực</p>';
                    }
                    var f = document.getElementById('image-extra-file').files[i];
                    var fsize = f.size || f.fileSize;
                    if (fsize > 2000000) {
                        error_image += '<p>' + i + ' File quá lớn</p>';
                    } else {
                        form_data.append('file[]', document.getElementById('image-extra-file').files[
                            i]);
                    }
                }
            }
            if (error_image == '') {
                $.ajax({
                    type: 'POST',
                    url: '{{ URL::to('/admin/ajax-upload-file') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form_data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    // beforeSend: function() {
                    //     $('#error_multiple_files').html(
                    //         '<br/><label class="text-primary">Tải thành công</label>');
                    // },
                    success: function(result) {
                        for (var i = 0; i < result.data.length; i++) {
                            var imageDiv = $("<div>");
                            imageDiv.addClass("priview");
                            var imageElement = $("<img>");
                            imageElement.addClass("img-thumbnail");
                            imageElement.attr("src", result.data[i].file);
                            imageElement.css({
                                width: "150px",
                                height: "150px"
                            });
                            imageDiv.append(imageElement);
                            var buttonDelete = $("<div />");
                            buttonDelete.addClass("delete_file_image");
                            buttonDelete.attr("id", result.data[i].value);
                            var label_delete = $("<label>Delete Image</label>");
                            label_delete.attr({
                                "for": "delete_file_image",
                                "style": "cursor: pointer",
                            });
                            buttonDelete.append(label_delete);
                            imageDiv.append(buttonDelete);
                            $("#imageContainer").append(imageDiv);
                            var input_extra = $("<input />");
                            input_extra.attr({
                                "type": "hidden",
                                "class": "input-compele-" + i,
                                "value": result.data[i].value,
                                "name": "{{ $field['name'] }}[]",
                            });
                            $("#value-image-extra").append(input_extra);
                        }
                    },
                });
            }
            // var files = event.target.files;
            // $.each(files, function(index, file) {
            //     var reader = new FileReader();
            //     reader.onload = function(e) {
            //         var imageDiv = $("<div>"); // Tạo một thẻ div mới
            //         imageDiv.addClass("priview"); // Thêm class cho thẻ div

            //         var imageElement = $("<img>"); // Tạo một x img mới
            //         imageElement.addClass("img-thumbnail");
            //         imageElement.attr("src", e.target.result);
            //         imageElement.css({
            //             width: "150px",
            //             height: "150px"
            //         });
            //         // Thêm thẻ img vào trong thẻ div
            //         imageDiv.append(imageElement);
            //         var buttonDelete = $("<div />");
            //         buttonDelete.addClass("delete_file_image");
            //         var labelDelete = $("<label>Delete Image</label>");
            //         labelDelete.attr("for", "delete_file_image");
            //         labelDelete.css({
            //             cursor: "pointer"
            //         });
            //         labelDelete.attr("id", "button-delete");
            //         buttonDelete.append(labelDelete)
            //         imageDiv.append(buttonDelete);

            //         // Thêm thẻ div vào container
            //         $("#imageContainer").append(imageDiv);

            //         var input_extra = $("<input />", {
            //             type: "",
            //             class: "input-compele-" + index,
            //             name: field_name + "[]",
            //             value: e.target.result,
            //         });
            //         $("#value-image-extra").append(input_extra);
            //     };
            //     reader.readAsDataURL(file);
            // });
        });


    });
</script>
<script>
    $(document).on('click', '.delete_file_image', function() {
        // Xoá phần tử cha chứa ảnh và nút xoá
        $(this).closest('.priview').remove();
        var inputId = $(this).attr("id");
        $('#value-image-extra input').filter(function() {
            return $(this).val() === inputId;
        }).remove();
    });
</script>
