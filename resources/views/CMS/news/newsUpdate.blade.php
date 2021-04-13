@extends('CMS.master')
@section('css')
    <style>
        .asd{
            color: white;
        }
        table{
            color: pink;
        }
    </style>
@endsection
@section('title')News Update
@endsection
@section('content')
    <center style="margin-top: 50px;">

<form action="{{route('news_update' , $news -> id)}}" method="post">
    @csrf
    <table>
        <div class="input-group mb-3" style="width: 50%">
            <p>Title:</p>
            <input type="text"  name="title" class="form-control" value={{$news->title}}  aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3" style="width: 50%">
            <p>Content: </p>
            <input type="text"  name="newscontent" class="form-control" value="{{$news->content}}"  aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3" style="width: 50%">
            <p>Img_Path: </p>
            <input type="file"  name="img_path" class="form-control" value={{$news->img_path}}  aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3" style="width: 50%">
            <p>Slug: </p>
            <input type="text"  name="slug" class="form-control" value={{$news->slug}}  aria-describedby="basic-addon2">
        </div>

        <td><button type="submit" class="btn btn-outline-success">Update</button></td>

    </table>
</form>
    </center>

@endsection
