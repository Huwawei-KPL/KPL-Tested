<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link href="{{ asset('user/afterlogin/css/untitled.css') }}" rel="stylesheet" />
    <link href="{{ asset('user/afterlogin/fonts/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('user/afterlogin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body id="page-top">



    @yield('content')



    <div class="map-clean"><iframe allowfullscreen="" frameborder="0" src="https://cdn.bootstrapstudio.io/placeholders/map.html" width="100%" height="450"></iframe></div>
    <footer>
        <div class="container text-center">
            <p>Copyright ©&nbsp;Brand 2021</p>
        </div>
    </footer>
    <script src="{{ asset('user/afterlogin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('user/afterlogin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/afterlogin/js/grayscale.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
</body>

</html>