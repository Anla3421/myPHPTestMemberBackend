@extends('layouts.nav')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- csrf for Ajax method post --}}
{{-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> --}}
@endsection
@section('body')
<br>
<div class="container-fluid">
    <form action="{{url('query')}}" method="GET" class="form-inline">
        <div  class="form-group col-3">
            <label for="exampleInputEmail1">Input Name</label>
            <input type="text" class="form-control m-1" name="name" width="10" maxlength="10" placeholder="輸入欲搜尋之姓名" value="<?php if (isset($_GET['name'])) {print $_GET['name'];}?>" />
        </div>
        <div class="form-group col-3">
            <label for="exampleFormControlSelect1">Gender</label>
            <select class="form-control m-1 gender" name="gender">
                <option value="all" readyonly>all</option>
                <option value="female">female</option>
                <option value="male">male</option>
            </select>
        </div>
        <div class="form-group col-3">
            <label for="exampleInputEmail1">Cellphone</label>
            <input type="cellphone" class="form-control m-1" name="cellphone" aria-describedby="emailHelp" width="10" maxlength="10" placeholder="輸入欲搜尋之電話" value="<?php if (isset($_GET['cellphone'])) {print $_GET['cellphone'];}?>" />
        </div>
        <div>
            <button type="submit" class="btn btn-primary">搜尋使用者</button>
            <button type="button" class="btn btn-primary" id="create_modal" data-toggle="modal" data-target="#exampleModal">創建新使用者</button>
        </div>
    </form>
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
                            <label for="exampleFormControlInput1">Account</label>
                            <input type="text" class="form-control" id="account" name="account">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password</label>
                            <input type="text" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Level</label>
                            <select class="form-control" id="level" name="level">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Position</label>
                            <select class="form-control" id="position" name="position">
                                <option>user</option>
                                <option>administrator</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option>male</option>
                                <option>female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Cellphone</label>
                            <input type="text" class="form-control" id="cellphone" name="cellphone">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Remember_check</label>
                            <select class="form-control" id="remember_check" name="remember_check">
                                <option>NULL</option>
                                <option>ok</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="createuser" type="button" class="btn btn-primary create">Create user</button>
                        <button id="updateuser" type="button" class="btn btn-primary update">Update user</button>
                        <button id="deleteuser" type="button" class="btn btn-primary create">Delete user</button>
    </form>
</div>
</div>
</div>
</div>
<form>
    <div class="modal hide" id="myModal">

        <body class="modal-body">
            <p>確定要刪除此使用者?</p>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="deleteuser" type="button" class="btn btn-primary create">Delete user</button>
            </div>
        </body>
    </div>
</form>
<br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Account</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">level</th>
            <th scope="col">position</th>
            <th scope="col">Cellphone</th>
            <th scope="col">Remember_check</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        {{-- {{dd($data)}} --}}
        @foreach ($data as $view)
        <tr>
            <td>{{$view->id}}</td>
            <td>{{$view->account}}</td>
            <td>{{$view->name}}</td>
            <td>{{$view->gender}}</td>
            <td>{{$view->level}}</td>
            <td>{{$view->position}}</td>
            <td>{{$view->cellphone}}</td>
            <td>{{$view->remember_check}}</td>
            <td>{{$view->created_at}}</td>
            <td>{{$view->updated_at}}</td>
            <td>
                <button type="button" id="update_modal" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" onclick="update({{$view}})">修改</button>
            </td>
            <td>
                <button type="button" id="delete_modal" class="btn btn-secondary" data-toggle="" data-target="" onclick="deleteuser({{$view}})">刪除</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- {{ $data->appends(['name'=>$data->name,'gender'=>$data->gender,'cellphone'=>$data->cellphone])->links() }} --}}
{{-- {{ $data->appends([$_GET])->links() }} --}}
{{ $data->withQueryString()->links() }}
@endsection
@section('js')
<script>
$(document).ready(function() {

  // jQuery.type( );
    var $gender = "{{Request::get('gender')}}";

      if($gender ){

      $(".gender").val($gender).prop('selected',true);
      }

});


    $("#create_modal").on('click', function($data) { //打開選單
    $("#exampleModalLabel").html('Create User!!!');
    $("input").val('');
    $("#deleteuser").hide();
    $("#updateuser").hide();
    $("#createuser").show();
});

$("#createuser").on('click', function() { //創建新使用者之資料給controller
    $.ajax({
            // url:"http://test777.ukyo.idv.tw/userlist",
            url: "/userlist", //for localhost test
            type: "POST",
            data: {
                account: $("#account").val(),
                name: $("#name").val(),
                password: $('#password').val(),
                gender: $("#gender").val(),
                level: $('#level').val(),
                position: $('#position').val(),
                cellphone: $("#cellphone").val(),
                remember_check: $("#remember_check").val(),
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


function update(data) { //打開選單後顯示原本的資料
    console.log(data);
    $("#deleteuser").hide();
    $("#updateuser").show();
    $("#createuser").hide();
    $('#uid').val(data.id); //撈給下面url用
    $('#exampleModalLabel').text('Update User...');
    $('#account').val(data.account);
    $("#name").val(data.name);
    // password不顯示
    $('#level').val(data.level),
        $('#position').val(data.position),
        $("#gender").val(data.gender).prop('selected', true);
    $("#cellphone").val(data.cellphone);
    $("#remember_check").val(data.remember_check).prop('selected', true);
}

$(".update").click(function() { //修改使用者之資料給controller
    var uid = $('#uid').val();
    // var url ="http://test777.ukyo.idv.tw/userlist/" + uid;
    var url = "/userlist/" + uid; //for localhost test
    $.ajax({
        url: url,
        type: 'PUT',
        dataType: 'json',
        data: {
            account: $("#account").val(),
            name: $("#name").val(),
            password: $('#password').val(),
            gender: $("#gender").val(),
            level: $('#level').val(),
            position: $('#position').val(),
            cellphone: $("#cellphone").val(),
            remember_check: $("#remember_check").val(),
        },
        success: function(data) {
            console.log(data);
            alert('Update Complete!');
            location.reload();
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
@endsection
