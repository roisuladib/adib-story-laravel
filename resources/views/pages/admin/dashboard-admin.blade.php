@extends('layouts.admin')

@section('title')
   Admin Dashboard
@endsection

@section('page-content-dashboard')
    <!-- Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
   <div class="container-fluid">
      <div class="heading">
         <h2 class="title">Admin Dashboard</h2>
         <p class="sub">This is ADIB STORY a Administrator panel</p>
      </div>
      <div class="content">
         <div class="row">
            <div class="col-md-4">
               <div class="card my-card-hover mb-3">
                  <div class="card-body">
                     <div class="title">Customers</div>
                     <div class="sub">{{ $customer }}</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card my-card-hover mb-3">
                  <div class="card-body">
                     <div class="title">Revenue</div>
                     <div class="sub">Rp. {{ number_format($revenue) }}</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card my-card-hover mb-3">
                  <div class="card-body">
                     <div class="title">Transactions</div>
                     <div class="sub">Rp. {{ number_format($transaction) }}</div>
                  </div>
               </div>
            </div>
         </div>
         {{-- <div class="row mt-3">
            <div class="col-12 mt-2">
               <h5 class="mb-3">Recent transactions</h5>
               <a href="dashboard-transaction-detail.html" class="card my-card-hover card-list d-block">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-1 pl-0">
                           <img src="{{ url('/project/images/product/product1.jpg') }}" class="img-recent-produk" alt="Product one">
                        </div>
                        <div class="col-md-4">
                           Jambu Kristal
                        </div>
                        <div class="col-md-3">
                           Cahaya Ningsih
                        </div>
                        <div class="col-md-3">
                           17 Mei 2021
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                           <span class="img-recent-trans">></span>
                        </div>
                     </div>
                  </div>
               </a>
               <a href="dashboard-transaction-detail.html" class="card my-card-hover card-list d-block">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-1 pl-0">
                           <img src="{{ url('/project/images/product/product2.jpg') }}" class="img-recent-produk" alt="Product one">
                        </div>
                        <div class="col-md-4">
                           Sepatu Boot
                        </div>
                        <div class="col-md-3">
                           Santy Rahayu
                        </div>
                        <div class="col-md-3">
                           16 September 2021
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                           <span class="img-recent-trans">></span>
                        </div>
                     </div>
                  </div>
               </a>
               <a href="dashboard-transaction-detail.html" class="card my-card-hover card-list d-block">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-1 pl-0">
                           <img src="{{ url('/project/images/product/product3.jpg') }}" class="img-recent-produk" alt="Product one">
                        </div>
                        <div class="col-md-4">
                           Kopi Luwak
                        </div>
                        <div class="col-md-3">
                           Amar Setyawan
                        </div>
                        <div class="col-md-3">
                           17 November 2021
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                           <span class="img-recent-trans">></span>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
         </div> --}}
      </div>
   </div>
</div>
@endsection