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
                <form method="POST" id="DeleteForm"> 
                    <button class="btn btn-sm btn-light mx-1 px-4" data-dismiss="modal" aria-label="Close">Cancel</button> 
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-sm btn-danger mx-1 px-4">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="UploadModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="{{ route('upload.excel') }}" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file">
                        <label class="custom-file-label" for="file" aria-describedby="file">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </div>
                </div>
                @error('file')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="{{ route('soal.store') }}">
                @csrf
                    <div class="form-group">
                        <label for="key">Kategori</label>
                        <select class="form-control select" id="category" name="category">
                        <option value="BHS">Bahasa Indonesia</option>
                        <option value="ING">Bahasa Inggris</option>
                        <option value="MTK">Matematika</option>
                        <option value="IPA">IPA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <textarea class="form-control summernote" id="soal" name="soal"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="jawaban-a">Jawaban A</label>
                            <textarea class="form-control summernote" id="jawaban-a" name="a"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="jawaban-b">Jawaban B</label>
                            <textarea class="form-control summernote" id="jawaban-b" name="b"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="jawaban-c">Jawaban C</label>
                            <textarea class="form-control summernote" id="jawaban-c" name="c"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="jawaban-d">Jawaban D</label>
                            <textarea class="form-control summernote" id="jawaban-d" name="d"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="key">Kunci Jawaban</label>
                        <select class="form-control select" id="key" name="key">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" id="updateForm">
                @csrf @method('PUT')
                    <div class="form-group">
                        <label for="key">Kategori</label>
                        <select class="form-control select" id="category" name="category">
                        <option value="BHS">Bahasa Indonesia</option>
                        <option value="ING">Bahasa Inggris</option>
                        <option value="MTK">Matematika</option>
                        <option value="IPA">IPA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <textarea class="form-control summernote" id="soal" name="soal"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="jawaban-a">Jawaban A</label>
                            <textarea class="form-control summernote" id="jawaban-a" name="a"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="jawaban-b">Jawaban B</label>
                            <textarea class="form-control summernote" id="jawaban-b" name="b"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="jawaban-c">Jawaban C</label>
                            <textarea class="form-control summernote" id="jawaban-c" name="c"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="jawaban-d">Jawaban D</label>
                            <textarea class="form-control summernote" id="jawaban-d" name="d"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="key">Kunci Jawaban</label>
                        <select class="form-control select" id="key" name="key">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<link href="{{ asset('css/summernote-bs4.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/select.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select-bootstrap4.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('js/select.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('.summernote').summernote();
});

// Modal Confirm Delete
$('#EditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this)
    var soal = button.data('soal')
    var a = button.data('a')
    var b = button.data('b')
    var c = button.data('c')
    var d = button.data('d')
    var key = button.data('key')
    var category = button.data('category')
    var uri = button.data('uri')
    
    modal.find('#soal').summernote("code", soal);
    modal.find('#jawaban-a').summernote("code", a);
    modal.find('#jawaban-b').summernote("code", b);
    modal.find('#jawaban-c').summernote("code", c);
    modal.find('#jawaban-d').summernote("code", d);

    modal.find("#key").val(key).change();
    modal.find("#category").val(category).change();
    $("#updateForm").attr("action", uri);
})
</script>
@endsection

@section('content')
<div class="page-content">
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header header-elements-inline justify-content-between">
                            <h5 class="card-title">Daftar Soal</h5>
                            <div class="div">
                                <div class="btn-group mr-2" role="group" aria-label="Basic example">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#UploadModal"><i class="fas fa-file-upload mr-2"></i>Upload Excel</button>
                                    <a href="{{ route('download.excel') }}" class="btn btn-primary"> <i class="fas fa-file-download mr-2"></i>Download Template</a>
                                </div>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#CreateModal"><i class="fas fa-plus mr-2"></i>Buat Soal</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="5%">No</th>
                                                    <th class="p-1 text-center" width="85%">Soal</th>
                                                    <th class="text-center" width="10%"><i class="icon-more2"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($soal as $no => $s)
                                                <tr>
                                                    <td class="text-center" width="5%">{{ ($no+1)+(($soal->currentPage()-1)*10) }}</td>
                                                    <td>
                                                        {!! $s->soal !!} <br>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                @if($s->key == "A") <span class="badge badge-primary"><strong>A</strong></span> @else <span class="badge badge-light"><strong>A</strong></span> @endif {!! $s->a !!}
                                                            </div>
                                                            <div class="col-6">
                                                                @if($s->key == "B") <span class="badge badge-primary"><strong>B</strong></span> @else <span class="badge badge-light"><strong>B</strong></span> @endif {!! $s->b !!}
                                                            </div>
                                                            <div class="col-6">
                                                                @if($s->key == "C") <span class="badge badge-primary"><strong>C</strong></span> @else <span class="badge badge-light"><strong>C</strong></span> @endif {!! $s->c !!}
                                                            </div>
                                                            <div class="col-6">
                                                                @if($s->key == "D") <span class="badge badge-primary"><strong>D</strong></span> @else <span class="badge badge-light"><strong>D</strong></span> @endif {!! $s->d !!}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#EditModal" data-uri="{{ route('soal.update', $s->id) }}" data-soal="{{ $s->soal }}" data-a="{{ $s->a }}" data-b="{{ $s->b }}" data-c="{{ $s->c }}" data-d="{{ $s->d }}" data-key="{{ $s->key }}" data-category="{{ $s->category }}"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#DeleteModal" data-uri="{{ route('soal.destroy', $s->id) }}"><i class="fas fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-2">
                                    {{ $soal->links('layouts.pagination') }}
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
