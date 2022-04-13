@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('page-content-dashboard')
    <!-- Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
   <div class="container-fluid">
      <div class="heading">
         <h2 class="title">Dashboard</h2>
         <p class="sub">Look what you have made today!</p>
      </div>
      <div class="content">
         <div class="row">
            <div class="col-md-4">
               <div class="card my-card-hover mb-3">
                  <div class="card-body">
                     <div class="title">Customers</div>
                     <div class="sub">{{ number_format($customer) }}</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card my-card-hover mb-3">
                  <div class="card-body">
                     <div class="title">Revenue</div>
                     <div class="sub">{{ number_format($revenue) }}</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card my-card-hover mb-3">
                  <div class="card-body">
                     <div class="title">Transactions</div>
                     <div class="sub">Rp. {{ number_format($transaction_count) }}</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12 mt-2">
               <h5 class="mb-3">Recent transactions</h5>
               @foreach ($transaction_data as $transaction)
                  <a href="{{ route('transaction-detail', $transaction->id) }}" class="card my-card-hover card-list d-block">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-1">
                           <img src="{{ Storage::url($transaction->product->galleries->first()->photo ?? '') }}" class="img-recent-produk" alt="Product one">
                        </div>
                        <div class="col-md-4">
                           {{ $transaction->product->name ?? '' }}
                        </div>
                        <div class="col-md-3">
                           {{ $transaction->transaction->user->name ?? '' }}
                        </div>
                        <div class="col-md-3">
                           {{ $transaction->transaction->created_at ?? '' }}
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                           <span class="img-recent-trans">></span>
                        </div>
                     </div>
                  </div>
               </a>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
@endsection