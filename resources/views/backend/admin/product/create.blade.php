@extends('backend.layout.master')

@section('title', 'Create Product')

@push('css')
<!-- Custom styles for this page -->
<link href="/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="/backend/css/dropify.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="/backend/js/image-uploader.css">

<style>
  .dropify-wrapper .dropify-message span.file-icon {
    font-size: 20px;
    line-height: 25px;
}
</style>
@endpush

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Add Product</h1>

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
          @csrf
        <div class="row">
              <div class="col-lg-8">
                  <!-- Circle Buttons -->
                  <div class="card shadow mb-4">
                      <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Create Product</h6>
                      </div>

                        <div class="card-body">
                              <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" id="title" name="title" value="{{old('title')}}">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>

                            <div class="form-group">
                              <label for="summary" class="col-form-label">Summary <span class="text-danger">*</span></label>
                              <textarea class="form-control" id="full-featured-non-summary" name="summary">{{old('summary')}}</textarea>
                              @error('summary')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>

                          <div class="form-group">
                            <label for="description">Description:</label>
                              <textarea name="description" rows="5" cols="5" class="form-control @error('description') is-invalid @enderror" id="full-featured-non-premium"></textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="price" class="col-form-label">Price(NRS) <span class="text-danger">*</span></label>
                            <input id="price" type="number" name="price" placeholder="Enter price"  value="{{old('price')}}" class="form-control">
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="discount" class="col-form-label">Discount(%)</label>
                            <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount"  value="{{old('discount')}}" class="form-control">
                            @error('discount')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="size">Size</label>
                            <select name="size[]" class="form-control selectpicker"  multiple data-live-search="true">
                                <option value="">--Select any size--</option>
                                <option value="S">Small (S)</option>
                                <option value="M">Medium (M)</option>
                                <option value="L">Large (L)</option>
                                <option value="XL">Extra Large (XL)</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="condition">Condition</label>
                            <select name="condition" class="form-control">
                                <option value="">--Select Condition--</option>
                                <option value="default">Default</option>
                                <option value="new">New</option>
                                <option value="hot">Hot</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="stock">Quantity <span class="text-danger">*</span></label>
                            <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"  value="{{old('stock')}}" class="form-control">
                            @error('stock')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>

                        </div>
                  </div>
                </div>

              <div class="col-lg-4">
                  <div class="card shadow mb-4">
                      <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Select Below Options</h6>
                      </div>

                      <div class="card-body">

                        <div class="form-group">
                          <label for="is_featured">Is Featured</label><br>
                          <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Yes
                        </div>

                              {{-- {{$categories}} --}}

                        <div class="form-group">
                          <label for="cat_id">Category <span class="text-danger">*</span></label>
                          <select name="cat_id" id="cat_id" class="form-control">
                              <option value="">--Select any category--</option>
                              @foreach($categories as $key=>$cat_data)
                                  <option value='{{$cat_data->id}}'>{{$cat_data->title}}</option>
                              @endforeach
                          </select>
                        </div>

                        <div class="form-group d-none" id="child_cat_div">
                          <label for="child_cat_id">Sub Category</label>
                          <select name="child_cat_id" id="child_cat_id" class="form-control">
                              <option value="">--Select any category--</option>
                              {{-- @foreach($parent_cats as $key=>$parent_cat)
                                  <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
                              @endforeach --}}
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="brand_id">Brand <span class="text-danger">*</span> </label>
                          {{-- {{$brands}} --}}
                          <select name="brand_id" class="form-control">
                              <option value="">--Select Brand--</option>
                             @foreach($brands as $brand)
                              <option value="{{$brand->id}}">{{$brand->title}}</option>
                             @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="status">Status:</label>
                          <select class="form-group @error('email') is-invalid @enderror" name="status">
                            <option value="active"> Active </option>
                            <option value="inactive"> Inactive </option>
                          </select>
                          @error('status')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label for="photo">Upload Feature Image:</label>
                          <input type="file" class="form-control dropify @error('photo') is-invalid @enderror" id="photo" name="photo" value="{{old('photo')}}" data-default-file="" data-height="150">
                          @error('photo')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                      <div class="form-group">
                            <label for="photo">Upload Multi Images:</label>
                            <div class="input-field">
                              <div class="input-images-1" style="padding-top: .5rem;"></div>
                          </div>
                            @error('photo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                      </div>

                    <hr/>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                      </div>
                </div>
             </div>
          </div>
    </form>

@endsection

@push('js')
<!-- Page level plugins -->
<script src="/backend/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="/backend/js/image-uploader.js"></script>

<!-- Page level custom scripts -->
<script src="/backend/js/demo/datatables-demo.js"></script>
<script src="/backend/js/tinymce.min.js"></script>
<script src="/backend/js/dropify.min.js"></script>

<script type="text/javascript">
tinymce.init({
  selector: 'textarea#full-featured-non-premium, textarea#full-featured-non-summary',
  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 300,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: 'mceNonEditable',
  toolbar_mode: 'sliding',
  contextmenu: 'link image imagetools table',

  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
 });


 //Dropify Image upload
 $('.dropify').dropify();

 $('.input-images-1').imageUploader();

</script>

@endpush
