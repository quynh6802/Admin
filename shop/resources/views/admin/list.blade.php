@extends('admin.layouts.default')
@section('main_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $module['label'] }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $module['label'] }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="head-lable">
                        <h3 class="card-title">{{ $module['label'] }}</h3>
                    </div>
                    <div class="card-tools">
                        <div class="float-left head-search">
                            <form class="form-inline" method="GET">
                                <input class="form-control" name="quick_search" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="float-left head-action">
                            <a href="/admin/{{ $module['code'] }}/add" class="btn btn-primary"><i
                                    class="fas fa-plus"></i>Create</a>
                        </div>
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button> --}}
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                @foreach ($module['list'] as $field)
                                    <th class="{{ $field['class'] }}">{{ $field['label'] }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listItem as $item)
                                @include('admin.partials.tr_item')
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                {{-- paginate --}}
                <div class="pagination justify-content-end card-footer">
                    {{ $listItem->onEachSide(1)->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        $(document).on('click', '.file_image_thumb', function() {
            // alert($(this).attr('src').split('timthumb.php?src=')[1]);
            if ($(this).attr('src').split('timthumb.php?src=')[1] == undefined) {
                $('#blank_modal .modal-body').html('<img src="' + $(this).attr('src') + '"/>');
            } else {
                $('#blank_modal .modal-body').html('<img src="' + $(this).attr('src').split('timthumb.php?src=')[1]
                    .split('&w=')[0].split('&h=')[0] + '"/>');
            }
            $('#blank_modal').modal();
        });
    </script>
@endsection
