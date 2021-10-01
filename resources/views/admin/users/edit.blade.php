@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 265px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit admin</h1>
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
                    <h3 class="card-title">Form Edit Admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namad">Nama depan</label>
                            <input type="text" class="form-control" id="namad" name="nama_depan" value="{{ $user->nama_depan }}">
                        </div>

                        <div class="form-group">
                            <label for="namab">Nama belakang</label>
                            <input type="text" class="form-control" id="namab" name="nama_belakang"
                                value="{{ $user->nama_belakang }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl" name="tgl_lahir"
                                value="{{ $user->tgl_lahir }}">
                        </div><div class="form-group">
                            <label for="kelamin">Jenis Kelamin</label>
                            <select class="custom-select" name="kelamin" id="inputGroupSelect01">
                                <option value="{{ $user->kelamin }}">{{ $user->kelamin }}</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
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
