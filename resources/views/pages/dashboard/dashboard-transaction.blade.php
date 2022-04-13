@extends('layouts.dashboard')

@section('title')
    Transactions
@endsection
@section('page-content-dashboard')
    <!-- Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
         <div class="heading">
            <h2 class="title">Transactions</h2>
            <p class="sub">Big result start from the small one</p>
         </div>
         <div class="content">                     
            <div class="row mt-3">
               <div class="col-12 mt-2">            
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                     <li class="nav-item" role="presentation">
                       <a class="nav-link active" id="pills-sell-tab" data-toggle="pill" href="#pills-sell" role="tab" aria-controls="pills-sell" aria-selected="true">Sell Product</a>
                     </li>
                     <li class="nav-item" role="presentation">
                       <a class="nav-link" id="pills-buy-tab" data-toggle="pill" href="#pills-buy" role="tab" aria-controls="pills-buy" aria-selected="false">Buy Product</a>
                     </li>                              
                   </ul>
                   <div class="tab-content" id="pills-tabContent">
                     <div class="tab-pane fade show active" id="pills-sell" role="tabpanel" aria-labelledby="pills-sell-tab">
                        @foreach ($sell_transactions as $sell)
                           <a href="{{ route('transaction-detail', $sell->id) }}" class="card card-list my-card-hover d-block">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-1 pl-0">
                                       <img src="{{ Storage::url($sell->product->galleries->first()->photo ?? '') }}" class="img-recent-produk" alt="Product">
                                    </div>
                                    <div class="col-md-4">
                                       {{ $sell->product->name }}
                                    </div>
                                    <div class="col-md-3">
                                       {{ $sell->product->user->store_name }}
                                    </div>
                                    <div class="col-md-3">
                                       {{ $sell->created_at }}
                                    </div>
                                    <div class="col-md-1 d-none d-md-block">
                                       <span class="img-recent-trans">></span>
                                    </div>
                                 </div>
                              </div>
                           </a>                                                    
                        @endforeach
                     </div>                  
                     <div class="tab-pane fade" id="pills-buy" role="tabpanel" aria-labelledby="pills-buy-tab">
                        @foreach ($buy_transactions as $buy)
                           <a href="{{ route('transaction-detail', $buy->id) }}" class="card card-list my-card-hover d-block">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-1 pl-0">
                                       <img src="{{ Storage::url($buy->product->galleries->first()->photo ?? '') }}" class="img-recent-produk" alt="Product">
                                    </div>
                                    <div class="col-md-4">
                                       {{ $buy->product->name }}
                                    </div>
                                    <div class="col-md-3">
                                       {{ $buy->product->user->store_name }}
                                    </div>
                                    <div class="col-md-3">
                                       {{ $buy->created_at }}
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
      </div>
   </div>
@endsection