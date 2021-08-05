@extends('backend.layout.master')

@section('title', 'Edit Order')

@push('css')
<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit Product</h1>
   <div class="card">
  <h5 class="card-header">Order Edit</h5>
  <div class="card-body">
    <form action="{{ route('admin.orders.update', $order->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="status">Status :</label>
        <select name="status" id="" class="form-control">
          <option value="">--Select Status--</option>
          <option value="new" {{(($order->status=='new')? 'selected' : '')}}>New</option>
          <option value="proccess" {{(($order->status=='proccess')? 'selected' : '')}}>Proccess</option>
          <option value="delivered" {{(($order->status=='delivered')? 'selected' : '')}}>Delivered</option>
          <option value="cancel" {{(($order->status=='cancel')? 'selected' : '')}}>Cancel</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>

@endsection

@push('js')
<!-- Page level plugins -->
<script src="/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">

</script>

@endpush