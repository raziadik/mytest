@extends('layouts.admin')

@section('content')


    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <body>
    <div class="table-responsive">
        <table class="table table-sm table-bordered yajra-datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>id контакта</th>
                <th>id профиля</th>
                <th>Линк кнопки</th>
                <th>Текст кнопки</th>
                <th>Slug</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.noConflict();

            $('.yajra-datatable').DataTable({
                ajax: '{{ route('search.contacts') }}',
                serverSide: true,
                processing: true,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'contact_id', name: 'contact_id'},
                    {data: 'profile_id', name: 'profile_id'},
                    {data: 'link', name: 'link'},
                    {data: 'text', name: 'text'},
                    {data: 'slug', name: 'slug'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: true, searchable: true}
                ]
            });
        })

    </script>
@endsection
