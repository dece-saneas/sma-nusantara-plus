@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <h1><strong>Ujian Untuk {{ Auth::user()->gelombang->name }}</strong></h1>
                            <p>Dibuka mulai <strong>{{ Auth::user()->gelombang->start_exam->format('H.i') }} {{ Auth::user()->gelombang->start_exam->format('d F Y') }}</strong> s/d <strong>{{ Auth::user()->gelombang->end_exam->format('H.i') }} {{ Auth::user()->gelombang->end_exam->format('d F Y') }}</strong></p>
                            <br>
                            <p>Petunjuk Pengerjaan Soal Ujian</p>
                            <ol>
                                <li>Pilihlah Jawaban Dengan Baik dan Benar</li>
                                <li>Waktu Mengerjakan Soal Selama <strong>120 menit</strong></li>
                                <li>Selama Waktu Belum Habis Periksalah Kembali Jawaban Anda</li>
                                <li>Jika Waktu Telah Habis, Maka Sistem Akan Melakukan Submit Secara Otomatis</li>
                                <li>Hasil Ujian Akan Langsung Di Tampilkan Setelah Ujian Telah Berakhir Min Nilai <strong>LULUS</strong> adalah <strong>65</strong></li>
                            </ol>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-light btn-lg" @if(Auth::user()->gelombang->start_exam->isToday()) @else disabled @endif><i class="fas fa-play mr-2"></i>Mulai Ujian</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
