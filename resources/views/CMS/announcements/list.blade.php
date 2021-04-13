@extends('CMS.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
@section('css')
    <style>
        thead tr th{
            text-align: center;
        }
        tbody td{
            color: white;
        }
    </style>
@endsection
@section('title')Announcements List
@endsection
@section('content')
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table id="questions" class="table table-borderless datatable table-striped table-earning">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Slug</th>
                            <th>Img-Path</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Detail</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <script id="script">
        table = $('#questions').DataTable({
            order: [
                [0,'ASC']
            ],
            processing: true,
            serverSide: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Turkish.json"
            },
            ajax:"{!! route('announcements_list2')!!}", //hangi kontrollerden gelecek
            columns: [
                {data: 'id'},
                {data: 'title'},
                {data: 'content'},
                {data: 'slug'},
                {data: 'img_path'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'Detail'},
                {data: 'Update'},
                {data: 'Delete'}
            ]
        });
    </script>
@endsection
