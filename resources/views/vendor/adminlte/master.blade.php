<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link href="{{ asset('public/vendor/adminlte/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    @endif

    <link href="{{ asset('public/vendor/adminlte/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/vendor/adminlte/vendor/icheck/skins/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/vendor/adminlte/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/vendor/adminlte/vendor/lightbox2/dist/css/lightbox.min.css') }}" rel="stylesheet" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    <style>
        .modal {
        }
        .modal-content{
            
        }
        .vertical-alignment-helper {
            display:table;
            height: 100%;
            width: 100%;
        }
        .vertical-align-center {
            /* To center vertically */
            display: table-cell;
            vertical-align: middle;
        }
        .modal-content {
            /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
            width:inherit;
            height:inherit;
            /* To center horizontally */
            margin: 0 auto;
        }
        .bootstrap-tagsinput {
            display: block !important;
            border-radius: 0;
            box-shadow: none;
            border-color: #d2d6de;
            min-height: 34px;
            padding: 6px 6px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
        }
        
        
        .bootstrap-tagsinput:focus-within,
        .bootstrap-tagsinput:focus {
            border-color: #66afe9 !important;
            outline: 0 !important;
            box-shadow: none !important;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
                -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }
        .has-error .select2-selection,
        .has-error .bootstrap-tagsinput,
        .has-error .bootstrap-tagsinput:focus-within
        .has-error .bootstrap-tagsinput:focus{
            border-color: rgb(221, 75, 57) !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }

        .vertical-align {
            display: flex;
            align-items: center;
            vertical-align: middle;
        }
        @media (max-width: 767px) {
            .row.vertical-align {
                /* display: block; Turn off the flexible box layout */
            }
        }

        .loading {
            background: url('{{ asset('public/img/loading.gif') }}') 50% no-repeat;
            width: 100%;
            height: 100%;
        }

        .content-img{position: relative;}
        .overlay{position: absolute;left: 0; top: 0; right: 0; bottom: 0;z-index: 2;background-color: rgba(255,255,255,0.8);}
        .overlay-content {
            position: absolute;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            top: 50%;
            left: 0;
            right: 0;
            text-align: center;
            color: #555;
        }
        .overlay-hide{
            display: none;
        }
        .thumb-planta{
            max-height: 180px;
        }

        div.row div.radio {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        #lightboxOverlay { position: fixed !important; top: 0; left: 0; height: 100% !important; width: 100% !important; }
        #lightbox { position: fixed !important; top: 50% !important; transform: translateY(-50%); }
    </style>

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables with bootstrap 3 style -->
        <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('public/vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('public/vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('public/vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="{{ asset('public/vendor/adminlte/vendor/select2/dist/js/select2.min.js') }}"></script>
@endif

<script src="{{ asset('public/vendor/adminlte/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables with bootstrap 3 renderer -->
    <script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
@endif

<script src="{{ asset('public/vendor/adminlte/vendor/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('public/vendor/adminlte/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/vendor/adminlte/vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js') }}" charset="UTF-8"></script>
<script src="{{ asset('public/vendor/adminlte/vendor/bootstrap-filestyle/src/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('public/vendor/adminlte/vendor/lightbox2/dist/js/lightbox.min.js') }}"></script>

<script src="{{ asset('public/js/functions.js') }}"></script>

<script>
    img_loading = '{{ asset('public/img/loading.gif') }}';
    function imagemPlantaDefault(){
        var image = '{{ asset('public/img/img-planta-default-336x180.png') }}';
        return image;
    }
</script>


@yield('custom_js')

@yield('adminlte_js')

</body>
</html>
