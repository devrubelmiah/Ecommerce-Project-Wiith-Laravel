@extends('backend.layout.master')

@section('title', 'Orders')

@push('css')
  
<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="/backend/sweet-alert/sweetalert2.min.css" rel="stylesheet">

@endpush

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Orders</h1>
<div class="col-md-12">
            @include('backend.partials.notifications')
  </div>
<!-- DataTales Example -->
<div class="card shadow mb-4">    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Order No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Quantity</th>
                        <th>Charge</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S.N.</th>
                        <th>Order No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Quantity</th>
                        <th>Charge</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                 @forelse($orders as $key => $order)
                    <tr>
                        <td>{{$key+=1}}</td>
                        <td> {{ Str::limit($order->order_number, 10) }} </td>
                        <td>{{$order->first_name}} {{$order->last_name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->quantity}}</td>
                          <td>
                          @if($order->shipping_id)
                          {{$order->shipping->price}}
                          @else
                          free shiping
                        @endif
                          </td>
                        <td>{{$order->total_amount}}</td>
                        <td>
                            @if($order->status=='new')
                          <span class="badge badge-primary">{{$order->status}}</span>
                            @elseif($order->status=='process')
                            <span class="badge badge-warning">{{$order->status}}</span>
                            @elseif($order->status=='delivered')
                            <span class="badge badge-success">{{$order->status}}</span>
                            @else
                            <span class="badge badge-danger">{{$order->status}}</span>
                            @endif
                        </td>

                        <td>
                          <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-eye"></i></a> || 
                        
                          <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a> || 

                          <button class="btn btn-danger btn-sm dltBtn" onclick="deleteId({{ $order->id }})"><i class="fas fa-trash-alt"></i></button>

                        <form action="{{ route('admin.orders.destroy',$order->id) }}" method="post" id="delete-form-{{$order->id}}" style="display:none">
                        @csrf
                        @method('delete')
                        </form>
                        </td>

                    </tr>
                 @empty
                    <h3 style="color:red">Not found order.</h3>
                @endforelse 
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('js')
<!-- Page level plugins -->
<script src="/backend/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/backend/js/demo/datatables-demo.js"></script>
<script src="/backend/sweet-alert/sweetalert2.all.min.js"></script>

<script>

function deleteId(id)
{
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
    document.getElementById('delete-form-'+id).submit()

  }
})

    }
</script>
@endpush