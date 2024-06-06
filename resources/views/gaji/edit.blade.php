@extends('layouts.template')
@section('judulh1','Admin - Product')

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

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Product</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('gaji.update',$gaji->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$gaji->name}}">
                </div>
                <div class="form-group">
                    <label for="golongan">Golongan</label>
                    <input type="string" class="form-control" id="golongan" name="golongan" value="{{$gaji->golongan}}">
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="string" class="form-control" id="jabatan" name="jabatan" value="{{$gaji->jabatan}}">
                </div>

                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="number" class="form-control" id="nominal" name="nominal" value="{{$gaji->nominal}}">
                </div>
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Ubah</button>
            </div>
        </form>
    </div>


</div>


@endsection
