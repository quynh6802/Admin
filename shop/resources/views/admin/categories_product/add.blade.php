@extends('admin.layouts.default')
@section('main_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group-div form-group">
                                <label for="inputName">Name</label>
                                <div class="col-sx-12">
                                    <input type="text" id="inputName" class="form-control">
                                </div>
                            </div>
                            <div class="form-group-div form-group col-md-4">
                                <label for="inputCategory">Parent Category</label>
                                <div class="col-xs-12">
                                    <select name="" class="form-control custom-select" id="inputCategory">
                                        <option selected disabled value="1">a</option>
                                        <option value="2">b</option>
                                        <option value="3">c</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-div form-group col-md-2">
                                <label for="inputStatus">Status</label>
                                <div class="col-xs-12">
                                    <label for="" class="kt-checkbox">Active
                                        <input type="checkbox" class="">
                                    </label>
                                </div>
                            </div>
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group-div form-group">
                                <label for="inputAvatar">Avatar</label>
                                <div class="col-sx-12">
                                    <div class="kt-avatar">
                                        <div class="kt-avatar-holder">
                                            <img src="dist/img/avatar.png" id="avatar"
                                                class="img-thumbnail file-image-thumb" alt="...">
                                        </div>
                                        <label id="" for="inputAvatarUpload" class="kt-avatar_upload">
                                            <i class="fas fa-pen"></i>
                                            <input type="file" hidden id="inputAvatarUpload">
                                        </label>
                                        <label class="kt-avatar_delete" id="deleteAvatar">
                                            <i class="fas fa-times"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group-div form-group">
                                <label for='image-extra'>More image</label>
                                <div class="col-sx-12">
                                    <div class="dropzone">
                                        <div class="dropzone-msg">
                                            <h3 class="dropzone-msg-title">Click upload</h3>
                                            <p>upload up to 6 files</p>
                                        </div>
                                        <div id="imageContainer"></div>
                                    </div>
                                    <input type="file" hidden name="" multiple id="image-extra-file">
                                    <div id="value-image-extra"></div>
                                </div>
                            </div> --}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create new Project" class="btn btn-success float-right">
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
