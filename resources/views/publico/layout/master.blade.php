<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Laravel')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<!-- Stylesheets -->
    <link href="{{ asset('public/vendor/bona/common-css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/bona/common-css/ionicons.css') }}" rel="stylesheet">

    <style>
        .single-post .post-footer.view > li{
            width: 100% !important;
        }
        header .logo img {
            height: 18px !important;
            width: 80px !important;
        }
        .main-post {
            margin-top: -300px !important;
            border-right: 0px;
            padding: 0px 0px 20px !important;
        }
        .slider {
            height: 400px;
            width: 100%;
            background-image: url(../../images/slider-1-1600x900.jpg);
            background-size: cover;
        }
        .post-bottom-area .row {
            padding-bottom: 30px;
        }
        .popup-galeria {
            text-align: center;
        }
        p.para {
            text-align: justify;
        }
        .section {
            padding: 30px 0 0px !important;
        }
        footer {
            margin-top: 0px !important;
            padding: 20px !important;
        }
        footer .footer-section {
            margin-bottom: 0px !important;
        }
        footer .copyright {
            margin: 0px !important;
            font-weight: bold;
        }
        .post-area { 
            margin-bottom: 40px;
        }
        .tag-area > button {
            cursor: pointer;
        }

        .blog-area p {
            text-align: left;
        }
        @media only screen and (max-width: 992px) {
            .info-area .sidebar-area, .info-area .tag-area {
                padding: 0 30px 30px !important;
            }
            .post-area { 
                margin-bottom: 20px !important;
            }
        }
        @media only screen and (max-width: 767px) {
            footer {
                margin-top: 20px !important;
            }
        }
    </style>

    @yield('bona_css')
</head>
<body>

    <header>
        <div class="container position-relative no-side-padding">
            <a href="{{ route('index.get') }}" class="logo"><img src="{{ asset('public/img/logo.png') }}" alt="Logo"></a>
            <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>
            <ul class="main-menu visible-on-click" id="main-menu">
                <li><a href="{{ route('index.get') }}">Início</a></li>
            </ul>
            <!-- main-menu -->
        </div>
        <!-- conatiner -->
    </header>

@yield('body')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="footer-section">
                        <p class="copyright">{{ config('app.name', 'Laravel') }} {{ date('Y') }}</p>
                    </div>
                    <!-- footer-section -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </footer>

@yield('bona_js')

    <!-- SCIPTS -->
    <script src="{{ asset('public/vendor/bona/common-js/jquery-3.1.1.min.js') }}"></script>
    <!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('public/vendor/bona/plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('public/vendor/bona/common-js/tether.min.js') }}"></script>
    <script src="{{ asset('public/vendor/bona/common-js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/vendor/bona/common-js/scripts.js') }}"></script>

@yield('custom_js')
</body>
</html>
