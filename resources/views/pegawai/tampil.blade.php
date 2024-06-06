@extends('layouts.template')
@section('judulh1','Admin - Pegawai')

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

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Data Pegawai</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method=" POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="name">Nama Pegawai</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder=""
                        value="{{ $pegawai->name }}" disabled>
                </div>
                
                <div class="form-group">
                    <label for="hp">No Telepon</label>
                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $pegawai->hp }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class=" form-control" rows="4"
                        disabled>{{ $pegawai->alamat }}</textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">

            </div>
        </form>
    </div>
</div>
@endsection


