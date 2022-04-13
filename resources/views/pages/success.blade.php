@extends('layouts.success')

@section('title')
   Success checkout    
@endsection
@section('page-content')
<div class="section-content page-success">     
   <section class="store-success">
      <div class="container">
         <div class="row align-items-center justify-content-center" data-aos="fade-in">
            <div class="col-sm-12 col-lg-6 text-center">
               <img src="{{ url('/project/images/icon-success.svg') }}" width="150px" alt="Success">
               <h3>Transaction Processed!</h3>
               <p>Please wait for an email confirmation from us and we will inform you of the receipt as soon as possible!</p>
               <div class="row">
                  <div class="col-sm-12">
                     <a href="#" class="btn my-bt-pro btn-custom mb-3">My dashboard</a>                                    
                  </div>
                  <div class="col-sm-12">
                     <a href="{{ route('/') }}" class="btn my-bt-alt">Go to shopping</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection