@extends('template.index')

@section('main')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Daftar Tagihan Anda</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tagihan</h6>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Hours</th>
                  <th>harga</th>
                  <th>Due Date</th>
                  <th>Status</th>
                  <th>Paid At</th>
                  <th>Number Parameter</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($bills as $index => $bill)
               <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $bill->hours }}</td>
                  <td>{{ $bill->harga }}</td>
                  <td>{{ $bill->due_date }}</td>
                  <td>{{ $bill->paid_status ? 'Paid' : 'Unpaid' }}</td>
                  <td>{{ $bill->paid_at }}</td>
                  <td>{{ $bill->meterReading->number_parameter }}</td>
                  <td>
                     @if (!$bill->paid_status && $bill->hours > 0)
                     <a href="{{ route('customer.bills.pay', $bill->id) }}" class="btn btn-primary btn-sm">Pay</a>
                     @else
                     -
                     @endif
                  </td>
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