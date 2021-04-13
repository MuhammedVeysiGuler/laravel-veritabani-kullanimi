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
@section('title')Announcements Detail
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
                <th>Img-Path</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>{{$announcements -> title}}</td>
                <td>{{$announcements -> content}}</td>
                <td>{{$announcements -> slug}}</td>
                <td>{{$announcements -> is_deleted}}</td>
                <td><a href="{{route('announcement_download',$announcements->img_path)}}">{{$announcements -> img_path}}</a></td>
            </tr>
            </tbody>
        </table>
</center>

@endsection
