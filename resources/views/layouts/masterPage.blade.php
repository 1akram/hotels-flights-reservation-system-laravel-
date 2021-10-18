<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='/css/bootstrap.min.css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='/css/main.css'>
    <link rel='stylesheet' type='text/css' href='/css/main2.css'>
    @yield("head")  
    <title>{{ config('app.name', 'Laravel') }}: @yield('pageTitle')</title>


</head>

<body>

 <!-- header  -->
 
 
 <!-- body -->
    {{-- include naveBar --}}
    @include('includes\navBar')
    {{-- include messeges --}}
    @include('includes\msg\errorMsg')
    @include('includes\msg\status')

    @yield('content')

    {{-- include footer  --}}
    @include('includes\footer')


    <!-- end body -->
</body>
<!-- include js  -->
<div>

    <script src="/js/all.min.js" data-search-pseudo-elements></script>
    <script src="/js/jq.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    @yield("extr") 
 
</div>

</html>