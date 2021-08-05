@extends('backend.layout.master')

@section('title', 'Edit Shipping')

@push('css')
<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endpush

@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit Comment</h1>

<div class="card">
  <div class="card-body">
    <form action="{{route('admin.comments.update',$comment->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">By:</label>
        <input type="text" disabled class="form-control" value="{{$comment->user->name}}">
      </div>
      <div class="form-group">
        <label for="comment">comment</label>
      <textarea name="comment" id="" cols="20" rows="10" class="form-control">{{$comment->comment}}</textarea>
      </div>
      <div class="form-group">
        <label for="status">Status :</label>
        <select name="status" id="" class="form-control">
          <option value="">--Select Status--</option>
          <option value="active" {{(($comment->status=='active')? 'selected' : '')}}>Active</option>
          <option value="inactive" {{(($comment->status=='inactive')? 'selected' : '')}}>Inactive</option>
        </select>
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
