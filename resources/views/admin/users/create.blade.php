@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 265px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah admin</h1>
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
                    <h3 class="card-title">Form Tambah Admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namad">Nama depan</label>
                            <input type="text" class="form-control" id="namad" name="nama_depan" placeholder="Nama Depan">
                        </div>

                        <div class="form-group">
                            <label for="namab">Nama belakang</label>
                            <input type="text" class="form-control" id="namab" name="nama_belakang"
                                placeholder="Nama Belakang" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl" name="tgl_lahir"
                                placeholder="Tanggal Lahir" required>
                        </div>

                        <div class="form-group">
                            <label for="kelamin">Jenis Kelamin</label>
                            <select class="custom-select" name="kelamin" id="inputGroupSelect01" required>
                                <option selected>--pilih kelamin--</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required
                                placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="c_password">Password</label>
                            <input type="password" class="form-control" id="c_password" name="c_password" required
                                placeholder="Password Konfirmasi">
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
