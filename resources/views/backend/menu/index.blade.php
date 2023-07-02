@extends('backend.layout')

@section('title')
    | Daftar Menu
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/toastr/toastr.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/daterangepicker/daterangepicker.css') }}">
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Menu</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Daftar Menu</li>
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
                        <div class="card-header border-0">
                            <a href="{{ route('dashboard') }}" class="btn-sm btn-secondary best-rounded"><i
                                    class="fa-solid fa-arrow-left"></i>
                                Kembali</a>
                            <a href="{{ route('menu.create') }}"
                                class="btn btn-sm btn-outline-secondary float-md-right best-rounded"><i
                                    class="fa-solid fa-plus"></i> Buat Menu</a>
                        </div>
                        <div class="card-body table-responsive">
                            {{-- <form action="{{ route('menu.index') }}">
                                <div class="col-md-4 pb-2">
                                    <label>Filter Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="filter_tanggal"
                                            name="filter_tanggal" value="{{ request('filter_tanggal') }}">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-outline-secondary ">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <hr> --}}
                            <table id="MenuTable" class="table table-bordered text-sm">
                                <thead class="table-dark text-nowrap">
                                    <tr>
                                        <th>Nama Menu</th>
                                        <th>Deskripsi</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menu as $key => $data)
                                        <tr class="text-center">
                                            <td>
                                                {{ $data->nama }}
                                            </td>
                                            <td>
                                                {{ $data->deskripsi }}
                                            </td>
                                            <td>
                                                @if ($data->kategori == 'Makanan')
                                                    <span class="badge badge-secondary">Makanan</span>
                                                @elseif ($data->kategori == 'Minuman')
                                                    <span class="badge badge-secondary">Minuman</span>
                                                @else
                                                    <span class="badge badge-secondary">Lainnya</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ formatRupiah($data->harga) }}
                                            </td>
                                            <td>
                                                @if ($data->status == 'online')
                                                    <span class="badge badge-success">Online</span>
                                                @elseif ($data->status == 'habis')
                                                    <span class="badge badge-warning">Habis</span>
                                                @else
                                                    <span class="badge badge-danger">Offline</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('menu.edit', $data->id) }}" target="_blank"
                                                    class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>

                                                <button class="btn btn-warning" onclick="MenuHabis({{ $data->id }})"><i
                                                        class="fa-solid fa-box-open"></i>
                                                </button>
                                                <form id="habis-form-{{ $data->id }}"
                                                    action="{{ route('menu.habis', $data->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <button class="btn btn-danger" onclick="HapusMenu({{ $data->id }})"><i
                                                        class="fa-solid fa-trash-can"></i>
                                                </button>
                                                <form id="delete-form-{{ $data->id }}"
                                                    action="{{ route('menu.destroy', $data->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('assets/adminLTE/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script type="text/javascript">
        $('#MenuTable').DataTable({
            "language": {
                "infoFiltered": "",
                "decimal": "",
                "emptyTable": "Tak ada data yang tersedia pada tabel ini",
                "info": "Tampil _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Tampil 0 sampai 0 dari 0 baris",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "loadingRecords": "memuat...",
                "processing": "",
                "search": "Pencarian:",
                "zeroRecords": "Tidak ada catatan yang cocok ditemukan",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                },
                "aria": {
                    "sortAscending": ": aktifkan untuk mengurutkan kolom naik",
                    "sortDescending": ": aktifkan untuk mengurutkan kolom menurun"
                }
            },
            "paging": true,
            'processing': true,
            // "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            // "autoWidth": true,
            // "scrollX": true,
            // width: "700px",
            "responsive": true,
        }).buttons().container().appendTo('#MenuTable_wrapper .col-md-6:eq(0)');

        //Date range picker
        $('#filter_tanggal').daterangepicker({
            "locale": {
                "format": "MM/DD/YYYY",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Su",
                    "Mo",
                    "Tu",
                    "We",
                    "Th",
                    "Fr",
                    "Sa"
                ],
                "monthNames": [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                "firstDay": 1
            }
        })

        function HapusMenu(id) {
            Swal.fire({
                title: 'Menu akan dihapus?',
                text: "Bila sudah dihapus, data tidak dapat kembali!",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe !',
                        'error'
                    )
                }
            })
        }

        function MenuHabis(id) {
            Swal.fire({
                title: 'Apakah Stock Menu Habis?',
                // text: "Bila sudah dihapus, data tidak dapat kembali!",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Habis'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('habis-form-' + id).submit();
                } else if (
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe !',
                        'error'
                    )
                }
            })
        }
        @if (session('pesan'))
            @switch(session('level-alert'))
                @case('alert-success')
                toastr.success("{{ Session::get('pesan') }}", 'Success');
                @break

                @case('alert-danger')
                toastr.error("{{ Session::get('pesan') }}", 'Warning');
                @break

                @default
                toastr.info('test', 'info');
            @endswitch
        @endif
    </script>
@endpush
