@extends('backend.layout.master')

@section('title', 'Edit Review')

@push('css')
<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
    <h1 class="h3 mb-2 text-gray-800">Edit Review</h1>
<div class="card">
  <h5 class="card-header">Review Edit</h5>
  <div class="card-body">
    <form action="{{ route('admin.reviews.update',$review->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">Review By:</label>
        <input type="text" disabled class="form-control" value="{{ $review->user->name }}">
      </div>
      <div class="form-group">
        <label for="review">Review</label>
      <textarea name="review" id="" cols="20" rows="10" class="form-control">{{$review->review}}</textarea>
      </div>
      <div class="form-group">
        <label for="status">Status :</label>
        <select name="status" id="" class="form-control">
          <option value="">--Select Status--</option>
          <option value="active" {{(($review->status=='active')? 'selected' : '')}}>Active</option>
          <option value="inactive" {{(($review->status=='inactive')? 'selected' : '')}}>Inactive</option>
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