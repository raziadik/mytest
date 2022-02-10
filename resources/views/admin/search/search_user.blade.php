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
            <th>Логин</th>
            <th>Email</th>
            <th>Хэш</th>
            <th>Статус</th>
            <th>Роль</th>
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
    $(function () {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('students.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'hash', name: 'hash'},
                {data: 'status', name: 'status'},
                {data: 'role', name: 'role'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: true, searchable: true},
            ]
        });

    });
</script>
@endsection
