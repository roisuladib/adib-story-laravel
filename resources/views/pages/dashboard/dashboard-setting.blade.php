@extends('layouts.dashboard')

@section('title')
    Seetings
@endsection
@section('page-content-dashboard')
      <!-- Content -->
      <div class="section-content section-dashboard-home" data-aos="fade-up">
         <div class="container-fluid">
            <div class="heading">
               <h2 class="title">Settings</h2>
               <p class="sub">Make store that profitable</p>
            </div>
            <div class="content">                     
               <div class="row mt-3">
                  <div class="col-12 mt-2">            
                     <form action="{{ route('account-redirect', 'setting') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="store_name">Store Name</label>
                                       <input type="text" name="store_name" id="store_name" class="form-control" value="{{ $user->store_name }}" autofocus required />
                                    </div>
                                 </div>                                          
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="categories_id">Category</label>
                                       <select name="categories_id" id="categories_id" class="form-control custom-select">
                                          <option value="{{ $user->categories_id }}" selected>
                                             Tk Nak Ganti
                                          </option>
                                          @foreach ($categories as $category)
                                             <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                             </option>
                                          @endforeach
                                       </select>    
                                       </select>
                                    </div>
                                 </div>  
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="bukatoko">Store</label>
                                       <p class="text-muted">Do you also want to open a shop?</p>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" name="store_status" id="openStoreTrue" class="custom-control-input" value="1" {{ $user->store_status == 1 ? 'checked' : '' }} required/>
                                          <label for="openStoreTrue" class="custom-control-label">Open</label>
                                       </div>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" name="store_status" id="openStoreFalse" class="custom-control-input" value="0" {{ $user->store_status == 0 || $user->store_status == NULL ? 'checked' : '' }} required/>
                                          <label for="openStoreFalse" class="custom-control-label">Close</label>                           
                                       </div>                        
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