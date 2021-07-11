@extends('layouts.app')

@section('content')
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
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
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
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <div class="card card-body bg-light" style="background-image: url(https://ppdb.smktelkom-mlg.sch.id/assets/images/backgrounds/panel_bg.png);">
                                        <div class="media">
                                            <div class="mr-3 align-self-center">
                                            <i class="icon-cross2 icon-2x"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h6 class="media-title font-weight-semibold">Daftar Ulang Tes</h6>
                                                <span class="opacity-75">Transfer Biaya Daful</span>
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
    </div>
</div>
@endsection
