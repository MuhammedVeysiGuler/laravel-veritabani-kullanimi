@extends('CMS.master')
@section('css')
    <style>
        #tablo tr td a {
            color: #ff0000;
        }
        #tablo tr td  {
            color: gray;
            background-color: #3c4858;
        }
    </style>
@endsection
@section('title')News Detail
@endsection
@section('content')
    <center style="margin-top: 50px">

<table id="tablo" class="table table-striped table-bordered" style="width:50%">
    <tr>
        <td>Title</td>
        <td>Content</td>
        <td>slug</td>
        <td>is_deleted</td>
        <td>img_path</td>
    </tr>

    <tr>
        <td>{{$news -> title}}</td>
        <td>{{$news -> content}}</td>
        <td>{{$news -> slug}}</td>
        <td>{{$news -> is_deleted}}</td>
        <td><a href="{{route('new_download',$news->img_path)}}">{{$news -> img_path}}</a></td>
    </tr>
</table>

@endsection
