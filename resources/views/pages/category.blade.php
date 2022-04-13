@extends('layouts.app')

@section('title')
   Product Category
@endsection

@section('page-content')
   <div class="section-content page-home">
      <section class="store-trend-category">
         <div class="container">
            <div class="row">
               <div class="col-12" data-aos="fade-up">
                  <h2>All Categories</h2>
               </div>
            </div>
            <div class="row">
               @php
                  $increment_data_aos_delay = 0
               @endphp
               @forelse ($categories as $category)
                  <div class="col-4 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $increment_data_aos_delay += 100 }}">
                     <a href="{{ route('category-details', $category->slug) }}" class="component-category d-block">
                        <div class="category-image">
                           <img src="{{ Storage::url($category->icon) }}" class="w-100 img-fluid" alt="" />
                        </div>
                        <p class="category-name text-center">
                           {{ $category->name }}
                        </p>
                     </a>
                  </div>
               @empty
                   <div class="col-md-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                     Category could not be found
                   </div>
               @endforelse               
            </div>
         </div>
      </section>      
      <section class="store-new-product">
         <div class="container">
            <div class="row">
               <div class="col-12" data-aos="fade-up">
                  <h2>All Products</h2>
               </div>
            </div>
            <div class="row">
               @php
                  $increment_data_aos_delay_product = 0
               @endphp
               @forelse ($products as $product)
                  <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $increment_data_aos_delay_product += 100 }}">
                     <a href="{{ route('detail', $product->slug) }}" class="component-product d-block shadow-sm">
                        <div class="thumbnail">
                           <div class="thumb" style="@if ($product->galleries->count())
                              background-image: url('{{ Storage::url($product->galleries->first()->photo) }}');
                           @else                              
                              backgorund: #c5c5c5;
                           @endif">
                           </div>                                   
                        </div>    
                        <div class="text">
                           <div class="name">
                              {{ $product->name }}
                           </div>
                           <div class="price">
                              <p>Rp. {{ number_format($product->price) }}</p>
                           </div>
                        </div>                 
                     </a>                  
                  </div>                                                               
               @empty
                  <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                     Product could not be found                  
                  </div>
               @endforelse
            </div>
            <div class="row float-right mb-5">
               <div class="col-md-12 mt-4">
                  {{ $products->links() }}
               </div>
            </div>
         </div>
      </section>
   </div>
@endsection