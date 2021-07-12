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
	<div class="navbar navbar-expand-md navbar-dark bg-primary-800">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
				<img src="{{ asset('img/logo_light.png') }}" alt="">
			</a>
		</div>
		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a href="{{ route('login') }}" class="navbar-nav-link">
						<i class="icon-enter"></i>
						<span class="d-md-none ml-2">Login</span>
					</a>					
				</li>
			</ul>
		</div>
	</div>
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content d-flex justify-content-center align-items-center">
                <form class="login-form" method="POST" action="{{ route('password.update') }}">
                @csrf
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-spinner11 icon-2x text-primary border-primary border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Reset Kata Sandi</h5>
								<span class="d-block text-muted">Silahkan masukkan password anda yang baru</span>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-right">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror d-none" placeholder="E-Mail" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group form-group-feedback form-group-feedback-right">
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
							<div class="form-group form-group-feedback form-group-feedback-right">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Kata Sandi" required autocomplete="new-password">
								<div class="form-control-feedback">
									<i class="icon-menu text-muted"></i>
								</div>
							</div>
                            <input type="hidden" name="token" value="{{ $token }}">
							<button type="submit" id="btnSubmit" class="btn btn-secondary btn-block"><i class="icon-rotate-ccw3 mr-2"></i> Reset Kata Sandi</button>
						</div>
					</div>
				</form>
            </div>
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>
				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						© 2021 <a href="#">PSB SMA Nusantara Plus</a>
					</span>
					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="https://api.whatsapp.com/send?phone=+6287887599468" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Bantuan</a></li>
					</ul>
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