@extends('layouts.admin')

@section('title')
   Admin - Create new product
@endsection

@section('page-content-dashboard')
    <!-- Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
   <div class="container-fluid">
      <div class="heading">
         <h2 class="title">Create Product</h2>
         <p class="sub">List of Product</p>
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
                     <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="name">Nama product</label>
                                 <input type="text" name="name" id="name" class="form-control" required autofocus />
                              </div>                                               
                              <div class="form-group">
                                 <label for="users_id">Seller</label>
                                 <select name="users_id" class="form-control custom-select custom-input">
                                    <option value="">~ Select seller ~</option>
                                    @foreach ($users as $user)
                                       <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                 </select>
                              </div>                                               
                              <div class="form-group">
                                 <label for="users_id">Category</label>
                                 <select name="categories_id" class="form-control custom-select custom-input">
                                    <option value="">~ Select category ~</option>
                                    @foreach ($categories as $category)
                                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                 </select>
                              </div>                                               
                              <div class="form-group">
                                 <label for="qty">Quantity</label>
                                 <input type="number" name="qty" id="qty" class="form-control" required />
                              </div>                                                                                                                        
                              <div class="form-group">
                                 <label for="price">Price</label>
                                 <input type="number" name="price" id="price" class="form-control" type-currency="IDR" placeholder="Rp" required />
                              </div>                                                                                                                        
                              <div class="form-group">
                                 <label for="desciption">Description</label>
                                 <textarea name="desciption" id="desciption" class="form-control"></textarea>
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
@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script>
   ClassicEditor
      .create( document.querySelector('#desciption') )
      .then( editor => {
               console.log( editor );
      } )
      .catch( error => {
               console.error( error );
      } );
</script>
<script>
//    document.querySelectorAll('input[type-currency="IDR"]')
//    .forEach((element) => {
//       element.addEventListener('keyup', function(e) {
//       let cursorPostion = this.selectionStart;
//          let value = parseInt(this.value.replace(/[^,\d]/g, ''));
//          let originalLenght = this.value.length;
//          if (isNaN(value)) {
//             this.value = "";
//          } else {    
//             this.value = value.toLocaleString('id-ID', {
//             currency: 'IDR',
//             style: 'currency',
//             minimumFractionDigits: 0
//             });
//             cursorPostion = this.value.length - originalLenght + cursorPostion;
//             this.setSelectionRange(cursorPostion, cursorPostion);
//          }
//       });
//    });
// </script>
@endpush