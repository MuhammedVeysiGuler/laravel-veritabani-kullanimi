@extends('CMS.master')
@section('css')
    <style>

        table{
            color: pink;
        }
    </style>
@endsection
@section('title')Announcements Create
@endsection
@section('content')
<center style="margin-top: 50px;">
    <form action="{{route('announcements_create')}}"  enctype="multipart/form-data" method="POST">
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
            <input type="text"  name="announcementscontent" class="form-control" placeholder="Content"  aria-describedby="basic-addon2">
            @if ($errors->has('announcementscontent'))
                <div class="alert alert-danger nomargin">
                    {{ $errors->first('announcementscontent') }}
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


        <div class="input-group mb-3" style="width: 50%">
            <input type="file"  name="img_path" class="form-control" placeholder="Img-Path"  aria-describedby="basic-addon2">
        </div>

        <button type="submit" class="btn btn-outline-success">BaS</button>



</form>
    @if(isset($success))
        {{$success}}
    @endif
</center>
@endsection
