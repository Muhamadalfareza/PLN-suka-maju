@extends('template.index')

@section('main')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">List Tagihan - Meteran {{ $meteran->number_parameter }}</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Tagihan</h6>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Harga</th>
                  <th>Hours</th>
                  <th>Due Date</th>
                  <th>Paid Status</th>
                  <th>Paid At</th>
               </tr>
            </thead>
            <tbody>
               @foreach($tagihan as $index => $bill)
               <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $bill->harga }}</td>
                  <td>
                     @if ($bill->hours == 0)
                     <form method="post" action="{{ route('admin.bills.input.hours') }}">
                        @csrf
                        <input type="hidden" name="bill_id" value="{{ $bill->id }}">
                        <input type="hidden" name="meter_reading_id" value="{{ $meteran->id }}">
                        <input type="number" name="hours" value="0">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                     </form>
                     @else
                     {{ $bill->hours }}
                     @endif
                  </td>
                  <td>{{ $bill->due_date }}</td>
                  <td>
                     @if ($bill->paid_status)
                     Paid
                     @else
                     @if ($bill->due_date < now() && !$bill->paid_status)
                        Unpaid (Overdue)
                        @else
                        Unpaid
                        @endif
                        @endif
                  </td>
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
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection

@section('css')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection