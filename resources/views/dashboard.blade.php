@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="content-wrapper">
        <div class="content">
            @role('Admin')
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Daftar Gelombang</h5>
                        </div>
                        <div class="card-body">
                            <div class="btn-group btn-group-sm mb-2" role="group" aria-label="Action">
                                <a href="{{ route('gelombang.create') }}" class="btn btn-success"> <i class="fas fa-plus mr-2"></i>Buat Gelombang</a>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="p-1 text-center" rowspan="2">Gelombang</th>
                                                    <th class="text-center" colspan="2">Tanggal</th>
                                                    <th class="text-center" colspan="2">Kuota</th>
                                                    <th rowspan="2" class="text-center">Biaya Pendaftaran</th>
                                                    <th rowspan="2" class="text-center"><i class="icon-more2"></i></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">Dibuka</th>
                                                    <th class="text-center">Ditutup</th>
                                                    <th class="text-center">Jumlah</th>
                                                    <th class="text-center">Sisa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($composer['gelombang']) > 0)
                                                @foreach($composer['gelombang'] as $gelombang)
                                                <tr>
                                                    <td class="text-center">{{ $gelombang->name }}</td>
                                                    <td class="text-center">{{ $gelombang->start_period->format('d F Y') }}</td>
                                                    <td class="text-center">{{ $gelombang->end_period->format('d F Y') }}</td>
                                                    <td class="text-center">{{ $gelombang->total_quota }}</td>
                                                    <td class="text-center">{{ $gelombang->remaining_quota }}</td>
                                                    <td class="text-center">Rp {{ number_format($gelombang->fee,0,"",".") }}</td>
                                                        <td class="p-1 text-center">
                                                            <a href="{{ route('gelombang.edit', $gelombang->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit mr-2"></i>Edit</a>
                                                        </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        @if(count($composer['gelombang']) == 0)
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="p-1 text-center" rowspan="2">Belum ada Gelombang</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endrole
            @role('User')
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title"><i class="icon-info22 mr-2"></i>Pengumuman</h5>
                        </div>
                        <div class="card-body">
                            <p class="alert alert-primary">Anda belum terdaftar di Gelombang. Silahkan pilih gelombang yang disediakan di bawah ini!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Pilih Gelombang</h5>
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
                                                        <th class="p-1 text-center" rowspan="2">Gelombang</th>
                                                        <th class="text-center" colspan="2">Tanggal</th>
                                                    <th class="p-1 text-center" rowspan="2">Sisa Kuota</th>
                                                        <th rowspan="2" class="text-center"><i class="icon-more2"></i></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Dibuka</th>
                                                        <th class="text-center">Ditutup</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(count($composer['gelombang']) > 0)
                                                    @foreach($composer['gelombang'] as $gelombang)
                                                    <tr>
                                                        <td>{{ $gelombang->name }}</td>
                                                        <td class="p-1 text-center">{{ $gelombang->start_period->format('d F Y') }}</td>
                                                        <td class="p-1 text-center">{{ $gelombang->end_period->format('d F Y') }}</td>
                                                        <td class="p-1 text-center">{{ $gelombang->remaining_quota }}</td>
                                                        <td class="p-1 text-center">
                                                            <a href="javasript:void(0)" class="btn btn-light btn-sm disabled"><i class="fas fa-check mr-2"></i>Pilih Gelombang</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                            @if(count($composer['gelombang']) == 0)
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="p-1 text-center" rowspan="2">Belum ada Gelombang</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            @endif
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
                                                <h6 class="media-title font-weight-semibold">Tes Akademik</h6>
                                                <span class="opacity-75">Pastikan bayar pendaftaran</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endrole
        </div>
    </div>
</div>
@endsection
