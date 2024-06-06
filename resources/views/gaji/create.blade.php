@extends('layouts.template')
@section('judulh1','Admin - Gaji')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Gaji</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('gaji.store') }}" method="POST">
            @csrf

                <div class="form-group">
                    <label for="name">Nama Pegawai</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="golongan">Golongan</label>
                    <input type="string" class="form-control" id="golongan" name="golongan">
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="string" class="form-control" id="jabatan" name="jabatan">
                </div>

                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="number" class="form-control" id="nominal" name="nominal">
                </div>
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
