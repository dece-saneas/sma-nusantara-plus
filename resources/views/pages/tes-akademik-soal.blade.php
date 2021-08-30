<!doctype html>
<html lang="en"><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PSB SMA Nusantara Plus</title>
    <!--favicon icon-->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" sizes="16x16">
	<link href="{{ asset('css/dashboard/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/colors.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/dashboard/custom.css') }}" rel="stylesheet" type="text/css">
    <style>
    </style>
</head>
<body class="navbar-top">
	<div class="page-header page-header-dark bg-primary-800">
		<div class="navbar navbar-expand-md navbar-dark bg-primary-800 border-transparent fixed-top">
			<div class="collapse navbar-collapse" id="navbar-mobile">
				<ul class="navbar-nav" style="width: 33.3333%">
					<li class="nav-item">
						<a href="javascript:void(0)" class="navbar-nav-link">
							<img src="{{ asset('img/berkas/'.Auth::user()->berkas->photo) }}" onerror="this.onerror=null;this.src='{{ asset('img/placeholders/user.jpg') }}';" class="rounded-circle mr-2" alt="" height="34">
							<span>{{ Auth::user()->name }} @role('User')| <strong>{{ Auth::user()->no_registration }}</strong>@endrole</span>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav justify-content-center" style="width: 33.3333%">
					<h1 class="m-0" id="countdown">00 : 00 : 00</h1>
                    <input class="d-none" type="text" id="limit" value="{{ $jawaban->created_at }}">
				</ul>
				<ul class="navbar-nav justify-content-end" style="width: 33.3333%">
					<button type="button" id="Submit" class="btn btn-primary"><i class="fas fa-paper-plane mr-2"></i>Submit</button>
				</ul>
			</div>
		</div>
	</div>
    <div class="page-content">
    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header text-center px-4 mx-4 mt-4">
                            <h2 class="m-0"><strong>SOAL TES AKADEMIK</strong></h2>
                            <h4 class="m-0"><strong>PERSIAPAN MASUK SMA NUSANTARA PLUS</strong></h4>
                            <h6><strong>Waktu : 120 menit</strong></h6>
                            <hr>
                        </div>
                        <div class="card-body px-4 mx-4">
                            <form id="Form" method="POST" action="{{ route('ujian.submit') }}">
                            @csrf @method('put')
                            @foreach($soal as $no => $s)
                                <h6>{{ $no+1 }}. {!! $s->soal !!}</h6>
                                <div class="row">
                                    <div class="col-6 my-1">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="{{ $s->id }}A" name="jawaban[{{ $s->id }}]" class="custom-control-input" value="A">
                                            <label class="custom-control-label" for="{{ $s->id }}A">{!! $s->a !!}</label>
                                        </div>
                                    </div>
                                    <div class="col-6 my-1">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="{{ $s->id }}C" name="jawaban[{{ $s->id }}]" class="custom-control-input" value="C">
                                            <label class="custom-control-label" for="{{ $s->id }}C">{!! $s->c !!}</label>
                                        </div>
                                    </div>
                                    <div class="col-6 my-1">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="{{ $s->id }}B" name="jawaban[{{ $s->id }}]" class="custom-control-input" value="B">
                                            <label class="custom-control-label" for="{{ $s->id }}B">{!! $s->b !!}</label>
                                        </div>
                                    </div>
                                    <div class="col-6 my-1">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="{{ $s->id }}D" name="jawaban[{{ $s->id }}]" class="custom-control-input" value="D">
                                            <label class="custom-control-label" for="{{ $s->id }}D">{!! $s->d !!}</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/dashboard/main/jquery.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/moment-timezone-with-data.js') }}"></script>
    <script>
        $(window).blur(function() {
            window.location = "{{ route('ujian') }}";
        });
        // Submit
        $(document).ready(function(){
            $("#Submit").click(function(){        
                $("#Form").submit();
            });
        });
        // Timer
        var end = moment($("#limit").val()).add(2, 'hours');

        var x = setInterval(function() {

            var now = new Date().getTime();
            var distance = end - now;

            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            if(hours < 10) { var hours = '0'+hours; }
            if(minutes < 10) { var minutes = '0'+minutes; }
            if(seconds < 10) { var seconds = '0'+seconds; }
            
            if(hours == 00 && minutes == 00 && seconds == 00) {
                $("#Form").submit();
            }
            
            $('#countdown').text(hours + ' : ' + minutes + ' : ' + seconds);
        }, 1000);
    </script>
</body>
</html>