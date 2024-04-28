@extends('admin.layouts.default')
@section('main_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $page_title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $page_title }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($module['form']['general_tab'] as $field)
                                    <div class="form-group-div form-group {{ $field['group_class'] }}"
                                        id="form-group-{{ $field['name'] }}">
                                        @php $field['value'] = @$result->{$field['name']}; @endphp
                                        @if ($field['type'] == 'custom')
                                            @include($field['field'])
                                        @else
                                            <label for="{{ $field['name'] }}"
                                                class="{{ $field['class'] }}">{{ $field['label'] }}
                                            </label>
                                            <div class="col-sx-12">
                                                @include('admin.form.fields.' . $field['type'])
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-4">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Image</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($module['form']['image_tab'] as $field)
                                    @php
                                        $field['value'] = @$result->{$field['name']};
                                    @endphp

                                    <div class="form-group-div form-group {{ $field['group_class'] }}">
                                        <label for="{{ $field['name'] }}"
                                            class="{{ $field['class'] }}">{{ $field['label'] }}</label>
                                        <div class="col-xs-12">
                                            @include('admin.form.fields.' . $field['type'])
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" name="submit" value="Update category product"
                            class="btn btn-success float-right">
                    </div>
                </div>
                @csrf
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
