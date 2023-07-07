@extends('backend.layout')

@section('title')
    | Order
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">order</li>
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
                        </div>
                        <div class="card-body table-responsive">
                            <table id="MenuTable" class="table table-bordered">
                                <thead class="table-dark text-nowrap">
                                    <tr>
                                        <th>Nama Pemesan</th>
                                        <th>Meja</th>
                                        <th>Pesanan</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $key => $data)
                                        <tr class="text-center">
                                            <td>{{ $data->nama }}</td>
                                            <td>Meja {{ $data->meja }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                                                    data-target="#cek{{ $data->id }}">
                                                    Lihat
                                                </button>
                                            </td>
                                            <td>{{ $data->total }}</td>
                                            <td>
                                                @if ($data->status == 'Belum Bayar')
                                                    <span class="badge badge-danger">Belum Bayar</span>
                                                @elseif ($data->status == 'Sudah Bayar')
                                                    <span class="badge badge-success">Sudah Bayar</span>
                                                @else
                                                    <span class="badge badge-warning">Proses</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $data->created_at }}
                                            </td>
                                            <td>
                                                @if ($data->status == 'Sudah Bayar')
                                                    <button class="btn btn-success" disabled>Bayar
                                                    </button>
                                                @else
                                                    <button class="btn btn-success"
                                                        onclick="MenuHabis({{ $data->id }})">Bayar
                                                    </button>
                                                    <form id="habis-form-{{ $data->id }}"
                                                        action="{{ route('order.show', $data->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                @endif
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

    @foreach ($order as $data)
        <!-- Modal -->
        <div class="modal fade" id="cek{{ $data->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 text-left">
                                <h5>Menu</h5>
                            </div>
                            <div class="col-6 text-left">
                                <h5>Jumlah</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-left">
                                <h4>{{ $data->menu }}</h4>
                            </div>
                            <div class="col-6 text-left">
                                <h4>{{ $data->jumlah }}</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 text-left">
                                <h3>Total: {{ $data->total }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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

        function MenuHabis(id) {
            Swal.fire({
                title: 'Apakah pelanggan sudah bayar?',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Sudah'
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
