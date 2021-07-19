<!doctype html>
<html lang="en"><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PSB SMA Nusantara Plus</title>
    <!--favicon icon-->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" sizes="16x16">
	<link href="{{ asset('css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}">
	<link href="{{ asset('css/dashboard/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/colors.min.css') }}" rel="stylesheet" type="text/css">
    @yield('style')
	<link href="{{ asset('css/dashboard/custom.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="">
    @include('layouts.header')
	@yield('content')
    @include('layouts.footer')

    <script src="{{ asset('js/dashboard/main/jquery.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
	<script src="{{ asset('js/dashboard/plugins/loaders/blockui.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/plugins/ui/slinky.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/plugins/ui/fab.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('js/dashboard/plugins/visualization/d3/d3.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script src="{{ asset('js/dashboard/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script src="{{ asset('js/dashboard/plugins/ui/moment/moment.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/plugins/pickers/daterangepicker.js') }}"></script>
    @yield('script')
	<script src="{{ asset('js/dashboard/app.js') }}"></script>
	<script src="{{ asset('js/dashboard/custom.js') }}"></script>
    <!-- Alert -->
    @php ($alert = ['success', 'info', 'error', 'warning', 'question'])
    @foreach ($alert as $type)
    @if(session()->has($type))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });

            Toast.fire({
                icon: '{{ $type }}',
                title: '{{ session($type) }}'
            });
        });
    </script>
    @endif
    @endforeach
</body>
</html>