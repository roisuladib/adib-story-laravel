@extends('layouts.app')

@section('title')
   My-carts
@endsection
@section('page-content')
<!-- Content -->
<div class="section-content page-cart">
   <section class="store-breadcrumb" data-aos="fade-up" data-aos-delay="100">
      <div class="container">
         <div class="row">
            <div class="col">
               <div class="my-breadcrumb">
                  <a href="index.html" class="">Home</a>               
                  <span class="mx-4">/</span>
                  <a href="#" class="active">Cart</a>
               </div>                     
            </div>                  
         </div>
      </div>
   </section>

   <section class="store-cart">
      <div class="container">
         <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-sm-12">
               <div class="table-responsive">
                  <table class="table table-hover table-striped table-cart">
                     <thead>
                        <tr>
                           <td>No</td>
                           <td>Image</td>
                           <td>Description</td>
                           <td>Price</td>
                           <td>Amount</td>
                           <td>Delete</td>
                        </tr>
                     </thead>
                     <tbody>
                        @php
                           $total_price = 0
                        @endphp
                        @foreach ($carts as $cart)
                           <tr>
                              <td align="center" style="width: 8px;">1</td>
                              <td style="width: 20%;">
                                 @if ($cart->product->galleries)
                                    <img src="{{ Storage::url($cart->product->galleries->first()->photo) }}"  class="b-20 image" alt="Product one">
                                 @endif
                              </td>
                              <td style="width: unset;">
                                 <div class="title">{{ $cart->product->name }}</div>
                                 <div class="sub">{{ $cart->product->user->store_name }}</div>
                              </td>
                              <td>
                                 <div class="title">Rp. {{ number_format($cart->product->price) }}</div>                              
                              </td>   
                              <td>
                                 <div class="title">1X</div>
                              </td>                        
                              <td align="center" style="width: 30px;">
                                 <a type="button" data-target="#modalRemoveCart" data-toggle="modal" title="Delete at {{ $cart->product->name }}">
                                    <img src="{{ url('/project/images/icon-remove.svg') }}" width="26px" alt="Delete" />
                                 </a>
                           <!-- Modal -->
                           <div class="modal fade my-modal" id="modalRemoveCart" tabindex="-1">
                              <div class="modal-dialog modal-sm">
                                 <div class="modal-content b-20">            
                                    <div class="modal-body text-center">               
                                       <h5>are you sure to remove {{ $cart->product->name }}</h5>               
                                       <button type="button" class="btn my-bt-alt px-5 mr-1" data-dismiss="modal">No</button>
                                       <form action="{{ route('cart-delete', $cart->products_id) }}" method="POST" class="px-5 ml-1" enctype="multipart/form-data">
                                          @method('DELETE')
                                          @csrf
                                          <button type="submit" class="btn my-bt-pro">Yes</button>                                       b
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- End Modal -->
                              </td>
                           </tr>
                           @php
                              $total_price += $cart->product->price
                           @endphp
                        @endforeach
                     </tbody>
                  </table>           
               </div>
               <p class="text-center d-block d-sm-none swife-left">Swife left</p>
            </div>
         </div>
         <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="total_price" value="{{ $total_price }}">
            <div class="row" data-aos="fade-up">
               <div class="col-12">
                  <hr style="border: 1px solid #bebebe;"/>
               </div>
               <div class="col-12">
                  <h3>Shipping Details</h3>                  
               </div>               
            </div>
            <div class="row" data-aos="fade-up" >               
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="address_one">Address 1</label>
                     <input type="text" name="address_one" id="address_one" class="form-control" value="DK. Mororejo 01/01" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="address_two">Address 1</label>
                     <input type="text" name="address_two" id="address_two" class="form-control" value="Banjarsari" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="provinces_id">Province</label>
                     <select name="provinces_id" id="provinces_id" class="form-control custom-select" v-model="provinces_id" v-if="provinces">
                        <option value="" selected>~ Select Province ~</option>
                        <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>                        
                     </select>                                        
                     <select v-else class="form-control custom-select"></select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="regencies_id">City</label>
                     <select name="regencies_id" id="regencies_id" class="form-control custom-select" v-model="regencies_id" v-if="regencies">
                        <option value="" selected>~ Select Regency ~</option>
                        <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                     </select>        
                     <select v-else class="form-control custom-select"></select>             
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="zip_code">zip_code</label>
                     <input type="text" name="zip_code" id="zip_code" class="form-control" value="59563" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="country">Country</label>
                     <input type="text" name="country" id="country" class="form-control" value="Indonesia" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="telephone">Mobile</label>
                     <input type="text" name="telephone" id="telephone" class="form-control" value="62895704447596" required>
                  </div>
               </div>
            </div>
            <div class="row" data-aos="fade-up">
               <div class="col-12">
                  <hr style="border: 1px solid #bebebe;" />
               </div>
               <div class="col-12">
                  <h3>Payment Informations</h3>                  
               </div>               
            </div>
            <div class="row" data-aos="fade-up">
               <div class="col-4 col-md-2 mb-3">
                  <div class="title">Rp. 0</div>
                  <div class="sub">Country Tax</div>
               </div>
               <div class="col-4 col-md-2 mb-3">
                  <div class="title">Rp. 0</div>
                  <div class="sub">Insurance</div>
               </div>
               <div class="col-4 col-md-2 mb-3">
                  <div class="title">Rp. 0</div>
                  <div class="sub">Ship to Demak</div>
               </div>
               <div class="col-4 col-md-2">
                  <div class="title-ttl">Rp. {{ number_format($total_price ?? 0) }}</div>
                  <div class="sub">Total</div>
               </div>
               <div class="col-8 col-md-3 my-auto">
                  <button type="submit" class="btn btn-block btn my-bt-pro">Checkout</button>
               </div>
            </div>
         </form>
      </div>
   </section>
</div>
<!-- End Content -->   
@endsection

@push('addon-script')
   <script src="{{ url('/project/vendor/vue-2/vue.js') }}"></script>
   <script src="https://unpkg.com/vue-toasted"></script>
   <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   <script>
      let locations = new Vue({
         el: '#locations',
         mounted() {
            AOS.init();  
            this.getProvincesData();
         },
         data: {            
            provinces: null,
            regencies: null,
            provinces_id: null,
            regencies_id: null
         },
         methods: {
            getProvincesData()  {
               let self = this;
               axios.get('{{ route('api-provincy') }}')
                  .then(function(response) {
                     self.provinces = response.data;
               });
            },
            getRegenciesData() {
               let self = this;
               axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                  .then(function(response) {
                     self.regencies = response.data;
               });
            }
         },
         watch : {
            provinces_id: function (val, oldVal) {
               this.regencies_id = null;
               this.getRegenciesData();
            }
         }
      });
   </script>
@endpush