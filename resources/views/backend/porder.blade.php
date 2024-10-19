@extends('backend.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Order List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($orders) > 0)
        <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Amount</th>
              <th>Address</th>
              <th>Status</th>
              <th>Transaction ID</th>
              <th>Currency</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S.N.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Amount</th>
              <th>Address</th>
              <th>Status</th>
              <th>Transaction ID</th>
              <th>Currency</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($orders as $order)   
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->phone}}</td>
                    <td>${{$order->amount}}</td>
                    <td>{{$order->address}}</td>
                    <td>
                     
                            <span class="badge badge-success">Success</span>
                       
                     
                    </td>
                    <td>{{$order->transaction_id}}</td>
                    <td>{{$order->currency}}</td>
                  
                </tr>  
            @endforeach
          </tbody>
        </table>
        @else
          <h6 class="text-center">No orders found!</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      .zoom {
        transition: transform .2s;
      }

      .zoom:hover {
        transform: scale(1.1);
      }
  </style>
@endpush

@push('scripts')
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <script>
      $('#order-dataTable').DataTable({
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[9]
                }
            ]
        });

        $('.dltBtn').click(function(e){
          var form=$(this).closest('form');
          e.preventDefault();
          swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this data!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {
                 form.submit();
              } else {
                  swal("Your data is safe!");
              }
          });
      });
  </script>
@endpush
