@extends('layouts.dashboard')

@section('title')
    Product details
@endsection

@section('page-content-dashboard')
    <!-- Content -->
    <div class="section-content section-dashboard-detail" data-aos="fade-up">
      <div class="container-fluid">
         <div class="heading">
            <h2 class="title">{{ $product->name }}</h2>
            <p class="sub">Product <strong>Details</strong></p>
         </div>
         <div class="content">                     
            <div class="row mt-3">
               <div class="col-12 mt-2">  
                  @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach   
                        </ul>
                     </div>
                  @endif          
                  <form action="{{ route('product-detail', $product->id) }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="users_id" value="{{ Auth::user()->id }}" />
                     <div class="card">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="name">Product name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" autofocus required/>
                                 </div>
                              </div>                                          
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required />
                                 </div>
                              </div>                                          
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="qty">Stock</label>
                                    <input type="number" name="qty" id="qty" class="form-control" value="{{ $product->qty }}" required />
                                 </div>
                              </div>                                          
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="categories_id">Category</label>
                                    <select name="categories_id" id="categories_id" class="form-control custom-select" required>
                                       <option value="{{ $product->categories_id }}">
                                          {{ $product->category->name }}
                                       </option>
                                       @foreach ($categories as $category)
                                          <option value="{{ $category->id }}">
                                             {{ $category->name }}
                                          </option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>  
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="desciption">Description</label>
                                    <textarea name="desciption" id="desciption" class="form-control">{!! $product->desciption !!}</textarea>                              
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
            <div class="row mt-4 mb-5">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           @foreach ($product->galleries as $gallery)
                              <div class="col-sm-6 col-md-3 mb-3">
                                 <div class="thumb-container">
                                    <img src="{{ Storage::url($gallery->photo) ?? '' }}" class="w-100" alt="Product" title="{{ $product->name }}">
                                    <a href="{{ route('product-delete', $gallery->id) }}" class="delete-thumb" title="Delete at {{ $product->name }}">
                                       <img src="{{ url('/project/images/icon-remove-img.svg') }}"  alt="remove">
                                    </a>
                                 </div>
                              </div>
                           @endforeach                          
                           <div class="inpo text-muted pt-2" style="font-size: 12px;">** Max 4 photos</div>                                 
                           <div class="col-md-12 mt-4">
                              <form action="{{ route('product-upload') }}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                 <input type="hidden" name="products_id" value="{{ $product->id}}">
                                 <input type="file" name="photo" id="photo" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="form-control d-none" onchange="form.submit()" multiple />
                                 <button type="button" class="btn my-bt-alt float-right d-none d-md-flex px-5 text-white" style="background: #a1a1a1;" onclick="fileUpload();">Add photo</button>
                                 <button type="button" class="btn my-bt-alt btn-block d-block d-md-none text-white" style="background: #a1a1a1;" onclick="fileUpload();">Add photo</button>
                              </form>
                           </div>                                    
                        </div>
                     </div>
                  </div>
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
   <script>
      function fileUpload() {
         document.querySelector('#photo').click();
      }
   </script>
@endpush