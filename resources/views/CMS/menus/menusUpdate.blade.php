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
@section('title')Menu Update
@endsection
@section('content')
    <center style="margin-top: 50px;">

<form action="{{route('menus_update' , $menus -> id)}}" method="post">
    @csrf
    <table>
        <div class="input-group mb-3" style="width: 50%">
            <p>Title:</p>
            <input type="text"  name="title" class="form-control" value={{$menus->title}}  aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3" style="width: 50%">
            <p>Content: </p>
            <input type="text"  name="menuscontent" class="form-control" value="{{$menus->content}}"  aria-describedby="basic-addon2">
        </div>


        <div class="input-group mb-3" style="width: 50%">
            <p>Slug: </p>
            <input type="text"  name="slug" class="form-control" value={{$menus->slug}}  aria-describedby="basic-addon2">
        </div>

        <td><button type="submit" class="btn btn-outline-success">Update</button></td>

    </table>
    </form>
    </center>
@endsection
