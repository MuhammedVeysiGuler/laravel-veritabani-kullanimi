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
@section('title')Menu Create
@endsection
@section('content')

<center style="margin-top: 50px">
    <form action="{{route('menus_create')}}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}

        <div class="input-group mb-3" style="width: 50%">
            <input type="text"  name="title" class="form-control" placeholder="Title"  aria-describedby="basic-addon2">
            @if ($errors->has('title'))
                <div class="alert alert-danger nomargin">
                    {{ $errors->first('title') }}
                </div><br>
            @endif
        </div>

        <div class="input-group mb-3" style="width: 50%">
            <input type="text"  name="menuscontent" class="form-control" placeholder="Content"  aria-describedby="basic-addon2">
            @if ($errors->has('menuscontent'))
                <div class="alert alert-danger nomargin">
                    {{ $errors->first('menuscontent') }}
                </div><br>
            @endif
        </div>

        <div class="input-group mb-3" style="width: 50%">
            <input type="text"  name="slug" class="form-control" placeholder="Slug"  aria-describedby="basic-addon2">
            @if ($errors->has('slug'))
                <div class="alert alert-danger nomargin">
                    {{ $errors->first('slug') }}
                </div><br>
            @endif
        </div>

        <button type="submit" class="btn btn-outline-success">BaS</button>

    </form>
</center>
@if(isset($success))
    {{$success}}
@endif
@endsection
