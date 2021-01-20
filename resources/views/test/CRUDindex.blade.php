@extends('layouts.nav')
4111111111111111111111111

@switch(Route::current()->getName())
    @case('userlist')
    @break 
    @default
    @endswitch

        {{-- {{var_dump(Route::current()->getName() == 'userlist')}} --}}
        @switch(Route::current()->getName())
        @case('userlist')
        <label for="exampleInputEmail1">Input Name</label>
        <input type="text" class="form-control m-1" name="name" width="10" maxlength="10" placeholder="輸入欲搜尋之姓名" value="<?php if (isset($_GET['name'])) {print $_GET['name'];}?>" />
            @break 
        @default
        <label for="exampleInputEmail1">ID</label>
        <input type="text" class="form-control m-1" name="id" maxlength="10"/>
    @endswitch
    
</div>
<div class="form-group col-3">
    {{var_dump($route)}}
    @switch($route)
        @case('userlist')
            <label for="exampleFormControlSelect1">Gender</label>
                <select class="form-control m-1 gender" name="gender">
                <option value="all" readonly>all</option>
                <option value="female">female</option>
                <option value="male">male</option>
            </select>
        @break 
        @default

    @endswitch
</div>
<div class="form-group col-4">
    @switch(Route::current()->getName())
        @case('userlist')
            <label for="exampleInputEmail1">Cellphone</label>
            <input type="cellphone" class="form-control m-1" name="cellphone" aria-describedby="emailHelp" width="10" maxlength="10" placeholder="輸入欲搜尋之電話" value="<?php if (isset($_GET['cellphone'])) {print $_GET['cellphone'];}?>" />
        @break 
        @default
            <label for="exampleInputEmail1">Title</label>
            <input type="cellphone" class="form-control m-1" name="title"/>
    @endswitch
</div>
<div>
    @switch(Route::current()->getName())
        @case('userlist')
            <button type="submit" class="btn btn-primary">搜尋使用者</button>
            <button type="button" class="btn btn-primary" id="create_modal" data-toggle="modal" data-target="#exampleModal">創建新使用者</button>
        @break 
        @default
            <button type="submit" class="btn btn-primary" id="create_classify" >新增類別</button>
    @endswitch
    

<tr>
    @switch(Route::current()->getName())
        @case('userlist')
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
        @break 
        @default
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
        @endswitch
    
</tr>
</thead>
<tbody>
{{-- {{dd($data)}} --}}
@switch(Route::current()->getName())
        @case('userlist')
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
        @break 
        @default
            @foreach ($data as $view)
                <tr>
                    <td>{{$view->id}}</td>
                    <td>{{$view->title}}</td>
                    <td>{{$view->created_at}}</td>
                    <td>{{$view->updated_at}}</td>
                </tr>
            @endforeach
@endswitch