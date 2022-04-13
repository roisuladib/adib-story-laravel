@extends('layouts.admin')

@section('title')
   Admin - Edit user
@endsection

@section('page-content-dashboard')
    <!-- Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
   <div class="container-fluid">
      <div class="heading">
         <h2 class="title">Edit User</h2>
         <p class="sub">List of user</p>
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
                     <form action="{{ route('users.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="name">Name</label>
                                 <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required autofocus />
                              </div>                 
                              <div class="form-group">
                                 <label for="email">Email address</label>
                                 <input type="email" name="email" id="email" class="form-control" value="{{ $item->email }}" />
                              </div>
                              <div class="form-group">
                                 <label for="password">Password</label>
                                 <input type="password" name="password" id="password" class="form-control" />
                              </div>
                              <div class="form-group">
                                 <label for="role">Role</label>
                                 <select name="role" id="role" class="form-control custom-select" value="{{ $item->role }}" required>                                    
                                    <option value="ADMIN" selected>~ Don't edit ~</option>
                                    <option value="ADMIN">Admin</option>
                                    <option value="USER">User</option>
                                 </select>
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