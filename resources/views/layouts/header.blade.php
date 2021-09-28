	<div class="page-header page-header-dark bg-primary-800">
		<div class="navbar navbar-expand-md navbar-dark bg-primary-800 border-transparent">
			<div class="navbar-brand wmin-0 mr-5">
				<a href="#" class="d-inline-block">
					<img src="{{ asset('img/logo_light.png') }}" alt="">
				</a>
			</div>
			<div class="d-md-none">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
					<i class="icon-tree5"></i>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbar-mobile">
				<ul class="navbar-nav ml-md-auto">
					<li class="nav-item dropdown dropdown-user">
						<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
							    <img src="@role('User') @if($composer['berkas']) {{ asset('img/berkas/AVA'.$composer['berkas']['photo']) }} @endif @endrole" onerror="this.onerror=null;this.src='{{ asset('img/placeholders/user.jpg') }}';" class="rounded-circle mr-2" alt="" height="34">
							<span>{{ Auth::user()->name }} @role('User')| <strong>{{ Auth::user()->no_registration }}</strong>@endrole</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="#" class="dropdown-item" data-toggle="modal" data-target="#ResetPasswordModal"><i class="icon-key"></i> Ubah Kata Sandi</a>
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> Keluar</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4>Dashboard <small class="font-size-base opacity-50">Informasi tentang PSB {{ Carbon\Carbon::now()->year }} - {{ Carbon\Carbon::now()->addYear(1)->year }}</small></h4>
			</div>
		</div>
		<div class="navbar navbar-expand-md navbar-dark bg-primary-800 border-top-0">
			<div class="d-md-none w-100">
				<button type="button" class="navbar-toggler d-flex align-items-center w-100" data-toggle="collapse" data-target="#navbar-navigation">
					<i class="icon-menu-open mr-2"></i>
					Menu Utama
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-navigation">
				<ul class="navbar-nav navbar-nav-highlight">
					<li class="nav-item">
						<a href="{{ route('dashboard') }}" class="navbar-nav-link {{ HelperMenu::active('route',['dashboard']) }}">
							<i class="icon-home4 mr-2"></i>
							Dashboard
						</a>
					</li>
                    @role('Admin')
                    <li class="nav-item">
						<a href="{{ route('daftar.siswa') }}" class="navbar-nav-link {{ HelperMenu::active('route',['daftar.siswa']) }}">
							<i class="fas fa-users mr-2"></i>
							Daftar Siswa
						</a>
					</li>
                    @endrole
                    @role('User')
					<li class="nav-item">
						<a href="@if(Auth::user()->status == NULL) javascript:void(0); @else {{ route('identitas') }} @endif" class="navbar-nav-link {{ HelperMenu::active('route',['identitas']) }} @if(Auth::user()->status == NULL) disabled @endif">
							<i class="icon-person mr-2"></i>
							Data Identitas
						</a>
					</li>
					<li class="nav-item">
						<a href="@if(Auth::user()->status == 'Isi Identitas' || Auth::user()->gelombang_id == NULL) javascript:void(0); @else {{ route('berkas') }} @endif" class="navbar-nav-link {{ HelperMenu::active('route',['berkas']) }} @if(Auth::user()->status == 'Isi Identitas' || Auth::user()->gelombang_id == NULL) disabled @endif">
							<i class="icon-file-upload2 mr-2"></i>
							Unggah Berkas
						</a>
					</li>
					<li class="nav-item">
						<a href="@if(Auth::user()->status == 'Verified' || Auth::user()->status == 'Complete') {{ route('ujian') }} @else javascript:void(0); @endif" class="navbar-nav-link {{ HelperMenu::active('route',['ujian']) }} @if(Auth::user()->status == 'Verified' || Auth::user()->status == 'Complete') @else disabled @endif">
							<i class="fas fa-pencil-alt mr-2"></i>
							Tes Akademik
						</a>
					</li>
                    @endrole
				</ul>
			</div>
		</div>
		<ul class="fab-menu fab-menu-absolute fab-menu-top-right" data-fab-toggle="click">
			<li>
				<a target="_blank" class="fab-menu-btn btn btn-light btn-float rounded-round btn-icon" href="https://api.whatsapp.com/send?phone=6287887599468">
					<h1 class="m-0"><i class="fab fa-whatsapp"></i></h1> 
				</a>
			</li>
		</ul>
	</div>