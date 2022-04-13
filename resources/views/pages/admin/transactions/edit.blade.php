@extends('layouts.admin')

@section('title')
   Admin - Edit categories
@endsection

@section('page-content-dashboard')
    <!-- Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
   <div class="container-fluid">
      <div class="heading">
         <h2 class="title">Edit Categories</h2>
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
                     <form action="{{ route('categories.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="name">Category name</label>
                                 <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required autofocus />
                              </div>                 
                              <div class="form-group">
                                 <label for="icon">Icon</label>
                                 <input type="file" name="icon" id="icon" class="form-control"/>
                              </div>
                           </div>
                           <div class="col text-right">
                              <button type="submit" class="btn my-bt-pro mt-4">Save</button>
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