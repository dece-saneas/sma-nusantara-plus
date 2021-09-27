<!doctype html>
<html lang="en"><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PSB - SMA Nusantara Plus</title>
    <!--favicon icon-->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" sizes="16x16">
	<link href="{{ asset('css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sweetalert.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="">
	<div class="page-content login-cover">
		<div class="content-wrapper">
			<div class="content d-flex justify-content-center align-items-center">
                <div class="card mb-0">
                    <ul class="nav nav-tabs nav-justified alpha-grey mb-0">
                        <li class="nav-item"><a href="{{ route('login') }}" id="tab1" class="nav-link border-y-0 border-left-0 active"><h6 class="my-1">Masuk</h6></a></li>
                        <li class="nav-item"><a href=" @if($composer['gelombang_now']) {{ route('register') }} @else javascript:void(0); @endif" id="tab2" class="nav-link border-y-0 border-right-0"><h6 class="my-1">Daftar</h6></a></li>
                    </ul>
                    <div class="tab-content card-body">
                        <div class="tab-pane fade show active" id="login-tab1">
                            <div class="text-center mb-3">
                                <!-- <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i> -->
                                <img src="{{ asset('img/ts1.png') }}" style="border: 1px solid #dbdbdb;border-radius: 100%;padding: 5px;" class="mb-3" width="100px">
                                <h5 class="mb-0">Login Pendaftar</h5>
                                <span class="d-block text-muted">Silahkan masukan alamat email dan kata sandi anda</span>
                            </div>
                            <form class="login-form wmin-sm-400" method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <div class="form-control-feedback">
                                        <i class="icon-envelop text-muted"></i>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Kata Sandi" name="password" required autocomplete="current-password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="btnLogin" class="btn bg-primary-800 btn-block btn-lg"><i class="icon-enter mr-2"></i>Login</button>
                                </div>
                                <div class="form-group text-center text-muted content-divider">
                                    <span class="px-2"><i class="icon-mustache" style="font-size: 30px;"></i></span>
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('password.request') }}" class="btn btn-light btn-block btn-lg"><i class="icon-rotate-ccw3 mr-2"></i>Lupa Kata Sandi</a>
                                </div>
                            </form>
                            <span class="form-text text-center text-muted">Supported by SMA Nusantara Plus</span>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<!-- Core JS files -->
	<script src="{{ asset('js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('js/plugins/loaders/blockui.min.js') }}"></script>
	<script src="{{ asset('js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/plugins/notifications/pnotify.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
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
                title: '{!! session($type) !!}',
            });
        });
    </script>
    @endif
    @endforeach
</body>
</html>