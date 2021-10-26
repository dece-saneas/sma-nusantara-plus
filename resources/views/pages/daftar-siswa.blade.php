@extends('layouts.app')

@section('modal')
<div class="modal fade" id="PreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="Preview Berkas" class="img-fluid" id="img">
                <form method="POST" action="{{ route('berkas.invalid') }}">
                @csrf @method('put')
                <div class="input-group mt-2">
                    <input type="text" value="" id="type" class="d-none" name="type">
                    <input type="text" value="" id="id" class="d-none" name="id">
                    <textarea class="form-control @error('note') is-invalid @enderror" id="notes" rows="1" placeholder="Notes" name="note"></textarea>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-light btn-block"><i class="fas fa-paper-plane mr-2"></i>Kirim</button>
                    </div>
                    @error('note')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </form>
                <a href="" class="btn btn-success btn-block mt-2" id="valid"><i class="fas fa-check mr-2"></i>Verifikasi</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/select.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select-bootstrap4.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/select.min.js') }}"></script>
<script>
// Preview
$('#PreviewModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var img = button.data('img')
    var type = button.data('type')
    var id = button.data('id')
    var valid = button.data('valid')
    
    $("#img").attr("src", img);
    $("#type").attr("value", type);
    $("#id").attr("value", id);
    $("#valid").attr("href", valid);
})

$( "#filter-year" ).change(function() {
    var year = $(this).val();
    
    window.location = "{{ route('daftar.siswa') }}?year="+year;
});
</script>
@endsection

@section('content')
<div class="page-content">
    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-end">
                                <div class="col-2">
                                    <select class="form-control select " id="filter-year" name="year" width=>
                                    <option disabled>Pilih tahun ajaran</option>
                                        <option value="2019" @if( request()->get('year') == '2019') selected @elseif( request()->get('year') == null && Carbon\Carbon::now()->year == '2019')  selected @endif>2019</option>
                                        <option value="2021" @if( request()->get('year') == '2021') selected @elseif(  request()->get('year') == null && Carbon\Carbon::now()->year == '2021')  selected  @endif>2021</option>
                                        <option value="2022" @if( request()->get('year') == '2022') selected @elseif(  request()->get('year') == null && Carbon\Carbon::now()->year == '2022')  selected  @endif>2022</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-menunggu-verifikasi-tab" data-toggle="tab" href="#nav-menunggu-verifikasi" role="tab" aria-controls="nav-menunggu-verifikasi" aria-selected="false">Menunggu Verifikasi <span class="badge badge-primary ml-2">{{ count($unverified) }}</span></a>
                                    <a class="nav-item nav-link" id="nav-semua-tab" data-toggle="tab" href="#nav-semua" role="tab" aria-controls="nav-home" aria-selected="true">Semua <span class="badge badge-primary ml-2">{{ count($siswa) }}</span></a>
                                    <a class="nav-item nav-link" id="nav-verified-tab" data-toggle="tab" href="#nav-verified" role="tab" aria-controls="nav-verified" aria-selected="false">Terverifikasi <span class="badge badge-primary ml-2">{{ count($verified) }}</span></a>
                                </div>
                            </nav>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade" id="nav-semua" role="tabpanel" aria-labelledby="nav-semua-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="p-1 text-center">No</th>
                                                    <th class="p-1 text-center">No Pendaftaran</th>
                                                    <th class="text-center">Nama Lengkap</th>
                                                    <th class="text-center">Asal Sekolah</th>
                                                    <th class="text-center" rowspan="2">Status</th>
                                                    <th rowspan="2" class="text-center"><i class="icon-more2"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($siswa) > 0)
                                                @foreach($siswa as $no => $u)
                                                <tr>
                                                    <td class="text-center">{{ $no+1+(($siswa->currentPage()-1)*20) }}</td>
                                                    <td class="text-center">{{ $u->no_registration }}</td>
                                                    <td class="text-center">{{ $u->name }}</td>
                                                    <td class="text-center">@if($u->status == 'Isi Identitas' || $u->status == NULL) <span class="badge badge-pill badge-light px-2">Belum di Isi</span> @else {{ $u->identitas->nama_sekolah }} @endif</td>
                                                    <td class="text-center"><span class="badge @if($u->status == 'Verified') badge-primary @else badge-light @endif">@if($u->status == NULL) Pilih Gelombang @else {{ $u->status }} @endif</span></td>
                                                    <td class="text-center"><a href="{{ route('download.datasiswa', $u->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-print mr-2"></i>Print</a></td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="7" class="text-center">Belum ada calon siswa</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-2">
                                    {{ $siswa->links('layouts.pagination') }}
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="nav-menunggu-verifikasi" role="tabpanel" aria-labelledby="nav-menunggu-verifikasi-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="p-1 text-center" rowspan="2">No</th>
                                                    <th class="p-1 text-center" rowspan="2">No Pendaftaran</th>
                                                    <th class="text-center" rowspan="2">Nama Lengkap</th>
                                                    <th class="text-center" rowspan="2">Asal Sekolah</th>
                                                    <th class="text-center" colspan="3">Berkas</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">Photo</th>
                                                    <th class="text-center">Surat Ket Sehat</th>
                                                    <th class="text-center">Bukti Pembayaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($unverified) > 0)
                                                @foreach($unverified as $no => $u)
                                                <tr>
                                                <td class="text-center">{{ $no+1+(($unverified->currentPage()-1)*20) }}</td>
                                                <td class="text-center">{{ $u->user->no_registration }}</td>
                                                <td class="text-center">{{ $u->user->name }}</td>
                                                <td class="text-center">{{ $u->user->identitas->nama_sekolah }}</td>
                                                <td class="text-center">
                                                @if($u->photo == NULL)
                                                <button class="btn btn-sm" disabled><i class="fas fa-times mr-2"></i>Belum ada Berkas</button>
                                                @elseif($u->photo_status == 'Terverifikasi')
                                                <button class="btn btn-sm btn-primary" disabled><i class="fas fa-check mr-2"></i>Terverifikasi</button>
                                                @else
                                                <button class="btn btn-sm" data-toggle="modal" data-target="#PreviewModal" data-img="{{ asset('img/berkas/'.$u->photo) }}" data-type="photo" data-id="{{ $u->id }}" data-valid="{{ route('berkas.valid',[$u->id, 'photo']) }}"><i class="fas fa-search-plus mr-2"></i>Preview</button>
                                                @endif
                                                </td>
                                                <td class="text-center">
                                                @if($u->surat_ket_sehat == NULL)
                                                <button class="btn btn-sm" disabled><i class="fas fa-times mr-2"></i>Belum ada Berkas</button>
                                                @elseif($u->surat_ket_sehat_status == 'Terverifikasi')
                                                <button class="btn btn-sm btn-primary" disabled><i class="fas fa-check mr-2"></i>Terverifikasi</button>
                                                @else
                                                <button class="btn btn-sm" data-toggle="modal" data-target="#PreviewModal" data-img="{{ asset('img/berkas/'.$u->surat_ket_sehat) }}" data-type="sehat" data-id="{{ $u->id }}" data-valid="{{ route('berkas.valid',[$u->id, 'sehat']) }}"><i class="fas fa-search-plus mr-2"></i>Preview</button>
                                                @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($u->payment == NULL)
                                                    <button class="btn btn-sm" disabled><i class="fas fa-times mr-2"></i>Belum ada Berkas</button>
                                                    @elseif($u->payment_status == 'Terverifikasi')
                                                    <button class="btn btn-sm btn-primary" disabled><i class="fas fa-check mr-2"></i>Terverifikasi</button>
                                                    @else
                                                    <button class="btn btn-sm" data-toggle="modal" data-target="#PreviewModal" data-img="{{ asset('img/berkas/'.$u->payment) }}" data-type="payment" data-id="{{ $u->id }}" data-valid="{{ route('berkas.valid',[$u->id, 'payment']) }}"><i class="fas fa-search-plus mr-2"></i>Preview</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="7" class="text-center">Belum ada permintaan verifikasi</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-2">
                                    {{ $unverified->links('layouts.pagination') }}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-verified" role="tabpanel" aria-labelledby="nav-verified-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="p-1 text-center">No</th>
                                                    <th class="p-1 text-center">No Pendaftaran</th>
                                                    <th class="text-center">Nama Lengkap</th>
                                                    <th class="text-center">Asal Sekolah</th>
                                                    <th class="text-center" rowspan="2">Status</th>
                                                    <th rowspan="2" class="text-center"><i class="icon-more2"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($verified) > 0)
                                                @foreach($verified as $no => $u)
                                                <tr>
                                                    <td class="text-center">{{ $no+1+(($verified->currentPage()-1)*20) }}</td>
                                                    <td class="text-center">{{ $u->no_registration }}</td>
                                                    <td class="text-center">{{ $u->name }}</td>
                                                    <td class="text-center">@if($u->status == 'Isi Identitas') <span class="badge badge-pill badge-light px-2">Belum di Isi</span> @else {{ $u->identitas->nama_sekolah }} @endif</td>
                                                    <td class="text-center"><span class="badge @if($u->status == 'Verified') badge-primary @else badge-light @endif">{{ $u->status }}</span></td>
                                                    <td class="text-center"><button class="btn btn-primary btn-sm"><i class="fas fa-print mr-2"></i>Print</button></td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="7" class="text-center">Belum ada siswa yang Terverifikasi</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-2">
                                    {{ $verified->links('layouts.pagination') }}
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
