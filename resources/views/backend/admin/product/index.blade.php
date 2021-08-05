@extends('backend.layout.master')

@section('title', 'Admin Dashboard')

@push('css')
  
<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="/backend/sweet-alert/sweetalert2.min.css" rel="stylesheet">

@endpush

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Products</h1>
<div class="col-md-12">
            @include('backend.partials.notifications')
  </div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <a href="{{ route('admin.products.create') }}"> Create a new product </a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Is Featured</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Condition</th>
                        <th>Brand</th>
                        <th>Stock</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Is Featured</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Condition</th>
                        <th>Brand</th>
                        <th>Stock</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                 @forelse($products as $key => $product)
                    <tr>
                        <td>{{$key+=1}}</td>
                        <td> {{ Str::limit($product->title, 10) }} </td>
                        <td>{{$product->category->title}}</td>
                        <td>{{$product->is_featured== 1 ? 'Yes' : 'No'}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount}}</td>
                        <td>{{$product->condition}}</td>
                        <td>{{$product->brand->title}}</td>
                        <td>{{$product->stock}}</td>
                        <td><img src="/images/products/features/{{ $product->photo }}" width="75" height="65" class="img img-responsive">                         
                        </td>
                        <td>
                            @if($product->status == 'active')
                            <span class="badge badge-success">{{$product->status}}</span>
                            @else
                            <span class="badge badge-warning">{{$product->status}}</span>
                            @endif
                        </td>

                        <td>
                          <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a> || 

                          <button class="btn btn-danger btn-sm dltBtn" onclick="deleteId({{ $product->id }})"><i class="fas fa-trash-alt"></i></button>

                        <form action="{{ route('admin.products.destroy',$product->id) }}" method="post" id="delete-form-{{$product->id}}" style="display:none">
                        @csrf
                        @method('delete')
                        </form>
                        </td>

                    </tr>
                 @empty
                    <h3 style="color:red">Not found product.</h3>
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