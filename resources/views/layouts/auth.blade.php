<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
   <meta name="description" content="Adib Store" />
   <meta name="keywords" content="Belanja online murah, adibstore" />
   <meta name="author" content="Muhammad Roisul Adib" />
   <title>Adib Story | @yield('title')</title>
   <link rel="shortcut icon" href="{{ url('/project/images/logo.svg') }}" type="image/png">   
   
   {{-- Style --}}
   @stack('prepent-style')
   @include('includes.style')
   @stack('addon-style')

</head>
<body>
   
   {{-- Page Content --}}
   @yield('page-content')
 
   {{-- Script --}}
   @stack('prepent-script')
   @include('includes.script')
   @stack('addon-script')
 
</body>
</html>