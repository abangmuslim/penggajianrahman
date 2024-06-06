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

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Gaji</h3>
        </div>
        <!-- /.card-header -->


        <div class=" card-body">
            <table>
                <tr>
                    <th>Nama Pegawai</th>
                    <td>:</td>
                    <td>{{ $data[0]->name }}</td>
                </tr>
                <tr>
                    <th>Golongan</th>
                    <td>:</td>
                    <td>{{ $data[0]->golongan }}</td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>:</td>
                    <td>{{ $data[0]->jabatan }}</td>
                </tr>
                <tr>
                    <th>Nominal</th>
                    <td>:</td>
                    <td>@money($data[0]->nominal)</td>
                </tr>
                
            </table>
        </div>
        <!-- /.card-body -->

    </div>
</div>
@endsection
