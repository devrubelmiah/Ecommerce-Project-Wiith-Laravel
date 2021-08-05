@extends('backend.layout.master')

@section('title', 'Comments')

@push('css')

<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="/backend/sweet-alert/sweetalert2.min.css" rel="stylesheet">

@endpush

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Comments</h1>
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
                        <th>Author</th>
                        <th>Post Title</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S.N.</th>
                        <th>Author</th>
                        <th>Post Title</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @forelse($comments as $key => $comment)
                    <tr>
                        <td>{{$key+=1}}</td>
                        <td> {{$comment->user['name']}} </td>
                        <td> {{$comment->post['title']}}</td>
                        <td> {{$comment->comment}} </td>
                        <td> {{$comment->created_at->format('d-m-y')}} </td>
                        <td>
                            @if($comment->status == 'active')
                            <span class="badge badge-success">{{$comment->status}}</span>
                            @else
                            <span class="badge badge-warning">{{$comment->status}}</span>
                            @endif
                        </td>
                        <td>
                          <a href="{{route('admin.comments.edit',$comment->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a> ||
                            <button class="btn btn-danger btn-sm dltBtn" onclick="deleteId({{ $comment->id }})"><i class="fas fa-trash-alt"></i></button>

                        <form action="{{ route('admin.comments.destroy',$comment->id) }}" method="post" id="delete-form-{{$comment->id}}" style="display:none">
                        @csrf
                        @method('delete')
                        </form>
                        </td>
                    </tr>
                 @empty
                    <p> Shipping is not found </p>
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
