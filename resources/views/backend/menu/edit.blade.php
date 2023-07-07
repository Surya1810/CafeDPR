@extends('backend.layout')

@section('title')
    | Buat Menu
@endsection

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Menu</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('menu.index') }}">Menu</a></li>
                        <li class="breadcrumb-item active">Buat Menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card best-rounded">
                        <form id="form" method="POST" action="{{ route('menu.update', $data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Menu</label>
                                            <input type="text" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                value="{{ $data->nama }}" autocomplete="off" required>
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tipe</label>
                                            <select class="form-control kategori @error('kategori') is-invalid @enderror"
                                                id="kategori" name="kategori" required>
                                                <option></option>
                                                <option value="Makanan" @selected($data->kategori == 'Makanan')>Makanan</option>
                                                <option value="Minuman" @selected($data->kategori == 'Minuman')>Minuman</option>
                                                <option value="Special" @selected($data->kategori == 'Special')>Special</option>
                                            </select>
                                            @error('kategori')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="foto">Foto Produk</label>
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('file') is-invalid @enderror"
                                                    id="foto" name="foto" accept="image/*">
                                                <label class="custom-file-label" for="foto">{{ $data->foto }}</label>
                                            </div>
                                            @error('foto')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-danger">*Format image only</small><small></small>
                                        </div>
                                        {{-- @if ($data->foto)
                                            <div class="mb-2 previewImage" id="previewImage-0">
                                                <img id="preview-image-before-upload-0" class="preview-image-before-upload"
                                                    src="{{ asset('storage/' . $data->foto) }}" alt="preview image"
                                                    style="max-height: 250px;">
                                            </div>
                                        @endif --}}
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="harga" class="col-md-2">Harga</label>
                                            <input type="text" name="harga" class="price form-control" id="harga"
                                                placeholder="Masukan Nominal Harga" autocomplete="off"
                                                value="{{ $data->harga }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi Menu</label>
                                            <textarea required style="width: 100%; height: 100px" name="deskripsi" id="deskripsi">{{ $data->deskripsi }}</textarea>
                                            @error('deskripsi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer best-rounded">
                                <a href="{{ route('menu.index') }}" class="btn btn-secondary best-rounded">Kembali</a>
                                <button type="submit" class="btn btn-warning best-rounded float-right">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Page specific script -->
    <!-- Select2 -->
    <script src="{{ asset('assets/adminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $('.price').inputmask({
                alias: 'numeric',
                prefix: 'Rp',
                digits: 0,
                groupSeparator: '.',
                autoGroup: true,
                removeMaskOnSubmit: true,
                rightAlign: false
            });
        })

        $(function() {
            $('.kategori').select2({
                placeholder: "Pilih Kategori",
                theme: 'bootstrap4'
            })
        })

        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
@endpush
