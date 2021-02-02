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
    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-5">
                <label for="exampleInputEmail1">對應之商店ID及商品標題於商品新增/修改處更新</label>
            </div>
            <div class="form-group col-5">
                <input id="file" type="file" class="form-control" id="pic1" name="pic1" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">新增照片</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">shop_id</th>
                <th scope="col">Goods Title</th>
                <th scope="col">filename</th>
                <th scope="col">路徑</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($data)}} --}}
            @foreach ($data as $view)
            <tr>
                <td>{{$view->id}}</td>
                <td>{{$view->shop_id}}</td>
                <td>{{$view->title}}</td>
                <td>{{$view->filename}}</td>
                <td>{{$view->path}}</td>
                <td>{{$view->created_at}}</td>
                <td>{{$view->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop