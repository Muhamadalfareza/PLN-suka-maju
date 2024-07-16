@extends('template.index')

@section('main')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Riwayat Tagihan - Meteran {{ $meter->number_parameter }}</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tagihan</h6>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Jumlah</th>
                  <th>Tanggal Jatuh Tempo</th>
                  <th>Status Pembayaran</th>
                  <th>Tanggal Pembayaran</th>
               </tr>
            </thead>
            <tbody>
               @foreach($bills as $index => $bill)
               <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $bill->harga }}</td>
                  <td>{{ $bill->due_date }}</td>
                  <td>{{ $bill->paid_status ? 'Paid' : 'Unpaid' }}</td>
                  <td>{{ $bill->paid_at }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>

@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection

@section('css')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection