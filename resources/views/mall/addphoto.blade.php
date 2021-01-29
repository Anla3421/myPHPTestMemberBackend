@extends('layouts.nav')
@section('title')
商品管理&快速新增
@stop
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('body')
<div class="container-fluild">
    <nav aria-label="breadcrumb" >
        <ol class="breadcrumb col-2 alert-light">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </nav>
<div class="container">
    <form action="{{url('addphoto')}}" method="POST" class="form-inline">
        @csrf
        <div  class="form-group col-4">
            <label for="exampleInputEmail1">Shop_id</label>
            <input type="text" class="form-control m-1" name="shop_id" maxlength="10" value="<?php if (isset($_GET['name'])) {print $_GET['name'];}?>" />
        </div>
        <div class="form-group col-4">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control m-1" name="title" />
        </div>
        <div class="form-group col-4">
            <label for="exampleInputEmail1">路徑</label>
            <input type="text" class="form-control m-1" name="path" aria-describedby="emailHelp" width="10" maxlength="10" value="<?php if (isset($_GET['cellphone'])) {print $_GET['cellphone'];}?>" />
        </div>
        <div>
            <button type="submit" class="btn btn-primary">新增照片</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">PID</th>
                <th scope="col">shop_id</th>
                <th scope="col">Title</th>
                <th scope="col">路徑</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($data)}} --}}
            @foreach ($data as $view)
            <tr>
                <td>{{$view->pid}}</td>
                <td>{{$view->shop_id}}</td>
                <td>{{$view->title}}</td>
                <td>{{$view->path}}</td>
                <td>{{$view->created_at}}</td>
                <td>{{$view->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop