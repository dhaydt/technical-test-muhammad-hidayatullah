@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 265px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Manajemen</h1>
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
                    <a class="btn btn-success btn-sm mb-2" href="{{ route('cat.create') }}"><i class="fas fa-plus"></i> cat</a>
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
                            <th>Kategory</th>
                            <th>Deskripsi</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cats as $key => $cat)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $cat->nama_cat }} {{ $cat->nama_belakang }}</td>
                            <td>{{ $cat->deskripsi_cat }}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('cat.edit',$cat->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" href="{{ route('cat.destroy',$cat->id) }}"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $cats->render() !!}
            </div>

        </div>
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection
