@extends('layouts.admin')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection
@section('content')
  
  <!-- Content Header (Page header) -->
  
  <div class="content-header">
  
    <div class="container-fluid">
  
      <div class="row mb-2">
  
        <div class="col-sm-6">
  
          <h1 class="m-0 text-dark">Data Ikan</h1>
  
        </div><!-- /.col -->
  
        <div class="col-sm-6">
  
          <ol class="breadcrumb float-sm-right">
  
            <li class="breadcrumb-item"><a href="#">Home</a></li>
  
            <li class="breadcrumb-item active">Data Ikan</li>
  
          </ol>
  
        </div><!-- /.col -->
  
      </div><!-- /.row -->
  
    </div><!-- /.container-fluid -->
  
  </div>
  
  <!-- /.content-header -->
  @if(session('success'))

  <div class="alert alert-success">

      {{session('success')}}

  </div>
  
  @endif

  <div class="card">
 
    <div class="card-body">
 
      <table id="table-datatables" class="table table-bordered table-striped" >
 
        <thead>
 
          <tr>
 
            <th>No.</th>
 
            <th>Jenis Ikan</th>

            <th>Ukuran</th>

            <th>Kwalitas</th>

            <th>Qty Awal</th>

            <th>Qty Sekarang</th>

            <th>Harga</th>

            <th>Tanggal Masuk</th>

            <th>Wilayah</th>
 
          </tr>
 
        </thead>
 
        @php
        
        $no = 0;
        
        @endphp
        
        <tbody>
        
          @foreach ($ikan as $data)
        
          <tr>
        
            <td>{{ ++$no }}</td>
            
            <td>{{ $data->jenis_ikan }}</td>

            <td>{{ $data->ukuran }}</td>

            <td>{{ $data->kualitas }}</td>

            <td>{{ $data->qty_awal }} Kg</td>

            <td>{{ $data->qty }} Kg</td>

            <td>Rp. {{ number_format($data->harga) }}</td>

            <td>{{ \Carbon\Carbon::parse($data->tgl_masuk)->format('d/m/Y') }}</td>

            <td>{{ $data->wilayah_penangkapan }}</td>
        
          </tr>

          @endforeach

        </tbody>

      </table>

    </div>

    <!-- /.card-body -->

  </div>

  @endsection

  @section('script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

  <script type="text/javascript"> 
    $(document).ready(function () {
        $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {extend: 'pdf', title:'Data Ikan'},
                    {extend: 'excel', title: 'Data Ikan'},
            ]
        });
    });
</script>

  @endsection
