@extends('backend.layout.master')

@section('title', 'Edit Coupon')

@push('css')

<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Coupon</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <a href="{{ route('admin.coupons.index') }}"> Back </a>  </h6>
    </div>

    <div class="card-body">
    <form method="POST" action="{{ route('admin.coupons.update', $coupon->id) }}">
      @csrf
      @method('put')

      <div class="form-group">
        <label for="inputTitle" class="col-form-label">Coupon Code <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="code" placeholder="Enter Coupon Code"  value="{{$coupon->code}}" class="form-control">
        @error('code')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="type" class="col-form-label">Type <span class="text-danger">*</span></label>
            <select name="type" class="form-control">
                <option value="fixed" {{(($coupon->type=='fixed') ? 'selected' : '')}}>Fixed</option>
                <option value="percent" {{(($coupon->type=='percent') ? 'selected' : '')}}>Percent</option>
            </select>
            @error('type')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Value <span class="text-danger">*</span></label>
            <input id="inputTitle" type="number" name="value" placeholder="Enter Coupon value"  value="{{$coupon->value}}" class="form-control">
            @error('value')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

      <div class="form-group">
        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
        <select name="status" class="form-control">
          <option value="active" {{(($coupon->status=='active') ? 'selected' : '')}}>Active</option>
          <option value="inactive" {{(($coupon->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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
