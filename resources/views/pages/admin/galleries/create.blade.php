@extends('layouts.admin')

@section('title')
   Admin - Cretae new product gallery
@endsection

@section('page-content-dashboard')
    <!-- Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
   <div class="container-fluid">
      <div class="heading">
         <h2 class="title">Create product gallery</h2>
         <p class="sub">List of product gallery</p>
      </div>
      <div class="content">
         <div class="row">
            <div class="col-md-12">
               @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach   
                     </ul>
                  </div>
               @endif
               <div class="card">
                  <div class="card-body">
                     <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="products_id">Product name</label>
                                 <select name="products_id" class="form-control custom-select custom-input">
                                    <option value="">~ Select Product ~</option>
                                    @foreach ($products as $product)
                                       <option value="{{ $product->id }}">
                                          {{ $product->name }}
                                       </option>
                                    @endforeach
                                 </select>
                              </div>                 
                              <div class="form-group">
                                 <label for="photo">Photo</label>
                                 <input type="file" name="photo" id="photo" class="form-control" required />
                              </div>
                           </div>
                           <div class="col text-right d-none d-md-block">
                              <button type="submit" class="btn my-bt-pro mt-4">Save</button>
                           </div>
                           <div class="col d-sm-block d-md-none">
                              <button type="submit" class="btn my-bt-pro mt-4 btn-block">Save</button>
                           </div>
                        </div>     
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection