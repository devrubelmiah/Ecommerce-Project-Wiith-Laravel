@extends('backend.layout.master')

@section('title', 'Edit Tag')

@push('css')

<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Tag</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <a href="{{ route('admin.post-tags.index') }}"> Back </a>  </h6>
    </div>

    <div class="card-body">
    <form method="POST" action="{{route('admin.post-tags.update', $postTag->id)}}">
      @csrf
      @method('put')

      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter tag" id="title" name="title" value="{{ $postTag->title }}" >
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-group @error('email') is-invalid @enderror" name="status">
          <option value="active" {{ $postTag->status == 'active' ? 'selected' : '' }}> Active </option>
          <option value="inactive" {{ $postTag->status == 'inactive' ? 'selected' : '' }}> Inactive </option>
        </select>
        @error('status')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <button type="reset" class="btn btn-warning">Reset</button>
      <button type="submit" class="btn btn-primary">Update Tag</button>

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
