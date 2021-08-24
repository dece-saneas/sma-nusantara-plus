@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/select.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('js/select.min.js') }}"></script>
<script>
$(document).ready(function(){
    $("#keadaan_ayah").change(function(){
        $("#cardAyah").removeClass("d-none");
        
        var kondisi = $(this).val();
        
        if(kondisi == "Sudah Meninggal") {
            $("#cardAyah").addClass("d-none");
        }
    });
    $("#keadaan_ibu").change(function(){
        $("#cardIbu").removeClass("d-none");
        
        var kondisi = $(this).val();
        
        if(kondisi == "Sudah Meninggal") {
            $("#cardIbu").addClass("d-none");
        }
    }); 
});
</script>
@endsection

@section('content')
<div class="page-content">
    <div class="content-wrapper">
        <form method="POST" action="{{ route('identitas.update') }}">
        @csrf @method('put')
        <div class="content">
            <div class="row">
                <div class="col-xl-6">
                    
                    <!-- Keterangan Calon Siswa -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"><strong>Keterangan Calon Siswa</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nama Lengkap *</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', Auth::user()->name) }}">
                                            @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jenis_kelamin">Jenis Kelamin *</label>
                                            <select class="form-control select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                                                <option></option>
                                                @php $gender = ['Laki-Laki', 'Perempuan'] @endphp
                                                @foreach($gender as $g)
                                                <option value="{{ $g }}" @if($g == $identitas->jenis_kelamin || $g == old('jenis_kelamin')) selected @endif>{{ $g }}</option>
                                                @endforeach
                                            </select>
                                            @error('jenis_kelamin')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tempat_lahir">Tempat Lahir *</label>
                                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $identitas->tempat_lahir) }}">
                                            @error('tempat_lahir')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tanggal_lahir">Tanggal Lahir *</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control datetimepicker-input datepicker @error('tanggal_lahir') is-invalid @enderror" data-toggle="datetimepicker" data-target="#tanggal_lahir" id="tanggal_lahir" name="tanggal_lahir" @if($identitas->tanggal_lahir == NULL) value="{{ old('tanggal_lahir') }}" @else value="{{ old('tanggal_lahir', $identitas->tanggal_lahir->format('m/d/Y')) }}" @endif>
                                                @error('tanggal_lahir')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="agama">Agama *</label>
                                            <select class="form-control select @error('agama') is-invalid @enderror" id="agama" name="agama" value="{{ old('agama', $identitas->agama) }}">
                                                <option></option>
                                                @php $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] @endphp
                                                @foreach($agama as $a)
                                                <option value="{{ $a }}" @if($a == $identitas->agama || $a == old('agama')) selected @endif>{{ $a }}</option>
                                                @endforeach
                                            </select>
                                            @error('agama')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kewarganegaraan">Kewarganegaraan *</label>
                                            <select class="form-control select @error('kewarganegaraan') is-invalid @enderror" id="kewarganegaraan" name="kewarganegaraan" value="{{ old('kewarganegaraan', $identitas->kewarganegaraan) }}">
                                                <option></option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->langEN }}" @if($country->langEN == $identitas->kewarganegaraan || $country->langEN == old('kewarganegaraan')) selected @endif>{{ $country->langEN }}</option>
                                                @endforeach
                                            </select>
                                            @error('kewarganegaraan')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="status">Status *</label>
                                            <select class="form-control select @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status', $identitas->status) }}">
                                                <option></option>
                                                @php $status = ['Anak Kandung', 'Anak Tiri', 'Anak Angkat', 'Anak Asuh'] @endphp
                                                @foreach($status as $s)
                                                <option value="{{ $s }}" @if($s == $identitas->status || $s == old('status')) selected @endif>{{ $s }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="anak_ke">Anak Ke *</label>
                                            <input type="number" class="form-control @error('anak_ke') is-invalid @enderror" id="anak_ke" name="anak_ke" value="{{ old('anak_ke', $identitas->anak_ke) }}">
                                            @error('anak_ke')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="jumlah_saudara_kandung">Jumlah Saudara Kandung</label>
                                            <input type="number" class="form-control @error('jumlah_saudara_kandung') is-invalid @enderror" id="jumlah_saudara_kandung" name="jumlah_saudara_kandung" value="{{ old('jumlah_saudara_kandung', $identitas->jumlah_saudara_kandung) }}">
                                            @error('jumlah_saudara_kandung')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jumlah_saudara_tiri">Jumlah Saudara Tiri</label>
                                            <input type="number" class="form-control @error('jumlah_saudara_tiri') is-invalid @enderror" id="jumlah_saudara_tiri" name="jumlah_saudara_tiri" value="{{ old('identitas->jumlah_saudara_tiri', $identitas->jumlah_saudara_tiri) }}">
                                            @error('jumlah_saudara_tiri')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="keadaan_ayah">Keadaan Ayah *</label>
                                            <select class="form-control select @error('keadaan_ayah') is-invalid @enderror" id="keadaan_ayah" name="keadaan_ayah" value="{{ old('keadaan_ayah') }}">
                                                <option></option>
                                                <option value="Masih Ada" @if(old('keadaan_ayah') == 'Masih Ada' || $keluarga->nama_ayah !== NULL) selected @endif>Masih Ada</option>
                                                <option value="Sudah Meninggal" @if(old('keadaan_ayah') == 'Sudah Meninggal') selected @endif>Sudah Meninggal</option>
                                            </select>
                                            @error('keadaan_ayah')
                                            <span class="invalid-feedback">s
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="keadaan_ibu">Keadaan Ibu *</label>
                                            <select class="form-control select @error('keadaan_ibu') is-invalid @enderror" id="keadaan_ibu" name="keadaan_ibu" value="{{ old('keadaan_ibu') }}">
                                                <option></option>
                                                <option value="Masih Ada" @if(old('keadaan_ibu') == 'Masih Ada' || $keluarga->nama_ibu !== NULL) selected @endif>Masih Ada</option>
                                                <option value="Sudah Meninggal" @if(old('keadaan_ibu') == 'Sudah Meninggal') selected @endif>Sudah Meninggal</option>
                                            </select>
                                            @error('keadaan_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Keterangan Kesehatan -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"><strong>Keterangan Kesehatan</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="gol_darah">Golongan Darah *</label>
                                            <input type="text" class="form-control @error('gol_darah') is-invalid @enderror" id="gol_darah" name="gol_darah" value="{{ old('gol_darah', $identitas->gol_darah) }}">
                                            @error('gol_darah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="tinggi">Tinggi *</label>
                                            <input type="number" class="form-control @error('tinggi') is-invalid @enderror" id="tinggi" name="tinggi" value="{{ old('tinggi', $identitas->tinggi) }}">
                                            @error('tinggi')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="tinggi">Berat Badan *</label>
                                            <input type="number" class="form-control @error('berat') is-invalid @enderror" id="berat" name="berat" value="{{ old('berat', $identitas->berat) }}">
                                            @error('berat')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="penyakit">Penyakit Yang Pernah Diderita</label>
                                            <textarea class="form-control @error('penyakit') is-invalid @enderror" id="penyakit" name="penyakit">{{ old('penyakit', $identitas->penyakit) }}</textarea>
                                            @error('penyakit')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="kelainan">Kelainan Jasmani</label>
                                            <textarea class="form-control @error('kelainan') is-invalid @enderror" id="kelainan" name="kelainan">{{ old('kelainan', $identitas->kelainan) }}</textarea>
                                            @error('kelainan')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Keterangan Ayah Kandung -->
                    <div class="card @if(old('keadaan_ayah') == 'Sudah Meninggal' || $keluarga->nama_ayah == NULL) d-none @endif" id="cardAyah">
                        <div class="card-header">
                            <h6 class="card-title"><strong>Keterangan Ayah Kandung</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="nama_ayah">Nama Lengkap *</label>
                                            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $keluarga->nama_ayah) }}">
                                            @error('nama_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tempat_lahir_ayah">Tempat Lahir *</label>
                                            <input type="text" class="form-control @error('tempat_lahir_ayah') is-invalid @enderror" id="tempat_lahir_ayah" name="tempat_lahir_ayah" value="{{ old('tempat_lahir_ayah', $keluarga->tempat_lahir_ayah) }}">
                                            @error('tempat_lahir_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tanggal_lahir_ayah">Tanggal Lahir *</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control datetimepicker-input datepicker @error('tanggal_lahir_ayah') is-invalid @enderror" id="tanggal_lahir_ayah" data-toggle="datetimepicker" data-target="#tanggal_lahir_ayah" name="tanggal_lahir_ayah" @if($keluarga->tanggal_lahir_ayah == NULL) value="{{ old('tanggal_lahir_ayah') }}" @else value="{{ old('tanggal_lahir_ayah', $keluarga->tanggal_lahir_ayah->format('m/d/Y')) }}" @endif>
                                                @error('tanggal_lahir_ayah')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="agama_ayah">Agama *</label>
                                            <select class="form-control select @error('agama_ayah') is-invalid @enderror" id="agama_ayah" name="agama_ayah">
                                                <option></option>
                                                @php $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] @endphp
                                                @foreach($agama as $aa)
                                                <option value="{{ $aa }}" @if($a == $keluarga->agama_ayah || $aa == old('agama_ayah')) selected @endif>{{ $aa }}</option>
                                                @endforeach
                                            </select>
                                            @error('agama_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kewarganegaraan_ayah">Kewarganegaraan *</label>
                                            <select id="kewarganegaraan_ayah" class="form-control select @error('kewarganegaraan_ayah') is-invalid @enderror" name="kewarganegaraan_ayah">
                                                <option></option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->langEN }}" @if($country->langEN == $keluarga->kewarganegaraan_ayah || $country->langEN == old('kewarganegaraan_ayah')) selected @endif>{{ $country->langEN }}</option>
                                                @endforeach
                                            </select>
                                            @error('kewarganegaraan_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="pendidikan_ayah">Pendidikan *</label>
                                            <input type="text" class="form-control @error('pendidikan_ayah') is-invalid @enderror" id="pendidikan_ayah" name="pendidikan_ayah" value="{{ old('pendidikan_ayah', $keluarga->pendidikan_ayah) }}">
                                            @error('pendidikan_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="pekerjaan_ayah">Pekerjaan</label>
                                            <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $keluarga->pekerjaan_ayah) }}">
                                            @error('pekerjaan_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="penghasilan_ayah">Penghasilan Perbulan *</label>
                                            <input type="number" class="form-control @error('penghasilan_ayah') is-invalid @enderror" id="penghasilan_ayah" name="penghasilan_ayah" placeholder="Rp" value="{{ old('penghasilan_ayah', $keluarga->penghasilan_ayah) }}">
                                            @error('penghasilan_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="alamat_ayah">Alamat *</label>
                                            <textarea type="text" class="form-control @error('alamat_ayah') is-invalid @enderror" id="alamat_ayah" name="alamat_ayah">{{ old('alamat_ayah', $keluarga->alamat_ayah) }}</textarea>
                                            @error('alamat_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kelurahan_ayah">Desa / Kelurahan *</label>
                                            <input type="text" class="form-control @error('kelurahan_ayah') is-invalid @enderror" id="kelurahan_ayah" name="kelurahan_ayah" value="{{ old('kelurahan_ayah', $keluarga->kelurahan_ayah) }}">
                                            @error('kelurahan_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kecamatan_ayah">Kecamatan *</label>
                                            <input type="text" class="form-control @error('kecamatan_ayah') is-invalid @enderror" id="kecamatan_ayah" name="kecamatan_ayah" value="{{ old('kecamatan_ayah', $keluarga->kecamatan_ayah) }}">
                                            @error('kecamatan_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kota_ayah">Kota *</label>
                                            <input type="text" class="form-control @error('kota_ayah') is-invalid @enderror" id="kota_ayah" name="kota_ayah" value="{{ old('kota_ayah', $keluarga->kota_ayah) }}">
                                            @error('kota_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="provinsi_ayah">Provinsi *</label>
                                            <input type="text" class="form-control @error('provinsi_ayah') is-invalid @enderror" id="provinsi_ayah" name="provinsi_ayah" value="{{ old('provinsi_ayah', $keluarga->provinsi_ayah) }}">
                                            @error('provinsi_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kode_pos_ayah">Kode Pos *</label>
                                            <input type="text" class="form-control @error('kode_pos_ayah') is-invalid @enderror" id="kode_pos_ayah" name="kode_pos_ayah" value="{{ old('kode_pos_ayah', $keluarga->kode_pos_ayah) }}">
                                            @error('kode_pos_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="negara_ayah">Negara *</label>
                                            <select id="negara_ayah" class="form-control select @error('negara_ayah') is-invalid @enderror" name="negara_ayah">
                                                <option></option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->langEN }}" @if($country->langEN == $keluarga->negara_ayah || $country->langEN == old('negara_ayah')) selected @endif>{{ $country->langEN }}</option>
                                                @endforeach
                                            </select>
                                            @error('negara_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="no_handphone_ayah">Nomor Handphone *</label>
                                            <input type="number" class="form-control @error('no_handphone_ayah') is-invalid @enderror" id="no_handphone_ayah" name="no_handphone_ayah" value="{{ old('no_handphone_ayah', $keluarga->no_handphone_ayah) }}">
                                            @error('no_handphone_ayah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Keterangan Wali -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"><strong>Keterangan Wali Kandung</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="nama_wali">Nama Lengkap *</label>
                                            <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" id="nama_wali" name="nama_wali" value="{{ old('nama_wali', $keluarga->nama_wali) }}">
                                            @error('nama_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tempat_lahir_wali">Tempat Lahir *</label>
                                            <input type="text" class="form-control @error('tempat_lahir_wali') is-invalid @enderror" id="tempat_lahir_wali" name="tempat_lahir_wali" value="{{ old('tempat_lahir_wali', $keluarga->tempat_lahir_wali) }}">
                                            @error('tempat_lahir_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tanggal_lahir_wali">Tanggal Lahir *</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control datetimepicker-input datepicker @error('tanggal_lahir_wali') is-invalid @enderror" id="tanggal_lahir_wali" data-toggle="datetimepicker" data-target="#tanggal_lahir_wali" name="tanggal_lahir_wali" @if($keluarga->tanggal_lahir_wali == NULL) value="{{ old('tanggal_lahir_wali') }}" @else value="{{ old('tanggal_lahir_wali', $keluarga->tanggal_lahir_wali->format('m/d/Y')) }}" @endif>
                                                @error('tanggal_lahir_wali')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="agama_wali">Agama *</label>
                                            <select id="agama_wali" class="form-control select @error('agama_wali') is-invalid @enderror" name="agama_wali">
                                                <option></option>
                                                @php $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] @endphp
                                                @foreach($agama as $aw)
                                                <option value="{{ $aw }}" @if($aw == $keluarga->agama_wali || $aw == old('agama_wali')) selected @endif>{{ $aw }}</option>
                                                @endforeach
                                            </select>
                                            @error('agama_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kewarganegaraan_wali">Kewarganegaraan *</label>
                                            <select id="kewarganegaraan_wali" class="form-control select @error('kewarganegaraan_wali') is-invalid @enderror" name="kewarganegaraan_wali">
                                                <option></option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->langEN }}" @if($country->langEN == $keluarga->kewarganegaraan_wali || $country->langEN == old('kewarganegaraan_wali')) selected @endif>{{ $country->langEN }}</option>
                                                @endforeach
                                            </select>
                                            @error('kewarganegaraan_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="pendidikan_wali">Pendidikan *</label>
                                            <input type="text" class="form-control @error('pendidikan_wali') is-invalid @enderror" id="pendidikan_wali" name="pendidikan_wali" value="{{ old('pendidikan_wali', $keluarga->pendidikan_wali) }}">
                                            @error('pendidikan_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="pekerjaan_wali">Pekerjaan *</label>
                                            <input type="text" class="form-control @error('pekerjaan_wali') is-invalid @enderror" id="pekerjaan_wali" name="pekerjaan_wali" value="{{ old('pekerjaan_wali', $keluarga->pekerjaan_wali) }}">
                                            @error('pekerjaan_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="penghasilan_wali">Penghasilan Perbulan *</label>
                                            <input type="number" class="form-control @error('penghasilan_wali') is-invalid @enderror" id="penghasilan_wali" name="penghasilan_wali" placeholder="Rp" value="{{ old('penghasilan_wali', $keluarga->penghasilan_wali) }}">
                                            @error('penghasilan_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="alamat_wali">Alamat *</label>
                                            <textarea type="text" class="form-control @error('alamat_wali') is-invalid @enderror" id="alamat_wali" name="alamat_wali">{{ old('alamat_wali', $keluarga->alamat_wali) }}</textarea>
                                            @error('alamat_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kelurahan_wali">Desa / Kelurahan *</label>
                                            <input type="text" class="form-control @error('kelurahan_wali') is-invalid @enderror" id="kelurahan_wali" name="kelurahan_wali" value="{{ old('kelurahan_wali', $keluarga->kelurahan_wali) }}">
                                            @error('kelurahan_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kecamatan_wali">Kecamatan *</label>
                                            <input type="text" class="form-control @error('kecamatan_wali') is-invalid @enderror" id="kecamatan_wali" name="kecamatan_wali" value="{{ old('kecamatan_wali', $keluarga->kecamatan_wali) }}">
                                            @error('kecamatan_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kota_wali">Kota *</label>
                                            <input type="text" class="form-control @error('kota_wali') is-invalid @enderror" id="kota_wali" name="kota_wali" value="{{ old('kota_wali', $keluarga->kota_wali) }}">
                                            @error('kota_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="provinsi_wali">Provinsi *</label>
                                            <input type="text" class="form-control @error('provinsi_wali') is-invalid @enderror" id="provinsi_wali" name="provinsi_wali" value="{{ old('provinsi_wali', $keluarga->provinsi_wali) }}">
                                            @error('provinsi_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kode_pos_wali">Kode Pos *</label>
                                            <input type="text" class="form-control @error('kode_pos_wali') is-invalid @enderror" id="kode_pos_wali" name="kode_pos_wali" value="{{ old('kode_pos_wali', $keluarga->kode_pos_wali) }}">
                                            @error('kode_pos_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="negara_wali">Negara *</label>
                                            <select class="form-control select @error('negara_wali') is-invalid @enderror" id="negara_wali" name="negara_wali">
                                                <option></option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->langEN }}" @if($country->langEN == $keluarga->negara_wali || $country->langEN == old('negara_wali')) selected @endif>{{ $country->langEN }}</option>
                                                @endforeach
                                            </select>
                                            @error('negara_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="no_handphone_wali">Nomor Handphone *</label>
                                            <input type="number" class="form-control @error('no_handphone_wali') is-invalid @enderror" id="no_handphone_wali" name="no_handphone_wali" value="{{ old('no_handphone_wali', $keluarga->no_handphone_wali) }}">
                                            @error('no_handphone_wali')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xl-6">
                    
                    <!-- Keterangan Tempat Tinggal -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"><strong>Keterangan Tempat Tinggal</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="alamat">Alamat *</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="{{ old('alamat', $identitas->alamat) }}">
                                            @error('alamat')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kelurahan">Desa / Kelurahan *</label>
                                            <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" value="{{ old('kelurahan', $identitas->kelurahan) }}">
                                            @error('kelurahan')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kecamatan">Kecamatan *</label>
                                            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', $identitas->kecamatan) }}">
                                            @error('kecamatan')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kota">Kota *</label>
                                            <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ old('kota', $identitas->kota) }}">
                                            @error('kota')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="provinsi">Provinsi *</label>
                                            <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" value="{{ old('provinsi', $identitas->provinsi) }}">
                                            @error('provinsi')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kode_pos">Kode Pos *</label>
                                            <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos" name="kode_pos" value="{{ old('kode_pos', $identitas->kode_pos) }}">
                                            @error('kode_pos')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="negara">Negara *</label>
                                            <select id="negara" class="form-control select @error('negara') is-invalid @enderror" name="negara">
                                                <option></option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->langEN }}" @if($country->langEN == $identitas->negara || $country->langEN == old('negara')) selected @endif>{{ $country->langEN }}</option>
                                                @endforeach
                                            </select>
                                            @error('negara')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="no_handphone">Nomor Handphone *</label>
                                            <input type="number" class="form-control @error('no_handphone') is-invalid @enderror" id="no_handphone" name="no_handphone" value="{{ old('no_handphone', $identitas->no_handphone) }}">
                                            @error('no_handphone')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tinggal_dengan">Tinggal Dengan *</label>
                                            <select class="form-control select @error('tinggal_dengan') is-invalid @enderror" id="tinggal_dengan" name="tinggal_dengan">
                                                <option></option>
                                                @php $tinggal_dengan = ['Wali', 'Orang Tua'] @endphp
                                                @foreach($tinggal_dengan as $td)
                                                <option value="{{ $td }}" @if($td == old('tinggal_dengan') || $td == $identitas->tinggal_dengan) selected @endif>{{ $td }}</option>
                                                @endforeach
                                            </select>
                                            @error('tinggal_dengan')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="jarak_ke_sekolah">Jarak Rumah Dengan Sekolah</label>
                                            <input type="text" class="form-control @error('jarak_ke_sekolah') is-invalid @enderror" id="jarak_ke_sekolah" name="jarak_ke_sekolah" value="{{ old('jarak_ke_sekolah', $identitas->jarak_ke_sekolah) }}">
                                            @error('jarak_ke_sekolah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kesekolah_dengan">Ke Sekolah Dengan *</label>
                                            <select class="form-control select @error('kesekolah_dengan') is-invalid @enderror" id="kesekolah_dengan" name="kesekolah_dengan">
                                                <option></option>
                                                @php $kesekolah_dengan = ['Kendaraan Umum', 'Kendaraan Pribadi'] @endphp
                                                @foreach($kesekolah_dengan as $kd)
                                                <option value="{{ $kd }}" @if($kd == old('kesekolah_dengan') || $kd == $identitas->kesekolah_dengan) selected @endif>{{ $kd }}</option>
                                                @endforeach
                                            </select>
                                            @error('kesekolah_dengan')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Keterangan Pendidikan -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"><strong>Keterangan Pendidikan</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h6 class="text-muted">Pendidikan Sebelumnya</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="nama_sekolah">Nama Sekolah *</label>
                                            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah', $identitas->nama_sekolah) }}">
                                            @error('nama_sekolah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="alamat_sekolah">Alamat Sekolah *</label>
                                            <textarea class="form-control @error('alamat_sekolah') is-invalid @enderror" id="alamatsekolah" name="alamat_sekolah">{{ old('nama_sekolah', $identitas->nama_sekolah) }}</textarea>
                                            @error('alamat_sekolah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="no_sttb">Nomor STTB *</label>
                                            <input type="text" class="form-control @error('no_sttb') is-invalid @enderror" id="no_sttb" name="no_sttb" value="{{ old('no_sttb', $identitas->no_sttb) }}">
                                            @error('no_sttb')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lama_belajar">Lama Belajar *</label>
                                            <input type="text" class="form-control @error('lama_belajar') is-invalid @enderror" id="lama_belajar" name="lama_belajar" value="{{ old('lama_belajar', $identitas->lama_belajar) }}">
                                            @error('lama_belajar')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6 class="text-muted">Pindahan</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="dari_sekolah">Dari Sekolah</label>
                                            <input type="text" class="form-control @error('dari_sekolah') is-invalid @enderror" id="dari_sekolah" name="dari_sekolah" value="{{ old('dari_sekolah', $identitas->dari_sekolah) }}">
                                            @error('dari_sekolah')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="alasan">Alasan</label>
                                            <textarea class="form-control @error('alasan') is-invalid @enderror" id="alasan" name="alasan">{{ old('alasan', $identitas->alasan) }}</textarea>
                                            @error('alasan')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Keterangan Ibu Kandung -->
                    <div class="card @if(old('keadaan_ibu') == 'Sudah Meninggal' || $keluarga->nama_ibu == NULL) d-none @endif" id="cardIbu">
                        <div class="card-header">
                            <h6 class="card-title"><strong>Keterangan Ibu Kandung</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="nama_ibu">Nama Lengkap *</label>
                                            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $keluarga->nama_ibu) }}">
                                            @error('nama_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tempat_lahir_ibu">Tempat Lahir *</label>
                                            <input type="text" class="form-control @error('tempat_lahir_ibu') is-invalid @enderror" id="tempat_lahir_ibu" name="tempat_lahir_ibu" value="{{ old('tempat_lahir_ibu', $keluarga->tempat_lahir_ibu) }}">
                                            @error('tempat_lahir_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tanggal_lahir_ibu">Tanggal Lahir *</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control datetimepicker-input datepicker @error('tanggal_lahir_ibu') is-invalid @enderror" id="tanggal_lahir_ibu" data-toggle="datetimepicker" data-target="#tanggal_lahir_ibu" name="tanggal_lahir_ibu" @if($keluarga->tanggal_lahir_ibu == NULL) value="{{ old('tanggal_lahir_ibu') }}" @else value="{{ old('tanggal_lahir_ibu', $keluarga->tanggal_lahir_ibu->format('m/d/Y')) }}" @endif>
                                                @error('tanggal_lahir_ibu')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="agama_ibu">Agama *</label>
                                            <select class="form-control select @error('agama_ibu') is-invalid @enderror" id="agama_ibu" name="agama_ibu">
                                                <option></option>
                                                @php $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] @endphp
                                                @foreach($agama as $aa)
                                                <option value="{{ $aa }}" @if($a == $keluarga->agama_ibu || $aa == old('agama_ibu')) selected @endif>{{ $aa }}</option>
                                                @endforeach
                                            </select>
                                            @error('agama_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kewarganegaraan_ibu">Kewarganegaraan *</label>
                                            <select id="kewarganegaraan_ibu" class="form-control select @error('kewarganegaraan_ibu') is-invalid @enderror" name="kewarganegaraan_ibu">
                                                <option></option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->langEN }}" @if($country->langEN == $keluarga->kewarganegaraan_ibu || $country->langEN == old('kewarganegaraan_ibu')) selected @endif>{{ $country->langEN }}</option>
                                                @endforeach
                                            </select>
                                            @error('kewarganegaraan_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="pendidikan_ibu">Pendidikan *</label>
                                            <input type="text" class="form-control @error('pendidikan_ibu') is-invalid @enderror" id="pendidikan_ibu" name="pendidikan_ibu" value="{{ old('pendidikan_ibu', $keluarga->pendidikan_ibu) }}">
                                            @error('pendidikan_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="pekerjaan_ibu">Pekerjaan</label>
                                            <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $keluarga->pekerjaan_ibu) }}">
                                            @error('pekerjaan_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="penghasilan_ibu">Penghasilan Perbulan *</label>
                                            <input type="number" class="form-control @error('penghasilan_ibu') is-invalid @enderror" id="penghasilan_ibu" name="penghasilan_ibu" placeholder="Rp" value="{{ old('penghasilan_ibu', $keluarga->penghasilan_ibu) }}">
                                            @error('penghasilan_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="alamat_ibu">Alamat *</label>
                                            <textarea type="text" class="form-control @error('alamat_ibu') is-invalid @enderror" id="alamat_ibu" name="alamat_ibu">{{ old('alamat_ibu', $keluarga->alamat_ibu) }}</textarea>
                                            @error('alamat_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kelurahan_ibu">Desa / Kelurahan *</label>
                                            <input type="text" class="form-control @error('kelurahan_ibu') is-invalid @enderror" id="kelurahan_ibu" name="kelurahan_ibu" value="{{ old('kelurahan_ibu', $keluarga->kelurahan_ibu) }}">
                                            @error('kelurahan_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kecamatan_ibu">Kecamatan *</label>
                                            <input type="text" class="form-control @error('kecamatan_ibu') is-invalid @enderror" id="kecamatan_ibu" name="kecamatan_ibu" value="{{ old('kecamatan_ibu', $keluarga->kecamatan_ibu) }}">
                                            @error('kecamatan_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kota_ibu">Kota *</label>
                                            <input type="text" class="form-control @error('kota_ibu') is-invalid @enderror" id="kota_ibu" name="kota_ibu" value="{{ old('kota_ibu', $keluarga->kota_ibu) }}">
                                            @error('kota_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="provinsi_ibu">Provinsi *</label>
                                            <input type="text" class="form-control @error('provinsi_ibu') is-invalid @enderror" id="provinsi_ibu" name="provinsi_ibu" value="{{ old('provinsi_ibu', $keluarga->provinsi_ibu) }}">
                                            @error('provinsi_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kode_pos_ibu">Kode Pos *</label>
                                            <input type="text" class="form-control @error('kode_pos_ibu') is-invalid @enderror" id="kode_pos_ibu" name="kode_pos_ibu" value="{{ old('kode_pos_ibu', $keluarga->kode_pos_ibu) }}">
                                            @error('kode_pos_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="negara_ibu">Negara *</label>
                                            <select id="negara_ibu" class="form-control select @error('negara_ibu') is-invalid @enderror" name="negara_ibu">
                                                <option></option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->langEN }}" @if($country->langEN == $keluarga->negara_ibu || $country->langEN == old('negara_ibu')) selected @endif>{{ $country->langEN }}</option>
                                                @endforeach
                                            </select>
                                            @error('negara_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="no_handphone_ibu">Nomor Handphone *</label>
                                            <input type="number" class="form-control @error('no_handphone_ibu') is-invalid @enderror" id="no_handphone_ibu" name="no_handphone_ibu" value="{{ old('no_handphone_ibu', $keluarga->no_handphone_ibu) }}">
                                            @error('no_handphone_ibu')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Keterangan Intelegensi Dan Kegemaran -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"><strong>Keterangan Intelegensi Dan Kegemaran</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="iq">Intelegensi ( IQ )</label>
                                            <input type="number" class="form-control @error('iq') is-invalid @enderror" id="iq" name="iq" value="{{ old('iq', $identitas->iq) }}">
                                            @error('iq')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6 class="text-muted">Bakat Khusus dan Prestasi Yang Menonjol Dalam</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="kesenian">Kesenian</label>
                                            <textarea type="text" class="form-control @error('kesenian') is-invalid @enderror" id="kesenianh" name="kesenian">{{ old('kesenian', $identitas->kesenian) }}</textarea>
                                            @error('kesenian')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="olahraga">Olahraga</label>
                                            <textarea type="text" class="form-control @error('olahraga') is-invalid @enderror" id="olahraga" name="olahraga">{{ old('olahraga', $identitas->olahraga) }}</textarea>
                                            @error('olahraga')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="organisasi">Organisasi</label>
                                            <textarea type="text" class="form-control @error('organisasi') is-invalid @enderror" id="organisasi" name="organisasi">{{ old('organisasi', $identitas->organisasi) }}</textarea>
                                            @error('organisasi')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="karya">Hasil Karya / Karya Tulis</label>
                                            <textarea type="text" class="form-control @error('karya') is-invalid @enderror" id="karya" name="karya">{{ old('karya', $identitas->karya) }}</textarea>
                                            @error('karya')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Submit -->
                    <div class="card">
                        <div class="card-body text-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
