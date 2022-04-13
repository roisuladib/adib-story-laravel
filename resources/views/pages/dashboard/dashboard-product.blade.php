@extends('layouts.dashboard')

@section('title')
    My products
@endsection

@section('page-content-dashboard')
    <!-- Content -->
<div class="section-content section-dashboard-product" data-aos="fade-up">
   <div class="container-fluid">
      <div class="heading">
         <h2 class="title">My products</h2>
         <p class="sub">Manage it well and get money</p>
      </div>
      <div class="content">
         <div class="row">
            <div class="col-12">
               <a href="{{ route('product-create') }}" class="btn my-bt-pro px-5">Add new product</a>
            </div>
         </div>
         <div class="row">
            @foreach ($products as $product)                
               <div class="col-6 col-md-4 col-lg-3" title="{{ $product->name }}">
                  <a href="{{ route('product-detail', $product->id) }}" class="card card-product d-block mb-3">
                     <div class="card-body">
                        <img src="{{ Storage::url($product->galleries->first()->photo ?? '') }}" min-height="180px" min-width="180px" class="w-100 mb-2" alt="{{ $product->name }}">
                        <div class="product-price my-2">Rp. {{ number_format($product->price) }}</div>
                        <div class="product-title">{{ $product->name }}</div>
                        <div class="product-category">{{ $product->category->name }}</div>
                     </div>
                  </a>
               </div>            
            @endforeach
         </div>
      </div>
   </div>
</div>
@endsection