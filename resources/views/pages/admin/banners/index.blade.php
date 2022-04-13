@extends('layouts.admin')

@section('title')
   Admin - Bannners
@endsection

@section('page-content-dashboard')
    <!-- Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
   <div class="container-fluid">
      <div class="heading">
         <h2 class="title">Product Banners</h2>
         <p class="sub">List of Banners</p>
      </div>
      <div class="content">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <a href="{{ route('banners.create') }}" class="btn my-bt-pro mb-4">Add new</a>
                     <div class="table-responsive">
                        <table class="table table-hover table-striped scroll-horizonal-vertical w-100" id="crudTable">
                           <thead>
                              <tr>
                                 <th>Id</th>
                                 <th>Banners</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody></tbody>                           
                        </table>
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
   <script>
      var dataTable = $('#crudTable').DataTable({
         processing: true,
         serverSide: true,
         ordering: true,
         ajax: {
            url: '{!! url()->current() !!}',
         },
         columns: [
            {
               data: 'id',
               name: 'id',
               width: '5%'
            },
            {
               data: 'banner',
               name: 'banner'
            },                       
            {
               data: 'action', 
               name: 'action',
               orderable: false,
               searchable:false,
               width: '9%'
            }
         ]
      });
   </script>
@endpush



