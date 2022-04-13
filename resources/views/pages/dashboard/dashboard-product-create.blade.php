@extends('layouts.dashboard')

@section('title')
    Add new product
@endsection
@section('page-content-dashboard')
    <!-- Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
         <div class="heading">
            <h2 class="title">Create New Product</h2>
            <p class="sub">Create your own product</p>
         </div>
         <div class="content">                     
            <div class="row mt-3">
               <div class="col-12 mt-2 mb-5">       
                  @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach   
                        </ul>
                     </div>
                  @endif     
                  <form action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                     <div class="card">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="name">Product name</label>
                                    <input type="text" name="name" id="name" class="form-control" autofocus required/>
                                 </div>
                              </div>                                          
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control" required/>
                                 </div>
                              </div>                                          
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="qty">Stock</label>
                                    <input type="number" name="qty" id="qty" class="form-control" required/>
                                 </div>
                              </div>                                          
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="categories_id">Category</label>
                                    <select name="categories_id" id="categories_id" class="form-control custom-select" required>
                                       <option value="">~ Select category ~</option>                                       
                                          @foreach ($categories as $category)
                                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                                          @endforeach
                                    </select>
                                 </div>
                              </div>  
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="desciption">Description</label>
                                    <textarea name="desciption" id="desciption" class="form-control"></textarea>
                                 </div> 
                              </div> 
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="photo">Thumbnail</label>
                                    <input type="file" name="photo" id="photo" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="form-control" required/>                                    
                                 </div>
                              </div>                                                                      
                           </div>
                           <div class="row">
                              <div class="col">
                                 <button type="submit" class="btn my-bt-pro mt-4 ml-auto px-5 d-none d-md-flex">Submite</button>
                                 <button type="submit" class="btn my-bt-pro btn-block mt-4 d-block d-md-none">Submite</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>                        
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script>
   ClassicEditor
      .create( document.querySelector('#desciption') )
      .then( editor => {
         console.log( editor );
      })
      .catch( error => {
          console.error( error );
      });
</script>
@endpush