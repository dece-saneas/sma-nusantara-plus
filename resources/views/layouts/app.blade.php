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
    <link href="{{ asset('css/sweetalert.min.css') }}" rel="stylesheet" >
	<link href="{{ asset('css/dashboard/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/colors.min.css') }}" rel="stylesheet" type="text/css">
    @yield('style')
	<link href="{{ asset('css/dashboard/custom.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="">
    <div class="modal fade" id="ResetPasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bb-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="login-form wmin-sm-400" method="POST" action="{{ route('custom.resetpassword') }}">
                @csrf
                <div class="modal-body text-center py-0">
                    <h4 class="modal-title"><strong>Reset Password</strong></h4>
                    <h6 class="modal-messages m-0 mb-2">This process cannot be undone.</h6>
                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Kata Sandi Baru" name="password" required autocomplete="new-password">
                        <div class="form-control-feedback">
                            <i class="icon-lock text-muted"></i>
                        </div>
                    </div>
                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input id="password-confirm" type="password" class="form-control" placeholder="Ulangi Kata Sandi" name="password_confirmation" required autocomplete="new-password">
                        <div class="form-control-feedback">
                            <i class="icon-menu text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-body text-center"> 
                    <button type="submit" class="btn btn-sm btn-primary mx-1 px-4">Reset Pasword</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @yield('modal')
    @include('layouts.header')
	@yield('content')
    @include('layouts.footer')

    <script src="{{ asset('js/dashboard/main/jquery.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
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