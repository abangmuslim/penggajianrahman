<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Receipt</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300;400&display=swap" rel="stylesheet">
    <style>
@page{
    margin:0;
    bpenggajian:0;
    size:80mm,100%;
   
}    
body{
    font-size: 9pt;
    font-family: 'Inconsolata', monospace;
    text-align: justify;
}
</style>
</head>
<body>

<p>invoice:{{ $dataPenggajian->invoice}}<br>Pegawai:{{ $dataPenggajian->pegawai->name}}<br>Cashier:{{ Auth::user()->name}}<br>Tanggal:{{$dataPenggajian->created_at->format('d M Y H:m')}}</p>
<table>
    <thead>
        <tr>
            <td>Gaji</td>
            <td>Jumlah</td>
            <td>Nominal</td>
            <td>Amount</td>
        </tr>
    </thead>
@foreach($dataDetilpenggajian as $dod)
<tr>
            <td>{{ $dod->gaji->name }}</td>
            <td>{{$dod->jumlah}}</td>
            <td>@money ($dod->nominal)</td>
            <td>@money ($dod->nominal*$dod->jumlah)</td>
        </tr>

@endforeach
<tr>
    <td colspan="3">Total:</td>
    <td>@money ($dataPenggajian->total)</td>
</tr>
</table>

<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function(){
        window.print();
        setInterval(myURL,5000);
    });
    function myURL() {
        document.location.href = "{{ route('gajian') }}";
        // clearInterval(interval);
    }
   
    </script>
</body>
</html>




