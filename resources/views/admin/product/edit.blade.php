@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 265px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Produk</h1>
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
                    <h3 class="card-title">Form Edit Produk</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('prod.update', $prod->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namad">Nama</label>
                            <input type="text" class="form-control" id="namad" name="nama_product" value="{{ $prod->nama_product }}">
                        </div>

                        <div class="form-group">
                            <label for="namab">Deskripsi</label>
                            <input type="text" class="form-control" id="namab" name="deskripsi_product"
                                value="{{ $prod->deskripsi_product }}">
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <img src="{{ asset($prod->img_product) }}" alt="not found" width="100px">
                            <input type="file" name="img_product" id="img" class="form-control" multiple accept="image/" value="{{ $prod->img_product }}">
                        </div>

                        <div class="form-group">
                            <label for="namab">Kategory</label>
                            <select class="custom-select" name="cat_product" id="cat" required>
                                <option selected value="{{ $prod->cat_product }}">{{ $prod->cat_product }}</option>
                                @foreach ($cats as $key => $cat)
                                <option value="{{ $cat->nama_cat }}">{{ $cat->nama_cat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="namab">Stock</label>
                            <input type="number" class="form-control" id="namab" name="stock_product"
                                value="{{ $prod->stock_product }}">
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
