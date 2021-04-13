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
@section('title')Sub-Menu Update
@endsection
@section('content')
    <center style="margin-top: 50px;">
<form action="{{route('submenus_update' , $submenus -> id)}}" method="post">
    @csrf
    <table>
        <div class="input-group mb-3" style="width: 50%">
            <p>Title:</p>
            <input type="text"  name="title" class="form-control" value={{$submenus->title}}  aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3" style="width: 50%">
            <p>Content: </p>
            <input type="text"  name="submenuscontent" class="form-control" value="{{$submenus->content}}"  aria-describedby="basic-addon2">
        </div>


        <td><button type="submit" class="btn btn-outline-success">Update</button></td>

    </table>
    </form>
    </center>

@endsection
