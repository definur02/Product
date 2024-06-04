@extends('layout.template')

@section('title','List Jenis')
@section('page','Jenis')

@section('page-styles')
<link rel="stylesheet" href="{{ asset('dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('contents')

@include('layout.partials.breadcrumb')

<div class="card card-body">
    <div class="row">
        <div class="col-md-4 col-xl-3">
        </div>
        <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
            <a href="{{ route('master.jenis.create') }}" id="btn-add-contact" class="btn btn-info d-flex align-items-center">
                <i class="ti ti-plus text-white me-1 fs-5"></i> Tambah Jenis
            </a>
        </div>
    </div>
</div>
<section class="datatables">
    <div class="card">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table border table-bordered text-nowrap" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('page-scripts')
<script src="{{ asset('dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/js/datatable/datatable-basic.init.js') }}"></script>

<script>
    $(function () {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '{{ route('master.jenis.index') }}',
                data: function (d) {
                    // d.company_id = $('#company_id').val();
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('.searchDT').on('change', function () {
            table.draw();
        });
    });
</script>
@endsection