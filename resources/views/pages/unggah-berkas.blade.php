@extends('layouts.app')

@section('script')
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/moment-timezone-with-data.js') }}"></script>
<script>
    var end = moment($("#limit").val());
    
    var x = setInterval(function() {
        
        var now = new Date().getTime();
        var distance = end - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        $('#countdown').text(days + ' Hari ' + hours + ' Jam ' + minutes + ' Menit ' + seconds + ' Detik');
    }, 1000);
</script>
@endsection

@section('content')
<div class="page-content">
    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h4><strong>Biaya Pendaftaran</strong></h4>
                                    <p>Silahkan Melakukan Transfer Ke Nomor Rekening :</p>
                                    <h5><strong>1531138 97239 198</strong></h5>
                                    <a href="javascript:void(0)"><p>Bank Mandiri atan nama <strong>YAYASAN ALDIANA NUSANTARA</strong></p></a>
                                    <p>Pastikan nominal sesuai dengan yang tertera agar proses verifikasi lebih cepat. Panitia akan memverifikasi Pembayaran anda maksimal 2×24 jam.</p>
                                </div>
                                <div class="col-lg-3 text-right">
                                    <div class="jumbotron mb-2 p-2">
                                        <div class="row">
                                            <div class="col-3">
                                                <h1 class="m-2"><i class="fas fa-credit-card"></i></h1>
                                            </div>
                                            <div class="col-9 text-right">
                                                <small>Biaya Pendaftaran Sebesar :</small><br>
                                                @php $fee = $gelombang->fee+substr(Auth::user()->no_registration,-3); @endphp
                                                <h2 class="m-0"><strong>Rp {{ number_format($fee,0,"",".") }}</strong></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="m-0"><strong>Batas Verifikasi</strong></p>
                                    <input class="d-none" type="text" id="limit" value="{{ $gelombang->end_period }}">
                                    <a href="javascript:void(0)"><strong><span id="countdown">0 Jam 0 Menit 0 Detik</span></strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <form action="#" method="post" id="form_rapor">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Persyaratan</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center"><i class="icon-more2"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Photo 4×3</td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-light">Unggah Berkas</button>
                                                            <button type="button" class="btn" disabled>Belum ada Berkas</button>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light">Belum di Upload</span></td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-sm btn-light"><i class="fas fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Surat Keterangan Sehat</td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-light">Unggah Berkas</button>
                                                            <button type="button" class="btn" disabled>Belum ada Berkas</button>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light">Belum di Upload</span></td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-sm btn-light"><i class="fas fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bukti Pembayaran</td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-light">Unggah Berkas</button>
                                                            <button type="button" class="btn" disabled>Belum ada Berkas</button>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light">Belum di Upload</span></td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-sm btn-light"><i class="fas fa-trash"></i></button>
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
            </div>
        </div>
    </div>
</div>
@endsection
