@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/select.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/select.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
$("#period").each(function() {    
    $(this).datepicker('setDate', $(this).val());
});
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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <form method="POST" action="{{ route('gelombang.update', $gelombang->id) }}">
                                     @csrf @method('put')
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="name">Nama Gelombang</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Gelombang I" name="name" value="{{ $gelombang->name }}">
                                                @error('name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="qty">Kuota</label>
                                                <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" placeholder="0" name="qty" value="{{ $gelombang->total_quota }}">
                                                @error('qty')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="fee">Biaya Pendaftaran</label>
                                                <input type="number" class="form-control @error('fee') is-invalid @enderror" id="fee" placeholder="Rp" name="fee" value="{{ $gelombang->fee }}">
                                                @error('fee')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="period">Periode</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input id="period" type="text" class="form-control @error('period') is-invalid @enderror" placeholder="Pilih Periode" name="period" value="{{ $gelombang->start_period->format('d F Y') }} s/d {{ $gelombang->end_period->format('d F Y') }}">
                                                </div>
                                                @error('period')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exam">Tanggal Ujian</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input id="exam" type="text" class="form-control @error('exam') is-invalid @enderror" placeholder="Pilih Tanggal Ujian" name="exam" value="{{ $gelombang->start_exam->format('d F Y - H:i:s') }} s/d {{ $gelombang->end_exam->format('d F Y - H:i:s') }}">
                                                </div>
                                                @error('exam')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan</button>
                                        </div>
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
@endsection
