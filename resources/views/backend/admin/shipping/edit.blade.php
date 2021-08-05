@extends('backend.layout.master')

@section('title', 'Edit Shipping')

@push('css')

<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Shipping</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <a href="{{ route('admin.shippings.index') }}"> Back </a>  </h6>
    </div>

    <div class="card-body">
    <form method="POST" action="{{ route('admin.shippings.update', $shipping->id) }}">
      @csrf
      @method('put')

      <div class="form-group">
        <label for="inputTitle" class="col-form-label">Type <span class="text-danger">*</span></label>
      <input id="inputTitle" type="text" name="type" placeholder="Enter type"  value="{{$shipping->type}}" class="form-control">
      @error('title')
      <span class="text-danger">{{$message}}</span>
      @enderror
      </div>
      <div class="form-group">
        <label for="price" class="col-form-label">Price <span class="text-danger">*</span></label>
      <input id="price" type="number" name="price" placeholder="Enter price"  value="{{$shipping->price}}" class="form-control">
      @error('price')
      <span class="text-danger">{{$message}}</span>
      @enderror
      </div>
      <div class="form-group">
        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
        <select name="status" class="form-control">
          <option value="active" {{(($shipping->status=='active') ? 'selected' : '')}}>Active</option>
          <option value="inactive" {{(($shipping->status=='inactive') ? 'selected' : '')}}>Inactive</option>
        </select>
        @error('status')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Update</button>

    </form>
</div>

</div>

@endsection

@push('js')
<!-- Page level plugins -->
<script src="/backend/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/backend/js/demo/datatables-demo.js"></script>
@endpush
