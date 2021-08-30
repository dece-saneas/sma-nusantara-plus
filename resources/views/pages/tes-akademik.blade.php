@extends('layouts.app')

@section('modal')
<div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bb-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center py-0">
                <h4 class="modal-title mb-2"><strong>Mulai Ujian</strong></h4>
            </div>
            <div class="modal-body">
                <p class="modal-messages m-0">Waktu Ujian hanya <strong>120 menit</strong>, dimulai saat kamu klik tombol Mulai Ujian. Selesaikan semua soal sebelum waktu habis, Sistem akan <strong>Otomatis</strong> menutup halaman ujian bila waktu telah berakhir.</p><br>
                <p class="modal-messages m-0">Apa kamu yakin memulai Ujian sekarang ?</p>
            </div>
            <div class="modal-body text-center">
                <button class="btn btn-sm btn-light mx-1 px-4" data-dismiss="modal" aria-label="Close">Cancel</button>
                <a href="#" id="url" class="btn btn-sm btn-primary mx-1 px-4"><i class="fas fa-play mr-2"></i> @if($jawaban) Lanjutkan @else Mulai Ujian @endif</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$('#ConfirmModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var url = button.data('url')
    
    $("#url").attr("href", url);
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
                        <div class="card-body p-4">
                            <h1><strong>Ujian Untuk {{ Auth::user()->gelombang->name }}</strong></h1>
                            <p>Dibuka mulai @if(Auth::user()->gelombang->start_exam->format('d F Y') == Auth::user()->gelombang->end_exam->format('d F Y')) <strong>{{ Auth::user()->gelombang->start_exam->format('d F Y') }} | {{ Auth::user()->gelombang->start_exam->format('H:i') }} - {{ Auth::user()->gelombang->end_exam->format('H:i') }}</strong> @else <strong>{{ Auth::user()->gelombang->start_exam->format('d F Y') }} - {{ Auth::user()->gelombang->start_exam->format('H:i') }}</strong> s/d <strong>{{ Auth::user()->gelombang->end_exam->format('d F Y') }} - {{ Auth::user()->gelombang->end_exam->format('H:i') }}</strong> @endif</p>
                            <br>
                            <p>Petunjuk Pengerjaan Soal Ujian</p>
                            <ol>
                                <li>Pilihlah Jawaban Dengan Baik dan Benar</li>
                                <li>Waktu Mengerjakan Soal Selama <strong>120 menit</strong></li>
                                <li>Jangan refresh halaman soal atau membuka tab baru</li>
                                <li>Selama Waktu Belum Habis Periksalah Kembali Jawaban Anda</li>
                                <li>Jika Waktu Telah Habis, Maka Sistem Akan Melakukan Submit Secara Otomatis</li>
                                <li>Hasil Ujian Akan Langsung Di Tampilkan Setelah Ujian Telah Berakhir Min Nilai <strong>LULUS</strong> adalah <strong>65</strong></li>
                            </ol>
                        </div>
                    </div>
                    <div class="text-center">
                        @if($jawaban)
                        @if($jawaban->bhs !== NULL)
                        <button class="btn btn-light btn-lg" disabled><i class="fas fa-ban mr-2"></i>Ujian Berakhir</button>
                        @else
                        <button class="btn btn-light btn-lg" @if(!Auth::user()->gelombang->start_exam->lt(Carbon\Carbon::now()) || !Auth::user()->gelombang->end_exam->gt(Carbon\Carbon::now())) disabled @endif data-toggle="modal" data-target="#ConfirmModal" data-url="{{ route('ujian.soal') }}"><i class="fas @if(!Auth::user()->gelombang->end_exam->gt(Carbon\Carbon::now())) fa-ban @else fa-play @endif mr-2"></i>@if(!Auth::user()->gelombang->end_exam->gt(Carbon\Carbon::now())) Ujian Berakhir @else Lanjutkan @endif</button>
                        @endif
                        @else
                        <button class="btn btn-light btn-lg" @if(!Auth::user()->gelombang->start_exam->lt(Carbon\Carbon::now()) || !Auth::user()->gelombang->end_exam->gt(Carbon\Carbon::now())) disabled @endif data-toggle="modal" data-target="#ConfirmModal" data-url="{{ route('ujian.soal') }}"><i class="fas @if(!Auth::user()->gelombang->end_exam->gt(Carbon\Carbon::now())) fa-ban @else fa-play @endif mr-2"></i>@if(!Auth::user()->gelombang->end_exam->gt(Carbon\Carbon::now())) Ujian Berakhir @else Mulai Ujian @endif</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
