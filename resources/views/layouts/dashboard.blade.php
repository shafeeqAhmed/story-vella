<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title','Story Vella')
       </title>

    <!-- bosstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('custom/assets/scss/style.css')}}">

    <script src="{{ asset('custom/assets/js/script.js')}}"></script>

</head>

<body>
    <div id="container">
        <div>
            @include('layouts.home-navigation')

        <!-- Page Heading -->
        @if (isset($header))
        {{ $header }}
        @endif


        <!-- Page Content -->
        <main class="container content_div">
            {{ $slot }}
        </main>
        </div>
    </div>
</body>


<style>


#container {
    position:absolute;
  top:0;
  bottom:0;
  right:0;
  left:0;
  border:solid 10px black;
  overflow:auto;

}
.content_div{
    border-left: solid black;
    border-right: solid black;
}

</style>
</html>
