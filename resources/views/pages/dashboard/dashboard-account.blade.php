@extends('layouts.dashboard')

@section('title')
    My account
@endsection
@section('page-content-dashboard')
    <!-- Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
         <div class="heading">
            <h2 class="title">Account</h2>
            <p class="sub">Update your current profile</p>
         </div>
         <div class="content">                     
            <div class="row mt-3">
               <div class="col-12 mt-2 mb-5">  
                  <form action="{{ route('account-redirect', 'account') }}" method="POST" enctype="multipart/form-data" id="locations">
                     @csrf
                     <div class="card">
                        <div class="card-body">
                           <div class="row" data-aos="fade-up" >               
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="name">Your name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" autofocus required>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="email">Your email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="address_one">Address 1</label>
                                    <input type="text" name="address_one" id="address_one" class="form-control" value="{{ $user->address_one }}" required>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="address_two">Address 2</label>
                                    <input type="text" name="address_two" id="address_two" class="form-control" value="{{ $user->address_two }}" required>
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
                                    <label for="zip_code">Post Code</label>
                                    <input type="text" name="zip_code" id="zip_code" class="form-control" value="{{ $user->zip_zode }}" required>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" class="form-control" value="{{ $user->country }}" required>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $user->telephone }}" required>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col">
                                 <button type="submit" class="btn my-bt-pro mt-4 ml-auto px-5 d-none d-md-flex">Submit</button>
                                 <button type="submit" class="btn my-bt-pro btn-block mt-4 d-block d-md-none">Submit</button>
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
   <script src="{{ url('/project/vendor/vue-2/vue.js') }}"></script>   
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