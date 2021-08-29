@extends('layouts.app')

@section('modal')
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bb-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center py-0">
                <h4 class="modal-title mb-2"><strong>Are you sure?</strong></h4>
                <h6 class="modal-messages m-0">Are you really want to delete these records? This process cannot be undone.</h6>
            </div>
            <div class="modal-body text-center"> 
                <button class="btn btn-sm btn-light mx-1 px-4" data-dismiss="modal" aria-label="Close">Cancel</button>
                <a href="#" id="url" class="btn btn-sm btn-danger mx-1 px-4">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="PreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="Preview Berkas" class="img-fluid" id="img">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/moment-timezone-with-data.js') }}"></script>
<script>
// Tooltip
$('[data-toggle="tooltip"]').tooltip()
    
// Countdown
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

// Upload Berkas
$(document).ready(function() {
    $('#buttonPhoto').on('click',function(){
        $('#uploadPhoto').trigger('click');
    
        var input = document.getElementById( 'uploadPhoto' );
        var infoArea = document.getElementById( 'labelPhoto' );

        input.addEventListener( 'change', showFileName );

        function showFileName( event ) {
            var input = event.srcElement;
            var fileName = input.files[0].name;

            infoArea.textContent = fileName;
        }
    });
    
    $('#buttonSehat').on('click',function(){
        $('#uploadSehat').trigger('click');
    
        var input = document.getElementById( 'uploadSehat' );
        var infoArea = document.getElementById( 'labelSehat' );

        input.addEventListener( 'change', showFileName );

        function showFileName( event ) {
            var input = event.srcElement;
            var fileName = input.files[0].name;

            infoArea.textContent = fileName;
        }
    });
    
    $('#buttonPayment').on('click',function(){
        $('#uploadPayment').trigger('click');
    
        var input = document.getElementById( 'uploadPayment' );
        var infoArea = document.getElementById( 'labelPayment' );

        input.addEventListener( 'change', showFileName );

        function showFileName( event ) {
            var input = event.srcElement;
            var fileName = input.files[0].name;

            infoArea.textContent = fileName;
        }
    });
});
    
// Delete
$('#DeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var uri = button.data('uri')
    
    $("#url").attr("href", uri);
})
    
// Preview
$('#PreviewModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var img = button.data('img')
    
    $("#img").attr("src", img);
})
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
                                    <a href="javascript:void(0)"><p>Bank Mandiri atas nama <strong>YAYASAN ALDIANA NUSANTARA</strong></p></a>
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
                                    @if(Auth::user()->status == 'Ujian')
                                    <p class="m-0"><strong>Batas Verifikasi</strong></p>
                                    <a href="javascript:void(0)"><strong><span>Berkas Terverifikasi</span></strong></a>
                                    @else
                                    <p class="m-0"><strong>Batas Verifikasi</strong></p>
                                    <input class="d-none" type="text" id="limit" value="{{ $gelombang->end_period }}">
                                    <a href="javascript:void(0)"><strong><span id="countdown">0 Jam 0 Menit 0 Detik</span></strong></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <form method="POST" action="{{ route('berkas.update') }}" enctype="multipart/form-data">
                                        @csrf @method('put')
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
                                                        <td class="text-left">
                                                            <input type="file" class="form-control-file d-none @error('photo') is-invalid @enderror" id="uploadPhoto" name="photo">
                                                            <div class="btn-group btn-group-sm" role="group">
                                                                <button type="button" class="btn btn-light" id="buttonPhoto" @if($berkas->photo_status == 'Terverifikasi') disabled @endif>Browse</button>
                                                                <button type="submit" class="btn btn-light" @if($berkas->photo_status == 'Terverifikasi') disabled @endif><i class="fas fa-cloud-upload-alt"></i></button>
                                                            </div>
                                                            <button type="button" class="btn" data-toggle="modal" data-target="#PreviewModal" data-img="{{ asset('img/berkas/'.$berkas->photo) }}" @if($berkas->photo == NULL) disabled @endif id="labelPhoto">@if($berkas->photo == NULL) Belum ada Berkas @else <i class="fas fa-search-plus mr-2"></i>Preview @endif</button>
                                                            @error('photo')
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="badge @if($berkas->photo_status == 'Berkas Invalid') badge-danger @elseif($berkas->photo_status == 'Terverifikasi') badge-primary @else badge-light @endif" @if($berkas->photo_status == 'Berkas Invalid') data-toggle="tooltip" title="{{ $berkas->photo_notes }}" data-placement="top" @endif>{{ $berkas->photo_status }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#DeleteModal" data-uri="{{ route('berkas.destroy', 'Photo') }}" @if($berkas->photo_status == 'Terverifikasi') disabled @endif><i class="fas fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Surat Keterangan Sehat</td>
                                                        <td class="text-left">
                                                            <input type="file" class="form-control-file d-none @error('sehat') is-invalid @enderror" id="uploadSehat" name="sehat">
                                                            <div class="btn-group btn-group-sm" role="group">
                                                                <button type="button" class="btn btn-light" id="buttonSehat" @if($berkas->surat_ket_sehat_status == 'Terverifikasi') disabled @endif>Browse</button>
                                                                <button type="submit" class="btn btn-light" @if($berkas->surat_ket_sehat_status == 'Terverifikasi') disabled @endif><i class="fas fa-cloud-upload-alt"></i></button>
                                                            </div>
                                                            <button type="button" class="btn" data-toggle="modal" data-target="#PreviewModal" data-img="{{ asset('img/berkas/'.$berkas->surat_ket_sehat) }}" @if($berkas->surat_ket_sehat == NULL) disabled @endif id="labelSehat">@if($berkas->surat_ket_sehat == NULL) Belum ada Berkas @else <i class="fas fa-search-plus mr-2"></i>Preview @endif</button>
                                                            @error('sehat')
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="badge @if($berkas->surat_ket_sehat_status == 'Berkas Invalid') badge-danger @elseif($berkas->surat_ket_sehat_status == 'Terverifikasi') badge-primary @else badge-light @endif" @if($berkas->surat_ket_sehat_status == 'Berkas Invalid') data-toggle="tooltip" title="{{ $berkas->surat_ket_sehat_notes }}" data-placement="top" @endif>{{ $berkas->surat_ket_sehat_status }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#DeleteModal" data-uri="{{ route('berkas.destroy', 'Sehat') }}" @if($berkas->surat_ket_sehat_status == 'Terverifikasi') disabled @endif><i class="fas fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bukti Pembayaran</td>
                                                        <td class="text-left">
                                                            <input type="file" class="form-control-file d-none @error('payment') is-invalid @enderror" id="uploadPayment" name="payment">
                                                            <div class="btn-group btn-group-sm" role="group">
                                                                <button type="button" class="btn btn-light" id="buttonPayment" @if($berkas->payment_status == 'Terverifikasi') disabled @endif>Browse</button>
                                                                <button type="submit" class="btn btn-light" @if($berkas->payment_status == 'Terverifikasi') disabled @endif><i class="fas fa-cloud-upload-alt"></i></button>
                                                            </div>
                                                            <button type="button" class="btn" data-toggle="modal" data-target="#PreviewModal" data-img="{{ asset('img/berkas/'.$berkas->payment) }}" @if($berkas->payment == NULL) disabled @endif id="labelPayment">@if($berkas->payment == NULL) Belum ada Berkas @else <i class="fas fa-search-plus mr-2"></i>Preview @endif</button>
                                                            @error('payment')
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="badge @if($berkas->payment_status == 'Berkas Invalid') badge-danger @elseif($berkas->payment_status == 'Terverifikasi') badge-primary @else badge-light @endif" @if($berkas->payment_status == 'Berkas Invalid') data-toggle="tooltip" title="{{ $berkas->payment_notes }}" data-placement="top" @endif>{{ $berkas->payment_status }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#DeleteModal" data-uri="{{ route('berkas.destroy', 'payment') }}" @if($berkas->payment_status == 'Terverifikasi') disabled @endif><i class="fas fa-trash"></i></button>
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
