@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/media/css/jquery.dataTables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/media/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/media/css/responsive.dataTables.css') }}">

@endsection

@section('content')


<!-- Export Datatable start -->
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h5 class="text-blue">Data Table with Export Buttons</h5>
        </div>
        <div class="pull-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm scroll-click" role="button"><i class="fa fa-plus"></i> {{ __('New User') }}</a>
        </div>
    </div>
    <div class="row">
        <table class="data-table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">{{ __('ID') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ __('Updated_at') }}</th>
                    <th scope="col">{{ __('Situation') }}</th>
                    <th scope="col">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @isset($records)
                    @forelse ($records as $record)
                    <tr>
                       <td>
                            <div class="dropdown">
                                <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left">
                                    <a class="dropdown-item" href="#"><i class="fa fa-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                       <th class="table-plus">{{ $record->id }}</th>
                       <td>{{ $record->name }}</td>
                       <td>{{ $record->email }}</td>
                       <td>{{ $record->updated_at }}</td>
                       <td>Primary</span></td>
                    </tr>
                    @empty
                        <tr>
                            <p>No Record</p>
                        </tr>
                    @endforelse
                @endisset 
            </tbody>
        </table>
    </div>
</div>
<!-- Export Datatable End -->

@endsection


@section('scripts')

<script src="{{ asset('plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/media/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('plugins/datatables/media/js/dataTables.responsive.js') }}"></script>
<script src="{{ asset('plugins/datatables/media/js/responsive.bootstrap4.js') }}"></script>
<!-- buttons for Export datatable -->
<script src="{{ asset('plugins/datatables/media/js/button/dataTables.buttons.js') }}"></script>
<script src="{{ asset('plugins/datatables/media/js/button/buttons.bootstrap4.js') }}"></script>
<script src="{{ asset('plugins/datatables/media/js/button/buttons.print.js') }}"></script>
<script src="{{ asset('plugins/datatables/media/js/button/buttons.html5.js') }}"></script>
<script src="{{ asset('plugins/datatables/media/js/button/buttons.flash.js') }}"></script>
<script src="{{ asset('plugins/datatables/media/js/button/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/media/js/button/vfs_fonts.js') }}"></script>
<script>
$('document').ready(function () {
    $('.data-table').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
        "language": {
            "info": "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Search"
        }
    });
    $('.data-table-export').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
        "language": {
            "info": "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Search"
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'pdf', 'print', 'excel'
        ]
    });
    var table = $('.select-row').DataTable();
    $('.select-row tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
    var multipletable = $('.multiple-select-row').DataTable();
    $('.multiple-select-row tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
    });
});
</script>
@endsection
