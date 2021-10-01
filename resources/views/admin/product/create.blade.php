@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 265px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah produk</h1>
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
                    <h3 class="card-title">Form Tambah Produk</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('prod.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namad">Nama Produk</label>
                            <input type="text" class="form-control" id="namad" name="nama_product" placeholder="Nama">
                        </div>

                        <div class="form-group">
                            <label for="namab">Deskripsi</label>
                            <textarea type="text" class="form-control" id="namab" name="deskripsi_product"
                                placeholder="Deskripsi" required></textarea>
                        </div>

                        <div class="form-group">
                            <strong>Pilih Foto</strong>
                            <input type="file" name="img_product[]" id="img" class="form-control" multiple
                                accept="image/">
                        </div>

                        <div class="form-group">
                            <label for="cat">Kategori</label>
                            <select class="custom-select" name="cat_product" id="cat" required>
                                <option selected>--pilih Kategori--</option>
                                @foreach ($cats as $key => $cat)
                                <option value="{{ $cat->nama_cat }}">{{ $cat->nama_cat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock produk</label>
                            <input type="number" class="form-control" id="stock" name="stock_product"
                                placeholder="Stock" required>

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
