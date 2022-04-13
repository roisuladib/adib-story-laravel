@extends('layouts.admin')

@section('title')
   Admin - Cretae new categories
@endsection

@section('page-content-dashboard')
    <!-- Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
   <div class="container-fluid">
      <div class="heading">
         <h2 class="title">Create Categories</h2>
         <p class="sub">List of categories</p>
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
                     <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="name">Category name</label>
                                 <input type="text" name="name" id="name" class="form-control" required autofocus />
                              </div>                 
                              <div class="form-group">
                                 <label for="icon">Icon</label>
                                 <input type="file" name="icon" id="icon" class="form-control" required />
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