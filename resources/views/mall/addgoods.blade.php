@extends('layouts.nav')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- csrf for Ajax method post --}}
{{-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> --}}
@endsection
@section('body')
<div class="container-fluid">
    <form action="{{url('addclassify')}}" method="POST" class="form-inline">
        @csrf
        {{-- <div  class="form-group col-5">
            <label for="exampleInputEmail1">ID</label>
            <input type="text" class="form-control m-1" name="id" maxlength="10" value="<?php if (isset($_GET['name'])) {print $_GET['name'];}?>" /> --}}
        {{-- </div> --}}
        {{-- <div class="form-group col-4">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control m-1" name="title" aria-describedby="emailHelp" width="10" maxlength="10" value="<?php if (isset($_GET['cellphone'])) {print $_GET['cellphone'];}?>" />
        </div> --}}
        <div class="form-group col-3">
            <label for="exampleFormControlSelect1">Classify</label>
                <select class="form-control m-1 gender" name="gender">
                    @foreach ($mergedata as $item)
                    <option value={{$item->id}} >{{$item->title}}</option>
                    @endforeach
                </select>
                <small id="emailHelp" class="form-text text-muted">請先選擇商品分類</small>
        </div>
        <div>
            {{-- <button type="submit" class="btn btn-primary">新增商品內容</button> --}}
            <button type="button" class="btn btn-primary" id="create_modal" data-toggle="modal" data-target="#exampleModal">創建新商品</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">圖片id</th>
                <th scope="col">分類</th>
                <th scope="col">標題</th>
                <th scope="col">敘述</th>
                <th scope="col">是否置頂</th>
                <th scope="col">單價</th>
                <th scope="col">折扣完價格</th>
                <th scope="col">數量</th>
                <th scope="col">折扣%數</th>
                <th scope="col">關鍵字id</th>
                <th scope="col">價格類型</th>
                <th scope="col">detailid</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($data)}} --}}
            @foreach ($data as $view)
            <tr>
                <td>{{$view->id}}</td>
                <td>{{$view->pid}}</td>
                <td>{{$view->classify}}</td>
                <td>{{$view->title}}</td>
                <td>{{$view->depiction}}</td>
                <td>
                    @if ($view->top==1)
                    是
                    @else
                    否
                    @endif
                </td>
                <td>{{$view->price}}</td>
                <td>{{$view->finalprice}}</td>
                <td>{{$view->amount}}</td>
                <td>{{$view->discount}}</td>
                <td>{{$view->kid}}</td>
                <td>
                    @if ($view->type==1)
                    統一價格
                    @else
                    分種類價格
                    @endif
                </td>
                <td>{{$view->did}}</td>
                <td>{{$view->created_at}}</td>
                <td>{{$view->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<form>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id=modal-text>
                    Input or select your information
                    <br><br>
                    <input type="hidden" name="uid" id="uid" value="">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">圖片id</label>
                        <input type="text" class="form-control" id="pid" name="pid">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">分類</label>
                        <input type="text" class="form-control" id="classify" name="classify" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">標題</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">敘述</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">是否置頂</label>
                        <select class="form-control" id="top" name="top">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">單價</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">折扣完價格</label>
                        <input type="text" class="form-control" id="finalprice" name="finalprice">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">數量</label>
                        <input type="text" class="form-control" id="amount" name="amount">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">折扣%數</label>
                        <input type="text" class="form-control" id="discount" name="discount">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">關鍵字id</label>
                        <input type="text" class="form-control" id="kid" name="kid">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">價格類型</label>
                        <select class="form-control" id="type" name="type">
                            <option value="1">統一價格</option>
                            <option value="0">分種類價格</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">detailid</label>
                        <input type="text" class="form-control" id="detailid" name="detailid">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="createuser" type="button" class="btn btn-primary create">Create user</button>
                    <button id="updateuser" type="button" class="btn btn-primary update">Update user</button>
                    <button id="deleteuser" type="button" class="btn btn-primary create">Delete user</button>
</form>
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
        if (confirm("確認要刪除此使用者" + data.pid + "?")) {
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


