@extends('backend.layout.master')

@section('title', 'Review')

@push('css')
    
<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="/backend/css/dropify.css" rel="stylesheet">

</style>
@endpush

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Review detail</h1>
              
@endsection

@push('js')
<!-- Page level plugins -->
<script src="/backend/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
</script>
@endpush