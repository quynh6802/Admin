@extends('admin.layouts.default')
@section('main_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Project Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project Add</li>
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
                                <label for="inputCategory">Category</label>
                                <div class="col-xs-12">
                                    <select name="" class="form-control custom-select" id="inputCategory">
                                        <option selected disabled value="1">a</option>
                                        <option value="2">b</option>
                                        <option value="3">c</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-div form-group col-md-4">
                                <label for="inputQuantity">Quantity</label>
                                <div class="col-xs-12">
                                    <input type="number" id="inputQuantity" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="form-group-div form-group col-md-4">
                                <label for="inputPromotion">Promotion(%)</label>
                                <div class="col-xs-12">
                                    <input type="number" min="0" max="100" value="0" id="inputPromotion"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group-div form-group col-md-6">
                                <label for="inputImportPrice">Import Price</label>
                                <div class="col-sx-12">
                                    <input type="number" id="inputImportPrice" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="form-group-div form-group col-md-6">
                                <label for="inputPrice">Price</label>
                                <div class="col-sx-12">
                                    <input type="number" id="inputPrice" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="form-group-div form-group col-md-3">
                                <label for="inputSize">Size</label>
                                <div class="col-sx-12">
                                    <select name="" id="inputSize" class="form-control custom-select">
                                        <option disabled selected value="">x</option>
                                        <option value="">s</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-div form-group col-md-3">
                                <label for="inputColor">Color</label>
                                <div class="col-sx-12">
                                    <select name="" id="inputColor" class="form-control custom-select">
                                        <option disabled selected value="">red</option>
                                        <option value="">blue</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-div form-group">
                                <label for="inputDescription">Description</label>
                                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                                <script>
                                    CKEDITOR.replace('inputDescription');
                                </script>
                            </div>
                            <div class="form-group-div form-group">
                                <label for="inputDetailDescription">Detail Description</label>
                                <textarea id="inputDetailDescription" class="form-control" rows="4"></textarea>
                                <script>
                                    CKEDITOR.replace('inputDetailDescription');
                                </script>
                            </div>
                            <div class="form-group-div form-group">
                                <label for="inputClientCompany">Client Company</label>
                                <input type="text" id="inputClientCompany" class="form-control">
                            </div>
                            <div class="form-group-div form-group">
                                <label for="inputProjectLeader">Project Leader</label>
                                <input type="text" id="inputProjectLeader" class="form-control">
                            </div>
                            <div class="form-group-div form-group col-md-2">
                                <label for="inputStatus">Status</label>
                                <div class="col-xs-12">
                                    <label for="">Active
                                        <input type="checkbox">
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
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
                            <div class="form-group-div form-group">
                                <label for='image-extra'>More image</label>
                                <div class="col-sx-12">
                                    <div class="dropzone">
                                        <div class="dropzone-msg">
                                            <h3 class="dropzone-msg-title">Click upload</h3>
                                            <p>upload up to 6 files</p>
                                        </div>
                                    </div>
                                    <style>
                                        .dropzone {
                                            border: 1.5px dashed #bababa;
                                        }

                                        .dropzone-msg {
                                            padding: 10px;
                                        }

                                        .dropzone-msg-title {

                                            font-size: 20px;
                                            font-weight: 300;
                                        }
                                    </style>
                                </div>
                            </div>
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
