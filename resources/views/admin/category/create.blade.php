@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 265px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah kategori</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Kategori</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('cat.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namad">Nama Kategori</label>
                            <input type="text" class="form-control" id="namad" name="nama_cat" placeholder="Nama">
                        </div>

                        <div class="form-group">
                            <label for="namab">Deskripsi</label>
                            <textarea type="text" class="form-control" id="namab" name="deskripsi_cat"
                                placeholder="Deskripsi" required></textarea>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection
