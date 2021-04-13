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
@section('title')Sub-Menu Detail
@endsection
@section('content')
    <center style="margin-top: 50px">
<table id="tablo" class="table table-striped table-bordered" style="width:50%">
    <thead>
    <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Is-Deleted</th>
        <th>Menu Id</th>
    </tr>
    </thead>

    <tr>
        {{--<td>{{$menus -> title}}</td>--}}
        <td>{{$submenus -> title}}</td>
        <td>{{$submenus -> content}}</td>
        <td>{{$submenus -> is_deleted}}</td>
        <td>{{$submenus -> menu_id}}</td>
    </tr>
</table>
    </center>

@endsection
