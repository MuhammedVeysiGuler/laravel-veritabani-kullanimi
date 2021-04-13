@extends('CMS.master')
@section('css')
    <style>
        table {
            color: pink;
        }
        p{
            color: pink;
        }

    </style>
@endsection
@section('title')Announcements Update
@endsection
@section('content')
    <center style="margin-top: 50px;">
<form action="{{route('announcements_update' , $announcements -> id)}}" method="post">
    @csrf
    <table>

        <div class="input-group mb-3" style="width: 50%">
            <p>Title:</p>
            <input type="text"  name="title" class="form-control" value={{$announcements->title}}  aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3" style="width: 50%">
            <p>Content: </p>
           <input type="text"  name="announcementscontent" class="form-control" value="{{$announcements->content}}"  aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3" style="width: 50%">
            <p>Img_Path: </p>
            <input type="file"  name="img_path" class="form-control" value={{$announcements->img_path}}  aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3" style="width: 50%">
            <p>Slug: </p>
            <input type="text"  name="slug" class="form-control" value={{$announcements->slug}}  aria-describedby="basic-addon2">
        </div>

        <td><button type="submit" class="btn btn-outline-success">Update</button></td>

    </table>
</form>
    </center>
@endsection
