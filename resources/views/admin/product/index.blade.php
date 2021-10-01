@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 265px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Produk Manajemen</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="pull-right">
                    <a class="btn btn-success btn-sm mb-2" href="{{ route('prod.create') }}"><i class="fas fa-plus"></i> prod</a>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success d-block w-100">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Kategori</th>
                            <th>Stock</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prods as $key => $prod)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $prod->nama_product }}</td>
                            <td>{{ $prod->deskripsi_product }}</td>
                            <td>
                                <img src="{{ asset($prod->img_product) }}" alt="not found" class="img-circle" width="100px">
                            </td>
                            <td>{{ $prod->cat_product }}</td>
                            <td>{{ $prod->stock_product }}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('prod.edit',$prod->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" href="{{ route('prod.destroy',$prod->id) }}"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $prods->render() !!}
            </div>

        </div>
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection
