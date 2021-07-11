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
</head>
<body class="">
	<div class="page-content login-cover">
		<div class="content-wrapper">
			<div class="content d-flex justify-content-center align-items-center">
                <div class="card mb-0">
                    <ul class="nav nav-tabs nav-justified alpha-grey mb-0">
                        <li class="nav-item"><a href="{{ route('login') }}" id="tab1" class="nav-link border-y-0 border-left-0"><h6 class="my-1">Masuk</h6></a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" id="tab2" class="nav-link border-y-0 border-right-0 active"><h6 class="my-1">Daftar</h6></a></li>
                    </ul>
                    <div class="tab-content card-body">
                        <div class="tab-pane fade show active" id="login-tab2">
                            <div class="text-center mb-3">
                                <img src="{{ asset('img/ts1.png') }}" style="border: 1px solid #dbdbdb;border-radius: 100%;padding: 5px;" class="mb-3" width="100px">
                                <h5 class="mb-0">Buat Akun</h5>
                                <span class="d-block text-muted">Semua formulir wajib diisi dengan benar</span>
                            </div>
                            <form class="login-form wmin-sm-400" method="POST" action="{{ route('register') }}">
                            @csrf
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-check text-muted"></i>
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Kata Sandi" name="password" required autocomplete="new-password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock text-muted"></i>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Ulangi Kata Sandi" name="password_confirmation" required autocomplete="new-password">
                                    <div class="form-control-feedback">
                                        <i class="icon-menu text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="btnReg" class="btn bg-primary-800 btn-lg btn-block"><i class="icon-add mr-2"></i>Daftar</button>
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
</body>
</html>