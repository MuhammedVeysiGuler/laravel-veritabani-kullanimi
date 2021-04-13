@extends('CMS.master')
@section('css')
    <style>
        .asd{
            color: white;
        }
        table{
            color: pink;
        }
        #bmd-form-group-sm {
            font-size: 50px;
        }

    </style>
@endsection
@section('title')Sub-Menu Create
@endsection
@section('content')

    <center style="margin-top: 50px;">
    <form action="{{route('submenus_create')}}" enctype="multipart/form-data" method="POST">
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
            <input type="text"  name="submenuscontent" class="form-control" placeholder="Content"  aria-describedby="basic-addon2">
            @if ($errors->has('submenuscontent'))
                <div class="alert alert-danger nomargin">
                    {{ $errors->first('submenuscontent') }}
                </div><br>
            @endif
        </div>

        <div class="input-group mb-3" style="width: 50%">
            <label>Menu Seç</label>
            <select class="bmd-form-group-sm" required name="menu_id" style="margin-left: 30px;
            background-color: #3c4858;color: pink;border;border-color: #3c4858">
                @foreach($menus as $item)
                    <option value="{{$item->id}}">
                        {{$item->title}}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-outline-success">BaS</button>
    </form>
</center>
@if(isset($success))
    {{$success}}
@endif
@endsection
