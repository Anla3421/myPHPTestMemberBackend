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
    <form action="{{url('addclassify')}}" method="POST" class="form-inline">
        @csrf
        {{-- <div  class="form-group col-5">
            <label for="exampleInputEmail1">ID</label>
            <input type="text" class="form-control m-1" name="id" maxlength="10" value="<?php if (isset($_GET['name'])) {print $_GET['name'];}?>" /> --}}
        {{-- </div> --}}
        <div class="form-group col-4">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control m-1" name="title" aria-describedby="emailHelp" width="10" maxlength="10" value="<?php if (isset($_GET['cellphone'])) {print $_GET['cellphone'];}?>" />
        </div>
        <div>
            <button type="submit" class="btn btn-primary">新增商品類別</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($data)}} --}}
            @foreach ($data as $view)
            <tr>
                <td>{{$view->id}}</td>
                <td>{{$view->title}}</td>
                <td>{{$view->created_at}}</td>
                <td>{{$view->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
{{-- @section('js2')
<script>
     $("#create_classify").on('click', function() { //創建新使用者之資料給controller
        $.ajax({
                // url:"http://test777.ukyo.idv.tw/userlist",
                url: "/addclassify", //for localhost test
                type: "POST",
                data: {
                    id:$("#id").val(),
                    title:$("title").val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })
            .done(function(data) { //回傳創建結果
                console.log(data);
                if (data.status == 200) {
                    alert('Create complete!');
                    location.reload();
                }
            })
    });

    function deleteuser(data) { //use confirm to delete users
        if (confirm("確認要刪除此使用者" + data.account + "?")) {
            $.ajax({
                // url: "http://test777.ukyo.idv.tw/userlist/d/" + data.id,
                url: "/userlist/d/" + data.id, //for localhost test
                type: "POST",
                success: function(data) {
                    console.log(data);
                    alert('Delete Complete!');
                    location.reload();
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        }
    }
    
    </script>
    @endsection --}}


