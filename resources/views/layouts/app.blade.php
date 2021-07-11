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
	<link href="{{ asset('css/dashboard/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/colors.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/custom.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="">
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
							<img src="{{ asset('img/placeholders/user.jpg') }}" class="rounded-circle mr-2" alt="" height="34">
							<span>{{ Auth::user()->name }}</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="#" class="dropdown-item"><i class="icon-key"></i> Ubah Kata Sandi</a>
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
				<h4>Dashboard <small class="font-size-base opacity-50">Informasi tentang PPDB 2021 - 2022</small></h4>
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
						<a href="#" class="navbar-nav-link active">
							<i class="icon-home4 mr-2"></i>
							Dashboard
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="navbar-nav-link ">
							<i class="icon-person mr-2"></i>
							Data Identitas
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="navbar-nav-link ">
							<i class="icon-bookmark mr-2"></i>
							Data Rapor
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="navbar-nav-link ">
							<i class="icon-file-upload2 mr-2"></i>
							Unggah Berkas
						</a>
					</li>
				</ul>
			</div>
		</div>
		<ul class="fab-menu fab-menu-absolute fab-menu-top-right" data-fab-toggle="click">
			<li>
				<a target="_blank" class="fab-menu-btn btn bg-teal-600 btn-float rounded-round btn-icon" href="https://api.whatsapp.com/send?phone=6285101656160">
					<i class="fab-icon-open icon-bubbles2"></i>
					<i class="fab-icon-close icon-bubbles2"></i>
				</a>
			</li>
		</ul>
	</div>
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title"><i class="icon-info22"></i> Pengumuman (Gelombang 2 Sesi 2)</h5>
                            </div>
                            <div class="card-body">
                                <p class="alert alert-warning">Anda belum terdaftar di Gelombang 2 Sesi 2. Silahkan pilih gelombang yang disediakan di bawah ini!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">Pilih Gelombang PPDB</h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-3">Sebelum mengisi data pendaftaran, silahkan terlebih dahulu memilih jalur pendaftaran berikut ini.</p>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <form action="#" method="post" id="form_rapor">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="p-1 text-center" rowspan="2">Jalur</th>
                                                            <th class="text-center" colspan="2">Tanggal</th>
                                                            <th rowspan="2" class="text-center"><i class="icon-more2"></i></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">Dibuka</th>
                                                            <th class="text-center">Ditutup</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Gelombang  1</td>
                                                            <td class="p-1 text-center">01-10-2020</td>
                                                            <td class="p-1 text-center">11-12-2020</td>
                                                            <td class="p-1 text-center">
                                                                <a class="btn bg-primary btn-sm disabled"><i class="icon-blocked mr-2"></i>Sudah Ditutup</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gelombang 2</td>
                                                            <td class="p-1 text-center">23-12-2020</td>
                                                            <td class="p-1 text-center">26-03-2021</td>
                                                            <td class="p-1 text-center">
                                                                <a class="btn bg-primary btn-sm disabled"><i class="icon-blocked mr-2"></i>Sudah Ditutup</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gelombang 2 Sesi 2</td>
                                                            <td class="p-1 text-center">04-06-2021</td>
                                                            <td class="p-1 text-center">05-06-2021</td>
                                                            <td class="p-1 text-center">
                                                                <a class="btn bg-primary btn-sm disabled"><i class="icon-blocked mr-2"></i>Sudah Ditutup</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">Alur Pendaftaran</h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-3">Periksa alur pendaftaran kalian melalui langkah berikut ini.</p>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="card card-body bg-light" style="background-image: url({{ asset('img/panel_bg.png') }});">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                <i class="icon-cross2 icon-2x"></i>
                                                </div>

                                                <div class="media-body text-right">
                                                    <h6 class="media-title font-weight-semibold">Gelombang</h6>
                                                    <span class="opacity-75">Pilih jalur pendaftaran</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="card card-body bg-light" style="background-image: url(https://ppdb.smktelkom-mlg.sch.id/assets/images/backgrounds/panel_bg.png);">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                <i class="icon-cross2 icon-2x"></i>
                                                </div>

                                                <div class="media-body text-right">
                                                    <h6 class="media-title font-weight-semibold">Data Identitas</h6>
                                                    <span class="opacity-75">Isi data profil diri</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                                            <!-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="card card-body bg-light" style="background-image: url(https://ppdb.smktelkom-mlg.sch.id/assets/images/backgrounds/panel_bg.png);">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                <i class="icon-cross2 icon-2x"></i>
                                                </div>

                                                <div class="media-body text-right">
                                                    <h6 class="media-title font-weight-semibold">Data Nilai Rapor</h6>
                                                    <span class="opacity-75">Input nilai rapor kalian</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="card card-body bg-light" style="background-image: url(https://ppdb.smktelkom-mlg.sch.id/assets/images/backgrounds/panel_bg.png);">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                <i class="icon-cross2 icon-2x"></i>
                                                </div>

                                                <div class="media-body text-right">
                                                    <h6 class="media-title font-weight-semibold">Unggah Berkas</h6>
                                                    <span class="opacity-75">SK sehat &amp; Ishihara</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="card card-body bg-light" style="background-image: url(https://ppdb.smktelkom-mlg.sch.id/assets/images/backgrounds/panel_bg.png);">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                <i class="icon-cross2 icon-2x"></i>
                                                </div>

                                                <div class="media-body text-right">
                                                    <h6 class="media-title font-weight-semibold">Pilihan Jurusan</h6>
                                                    <span class="opacity-75">Tentukan juruan kalian</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="card card-body bg-light" style="background-image: url(https://ppdb.smktelkom-mlg.sch.id/assets/images/backgrounds/panel_bg.png);">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                <i class="icon-cross2 icon-2x"></i>
                                                </div>

                                                <div class="media-body text-right">
                                                    <h6 class="media-title font-weight-semibold">Bayar Pendaftaran</h6>
                                                    <span class="opacity-75">Transfer biaya pendaftaran</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="card card-body bg-light" style="background-image: url(https://ppdb.smktelkom-mlg.sch.id/assets/images/backgrounds/panel_bg.png);">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                <i class="icon-cross2 icon-2x"></i>
                                                </div>

                                                <div class="media-body text-right">
                                                    <h6 class="media-title font-weight-semibold">Cetak Kartu Peserta</h6>
                                                    <span class="opacity-75">Unduh/cetak kartu peserta</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="card card-body bg-light" style="background-image: url(https://ppdb.smktelkom-mlg.sch.id/assets/images/backgrounds/panel_bg.png);">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                <i class="icon-cross2 icon-2x"></i>
                                                </div>

                                                <div class="media-body text-right">
                                                    <h6 class="media-title font-weight-semibold">Tes Akademik</h6>
                                                    <span class="opacity-75">Pastikan bayar pendaftaran</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                        <!-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <div class="card card-body 
            <div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

            <h4>A PHP Error was encountered</h4>

            <p>Severity: Notice</p>
            <p>Message:  Undefined variable: bg8</p>
            <p>Filename: pendaftar/dashboard_view.php</p>
            <p>Line Number: 441</p>


                <p>Backtrace:</p>






                        <p style="margin-left:10px">
                        File: /var/www/html/ppdb/application/views/pendaftar/dashboard_view.php<br />
                        Line: 441<br />
                        Function: _error_handler			</p>








                        <p style="margin-left:10px">
                        File: /var/www/html/ppdb/application/views/pendaftar/template_view.php<br />
                        Line: 214<br />
                        Function: view			</p>








                        <p style="margin-left:10px">
                        File: /var/www/html/ppdb/application/controllers/pendaftar/Akses.php<br />
                        Line: 40<br />
                        Function: view			</p>






                        <p style="margin-left:10px">
                        File: /var/www/html/ppdb/index.php<br />
                        Line: 317<br />
                        Function: require_once			</p>




            </div>" style="background-image: url(https://ppdb.smktelkom-mlg.sch.id/assets/images/backgrounds/panel_bg.png);">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                    <i class="
            <div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

            <h4>A PHP Error was encountered</h4>

            <p>Severity: Notice</p>
            <p>Message:  Undefined variable: icon8</p>
            <p>Filename: pendaftar/dashboard_view.php</p>
            <p>Line Number: 444</p>


                <p>Backtrace:</p>






                        <p style="margin-left:10px">
                        File: /var/www/html/ppdb/application/views/pendaftar/dashboard_view.php<br />
                        Line: 444<br />
                        Function: _error_handler			</p>








                        <p style="margin-left:10px">
                        File: /var/www/html/ppdb/application/views/pendaftar/template_view.php<br />
                        Line: 214<br />
                        Function: view			</p>








                        <p style="margin-left:10px">
                        File: /var/www/html/ppdb/application/controllers/pendaftar/Akses.php<br />
                        Line: 40<br />
                        Function: view			</p>






                        <p style="margin-left:10px">
                        File: /var/www/html/ppdb/index.php<br />
                        Line: 317<br />
                        Function: require_once			</p>




            </div> icon-2x"></i>
                                                    </div>

                                                    <div class="media-body text-right">
                                                        <h6 class="media-title font-weight-semibold">Daftar Ulang Tes</h6>
                                                        <span class="opacity-75">Transfer Biaya Daful</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</div>

	<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/main/jquery.min.js"></script>

<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/forms/selects/select2.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/forms/styling/uniform.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/notifications/pnotify.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/notifications/sweet_alert.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/main/bootstrap.bundle.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/loaders/blockui.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/pickers/anytime.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/pickers/pickadate/legacy.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/ui/slinky.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/ui/fab.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/visualization/d3/d3.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/forms/styling/switchery.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/dropzone/dropzone.min.js"></script>
<script src="https://ppdb.smktelkom-mlg.sch.id/assets/js/app.js"></script>

	<script type="text/javascript">
		var PNotify;
		var call = false;
		var base_url = "https://ppdb.smktelkom-mlg.sch.id/";
	</script>
            
<script type="text/javascript">
	var swalInit = swal.mixin({
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-light'
    });

	function pilih(id)
	{
		swalInit({
            title: 'Apakah Anda Yakin?',
            text: "Mendaftar di gelombang ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Pilih',
            cancelButtonText: 'Batal',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-secondary',
            buttonsStyling: false
        }).then(function(result) {
            if(result.value) {
            	$.ajax({
		            type: "POST",
		            data: {id: id},
		            url: "https://ppdb.smktelkom-mlg.sch.id/pendaftar/akses/pilih_gelombang",
		            success: function(r) {
			            if(r.status == 1){
		            		swalInit(
		                        'Jalur Tersimpan!',
		                        r.msg,
		                        'success'
		                    ).then(function(results){
								//location.reload();
								window.location.href = base_url + "pendaftar/akses/identitas";
		                    });
		            	}
		            }
		        });
                
            }
            else if(result.dismiss === swal.DismissReason.cancel) {
                swalInit(
                    'Pilih Jalur Dibatalkan!',
                    'Data pemilihan jalur tidak jadi disimpan.',
                    'error'
                );
            }
        });
	}



	var Buttons = function() {
	    var _componentLadda = function() {
	        if (typeof Ladda == 'undefined') {
	            console.warn('Warning - ladda.min.js is not loaded.');
	            return;
	        }
	        Ladda.bind('.btn-ladda-spinner', {
	            dataSpinnerSize: 16,
	            timeout: 2000
	        });
	    };
	    var _componentLoadingButton = function() {
	        $('.btn-loading').on('click', function () {
	            var btn = $(this),
	                initialText = btn.data('initial-text'),
	                loadingText = btn.data('loading-text');
	            btn.html(loadingText).addClass('disabled');
	            setTimeout(function () {
	                btn.html(initialText).removeClass('disabled');
	            }, 3000)
	        });
	    };
	    return {
	        init: function() {
	            _componentLadda();
	            _componentLoadingButton();
	        }
	    }
	}();

	document.addEventListener('DOMContentLoaded', function() {
	    Buttons.init();
	});

</script>
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


	<!-- Footer -->
	<div class="navbar navbar-expand-lg navbar-light">
		<div class="text-center d-lg-none w-100">
			<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
				<i class="icon-unfold mr-2"></i>
				Footer
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-footer">
			<span class="navbar-text">
				© 2021 <a href="#">PPDB SMK Telkom Malang</a>
			</span>

			<ul class="navbar-nav ml-lg-auto">
				<li class="nav-item"><a href="https://api.whatsapp.com/send?phone=6285101656160" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Bantuan</a></li>
			</ul>
		</div>
	</div>
	<!-- /footer -->


</body></html>