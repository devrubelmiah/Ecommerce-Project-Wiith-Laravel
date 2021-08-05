@extends('backend.layout.master')

@section('title', 'Reviews')

@push('css')
<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="/backend/sweet-alert/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Reviews</h1>
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
                    <th>Review By</th>
                    <th>Product Title</th>
                    <th>Review</th>
                    <th>Rate</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S.N.</th>
                        <th>Review By</th>
                        <th>Product Title</th>
                        <th>Review</th>
                        <th>Rate</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @forelse($reviews as $key => $review)               
                    <tr>
                        <td>{{$review->id}}</td>
                        <td> {{ $review->user->name }}</td>
                        <td> {{ $review->product->title }} </td>
                        <td>{{$review->review}}</td>

                    <td>
                     <ul style="list-style:none">
                          @for($i=1; $i<=5;$i++)
                          @if($review->rate >=$i)
                            <li style="float:left;color:#F7941D;"><i class="fa fa-star"></i></li>
                          @else 
                            <li style="float:left;color:#F7941D;"><i class="far fa-star"></i></li>
                          @endif
                        @endfor
                     </ul>
                    </td>
                    <td>{{$review->created_at->format('M d D, Y g: i a')}}</td>
                    <td>
                        @if($review->status=='active')
                          <span class="badge badge-success">{{$review->status}}</span>
                        @else
                          <span class="badge badge-warning">{{$review->status}}</span>
                        @endif
                    </td>
                        <td>
                          <a href="{{route('admin.reviews.edit',$review->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a> || 
                            <button class="btn btn-danger btn-sm dltBtn" onclick="deleteId({{ $review->id }})"><i class="fas fa-trash-alt"></i></button>

                        <form action="{{ route('admin.reviews.destroy',$review->id) }}" method="post" id="delete-form-{{$review->id}}" style="display:none">
                        @csrf
                        @method('delete')
                        </form>
                        </td>
                    </tr>
                 @empty
                    <p> Not found review </p>
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