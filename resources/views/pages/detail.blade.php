@extends('layouts.app')

@section('title')
   Product details {{ $products->name }}
@endsection
@section('page-content')
    <!-- Content -->
   <div class="section-content page-detail">
      <section class="store-breadcrumb" data-aos="fade-up" data-aos-delay="100">
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="my-breadcrumb">
                     <a href="{{ route('/') }}" class="">Home</a>               
                     <span class="mx-4">/</span>
                     <a href="{{ route('detail', $products->slug) }}" class="active">Details</a>
                  </div>                     
               </div>                  
            </div>
         </div>
      </section>

      <section class="store-gallery" id="gallery">
         <div class="container">
            <div class="row">
               <div class="col-lg-8" data-aos="zoom-in">
                  <transition name="slide-fade" mode="out-in">
                     <img :src="previews[thumbActive].url" :key="previews[thumbActive].id" class="w-100 b-20 shadow preview-image" alt="">
                  </transition>
               </div>
               <div class="col-lg-2">
                  <div class="row">
                     <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(preview, index) in previews" :key="preview.id" data-aos="zoom-in" data-aos-delay="100">
                        <a href="#" @click="changeActive(index)">
                           <img :src="preview.url" class="w-100 b-12 thumb-image" :class="{active: index == thumbActive}" alt="">
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="store-deskripsi" data-aos="fade-up">
         <div class="container">
            <div class="title-product">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="price">Rp. {{ number_format($products->price) }}</div>
                     <h2>{{ $products->name }}</h2>
                     <div class="seller d-inline-block">
                        <a href="#">
                           <span><img src="{{ url('/project/images/icon-start-seller.png') }}" width="20px" alt="Start seller"></span>
                           {{ $products->user->store_name }}
                        </a>
                        <img src="{{ url('/project/images/review/start/start4.5.svg') }}" height="20px" alt="Penilaian">
                        <span class="preview-ulasan"> 4.5 (99 reviews)</span>
                     </div>
                     <div class="loc"><span><img src="{{ url('/project/images/icon-loc.png') }}" width="20px" class="mr-1" alt="location"></span>Semarang, Jawa Tengah</div>
                  </div>  
                  <!-- desktop -->
                  <div class="col-lg-1 d-none d-sm-block justify-content-center">
                     <img src="{{ url('/project/images/icon-chat.png') }}" class="chat-seller" width="45px" height="45px" alt="Chat" title="Chat to seller">
                  </div>                 
                  <div class="col-lg-3 pl-0 d-none d-sm-block">                     
                     @auth
                        <form action="{{ route('add-cart', $products->id) }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           <button type="submite" class="btn my-bt-pro btn-block mb-4">Add to cart</button>
                        </form>
                     @else
                        <a href="{{ route('login') }}" class="btn my-bt-pro btn-block mb-4">Add to cart</a>
                     @endauth
                  </div>
                  <!-- Mobile -->
                  <div class="fixed-bottom">                     
                     <div class="col-sm-12 d-inline-block d-block d-sm-none"> 
                        <div class="row">
                           <div class="col-2">
                              <img src="{{ url('/project/images/icon-chat.png') }}" class="chat-seller" class="mt-auto" width="45px" height="45px" alt="Chat" title="Chat to seller">                                           
                           </div>
                           <div class="col pl-0">
                              @auth
                                 <form action="{{ route('add-cart', $products->id) }}" method="POST">
                                    @csrf
                                    <button type="submite" class="my-auto btn my-bt-pro btn-block mb-4">Add to cart</button>
                                 </form>
                              @else
                                 <a href="{{ route('login') }}" class="my-auto btn my-bt-pro btn-block mb-4">Add to cart</a>
                              @endauth
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>      
            <div class="deskripsi-product">
               <div class="row">
                  <div class="col-sm-12" data-aos="fade-up">
                     <h3>Descriptions</h3>                     
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-8">
                     {!! $products->desciption !!}
                  </div>
               </div> 
            </div>        
         </div>
      </section>

      <section class="store-review">
         <div class="container">
            <div class="row">
               <div class="col-12 col-lg-8" data-aos="fade-up">
                  <h3>Review(99)<span class="terjual"> • 1099 solds</span></h3>                     
               </div>
            </div>
            <div class="row">
               <div class="col-12 col-lg-8">
                  <ul class="list-unstyled">
                     <li class="media" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ url('/project/images/user/review1.png') }}" width="45px" height="45px" class="rounded-circle" alt="User 1">
                        <div class="media-body">
                           <h4>Adib</h4>
                           <img src="{{ url('/project/images/review/start/start5.svg') }}" height="24px" alt="Penilaian"><span class="long">1 days ago</span>
                           <p>I thought it was not good for living room. I really happy to decided buy this product last week now feels like homey.</p>
                        </div>
                     </li>
                     <li class="media" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ url('/project/images/user/user-yayak.png') }}" width="45px" height="45px" class="rounded-circle" alt="User 2">
                        <div class="media-body">
                           <h4>Yayak</h4>
                           <img src="{{ url('/project/images/review/start/start4.svg') }}" height="24px" alt="Penilaian"><span class="long">3 days ago</span>
                           <p>Color is great with the minimalist concept. Even I thought it was made by Cactus industry. I do really satisfied with this.</p>
                        </div>
                     </li>
                     <li class="media" data-aos="fade-up" data-aos-delay="300">
                        <img src="{{ url('/project/images/user/review2.png') }}" width="45px" height="45px" class="rounded-circle" alt="User 3">
                        <div class="media-body">
                           <h4>Silvie</h4>
                           <img src="{{ url('/project/images/review/start/start3.svg') }}" height="24px" alt="Penilaian"><span class="long">3 days ago</span>
                           <p>When I saw at first, it was really awesome to have with. Just let me know if there is another upcoming product </p>  
                        </div>
                     </li>
                     <li class="media" data-aos="fade-up" data-aos-delay="400">
                        <img src="{{ url('/project/images/user/review3.png') }}" width="45px" height="45px" class="rounded-circle" alt="User 3">
                        <div class="media-body">
                           <h4>Santy</h4>
                           <img src="{{ url('/project/images/review/start/start4.svg') }}" height="24px" alt="Penilaian"><span class="long">1 weeks ago</span>
                           <p>The chair is very soft, durable, not easy to fade and cheap</p>  
                        </div>
                     </li>
                     <li class="media" data-aos="fade-up" data-aos-delay="400">
                        <img src="{{ url('/project/images/user/review5.png') }}" width="45px" height="45px" class="rounded-circle" alt="User 3">
                        <div class="media-body">
                           <h4>Veranita</h4>
                           <img src="{{ url('/project/images/review/start/start4.svg') }}" height="24px" alt="Penilaian"><span class="long">3 weeks ago</span>
                           <p>I don't get bored shopping here</p>  
                        </div>
                     </li>
                     <li class="media" data-aos="fade-up" data-aos-delay="400">
                        <img src="{{ url('/project/images/user/review4.png') }}" width="45px" height="45px" class="rounded-circle" alt="User 3">
                        <div class="media-body">
                           <h4>Noname</h4>
                           <img src="{{ url('/project/images/review/start/start5.svg') }}" height="24px" alt="Penilaian"><span class="long">1 Months ago</span>
                           <p>international quality goods at popular prices</p>  
                        </div>
                     </li>
                  </ul>
                  <div class="read-more-preview text-center">
                     <a href="#">Read more -></a>                     
                  </div>
               </div>
            </div>            

         </div>
      </section>
   </div>
   <!-- End Content -->
@endsection
@push('addon-script')
   <script src="{{ url('/project/vendor/vue-2/vue.js') }}"></script>
   <script>
      let gallery = new Vue({
         el: '#gallery',
         mounted() {
            AOS.init();  
         },
         data: {            
            thumbActive: 0,
            previews: [
               @foreach ($products->galleries as $gallery)
                  {
                     id: {{ $gallery->id }},
                     url: '{{ Storage::url($gallery->photo) }}'
                  },
               @endforeach             
            ]
         },
         methods: {
            changeActive(id) {
               this.thumbActive = id;
            }
         }
      });
   </script>
@endpush