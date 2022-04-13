@extends('layouts.dashboard')

@section('title')
    Transaction details
@endsection

@section('page-content-dashboard')
    <!-- Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
         <div class="heading">
            <h2 class="title">#STORE01799</h2>
            <p class="sub">Transaction details</p>
         </div>
         <div class="content" id="transactionDetails">                     
            <div class="row">
               <div class="col-12">
                  <div class="card mb-5">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-12 col-md-4">
                              <img src="{{ url('/project/images/product/product6.jpg') }}" class="w-100 mb-3 img-produk-transaction-detail" alt="">
                           </div>
                           <div class="col-12 col-md-8">
                              <div class="row">
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">Customer Name</div>                                  
                                       <div class="product-sub">Cahaya Ningsih</div>                                  
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">Product Name</div>                                  
                                       <div class="product-sub">Jam tangan alexandre christie</div>                                  
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">Date of Transaction</div>                                  
                                       <div class="product-sub">17 Mei, 2020</div>                                  
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">Payment Status</div>                                  
                                       <div class="product-sub color-pink">Pending</div>                                                                                  
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">Total Amount</div>                                  
                                       <div class="product-sub">$280,409</div>                                                                                  
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">Mobile</div>                                  
                                       <div class="product-sub">+6289 570 444 7596</div>                                                                                  
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <h5 class="title-detail-shipping">Shipping informations</h5>                                    
                           </div>
                           <div class="col-md-8">
                              <div class="row">
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">Address I</div>                                  
                                       <div class="product-sub">Dk. Mororejo 01/01</div>                                                  
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">Address II</div>                                  
                                       <div class="product-sub">Ds. Banjarsari</div>                                                  
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">Province</div>                                  
                                       <div class="product-sub">Central Java</div>                                                  
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">City</div>                                  
                                       <div class="product-sub">Demak</div>                                                  
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">Postal code</div>                                  
                                       <div class="product-sub">59563</div>                                                  
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="group-detail">
                                       <div class="product-title">Country</div>                                  
                                       <div class="product-sub">Indonesia</div>                                                  
                                    </div>
                                 </div>                                                                                    
                              </div>                                       
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-9">
                              <div class="row align-items-center">
                                 <div class="col-12 col-md-3">
                                    <div class="group-detail">
                                       <div class="product-title">Shipping status</div>                                  
                                       <select name="status" id="status" class="form-control custom-select product-sub" v-model="status" required>
                                          <option value="">~ Select status ~</option>                                          
                                          <option value="PENDING" selected>Pending</option>                                             
                                          <option value="SHIPPING">Shipping</option>                                             
                                          <option value="SUCCESS">Success</option>                                             
                                       </select>                                                
                                    </div>
                                 </div>
                                 <template v-if="status == 'SHIPPING'">                                            
                                    <div class="col-12 col-md-4">
                                       <div class="group-detail">
                                          <div class="product-title">Input resi</div>                                  
                                          <input type="text" name="resi" class="form-control product-sub" v-model="resi" readonly/>                                                
                                       </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                       <button type="submit" class="btn my-bt-pro-alt btn-block">Update resi</button>                                             
                                    </div>
                                 </template>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col">
                              <button type="submit" class="btn my-bt-pro mt-4 ml-auto px-5 d-none d-md-flex">Submite</button>
                              <button type="submit" class="btn my-bt-pro btn-block mt-4 d-block d-md-none mt-5">Submite</button>
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
   <script src="{{ url('/project/vendor/vue-2/vue.js') }}"></script>
   <script>
      const transactionDetails = new Vue({
         el: '#transactionDetails',
         data: {
            status: 'SHIPPING',
            resi: 'JNE20839149021029301231'
         }
      });
   </script>
@endpush