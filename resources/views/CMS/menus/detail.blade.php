@extends('CMS.master')
@section('css')
    <style>
        #tablo tr td a {
            color: red;
        }
        #tablo tr td  {
            color: gray;
            background-color: #3c4858;
        }
    </style>
@endsection
@section('title')Menu Detail
@endsection
@section('content')
<center style="margin-top: 50px">
    <table id="tablo" class="table table-striped table-bordered" style="width:50%">
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Slug</th>
            <th>Is-Deleted</th>
            <th>Menu Id</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>{{$menus -> title}}</td>
            <td>{{$menus -> content}}</td>
            <td>{{$menus -> slug}}</td>
            <td>{{$menus -> is_deleted}}</td>
            <td>{{$menus -> id}}</td>
        </tr>
        </tbody>
</table>
</center>
@endsection
