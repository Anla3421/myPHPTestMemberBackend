@extends('layouts.nav')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- csrf for Ajax method post --}}
{{-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> --}}
@endsection
@section('body')
<div class="container">
    <form action="{{url('addkeyword')}}" method="POST" class="form-inline">
        @csrf
        <div class="form-group col-4">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control m-1" name="title" aria-describedby="emailHelp" width="10" maxlength="10" value="<?php if (isset($_GET['cellphone'])) {print $_GET['cellphone'];}?>" />
        </div>
        <div  class="form-group col-5">
            <label for="exampleInputEmail1">Icon</label>
            <input type="text" class="form-control m-1" name="icon" maxlength="10" value="<?php if (isset($_GET['icon'])) {print $_GET['icon'];}?>" />
        </div>
        <div>
            <button type="submit" class="btn btn-primary">新增關鍵字</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">kID</th>
                <th scope="col">Title</th>
                <th scope="col">Icon</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($data)}} --}}
            @foreach ($data as $view)
            <tr>
                <td>{{$view->kid}}</td>
                <td>{{$view->title}}</td>
                <td>{{$view->icon}}</td>
                <td>{{$view->created_at}}</td>
                <td>{{$view->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop