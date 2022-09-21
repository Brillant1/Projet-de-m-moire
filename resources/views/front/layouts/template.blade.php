<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>MEMO</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{asset('css/yearpicker.css')}}">
    <script src="{{ asset('js/inputmask.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdn.kkiapay.me/k.js"></script>

</head>
<body>

    @include('front.layouts.header2')

    <main>

        @yield('content')

    </main>

    @include('front.layouts.footer')


    <script src="{{asset("js/jquery.min.js")}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/yearpicker.js') }}"></script>
    <script src="{{ asset('js/inputmask.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
    
    
    


</body>
</html>
