<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    {{-- for Ajax提交(? --}}
    <title>login test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    {{-- bootstrap樣板必要元素 --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  body {
    font-family: "Lato", sans-serif;
  }

  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(31, 31, 31);
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }

  .sidenav a:hover {
    color: #f1f1f1;
  }

  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }

  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  </style>
    @yield('style')
</head>
<body>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    {{-- bootstrap樣板選配元素 --}}
    {{-- <form action="{{'catch'}}" method="POST"> --}}
        {{-- @csrf --}}
        {{-- 加以上物件可解決419的問題(跨站攻擊 csrf) --}}
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#">About</a>
      <a href="#">Services</a>
      <a href="#">Clients</a>
      <a href="#">Contact</a>
    </div>
  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  </script>
    <div class="container-fluild">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/userlist">Userlist <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onclick="openNav()" href="javascript:void(0)">Sidenav</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  新增...
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/addclassify">新增分類</a>
                  <a class="dropdown-item" href="/addgoods">新增商品</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            @auth
            <a class="navbar-brand" href="logout">Logout</a>
            @else
            <a class="navbar-brand" href="login">Login</a>    
            @endauth
          </div>
      </nav>       
    </div>
  @section('body')
  <div class="container" style="padding:120px">
    <form action="{{url('catch')}}" method="POST">
      @csrf
        <label for="exampleInputEmail1">Name</label>             
          <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" width="5" size="5" maxlength="10">
            <large id="emailHelp" class="form-text text-muted">請輸入使用者名稱及密碼.</large>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" size="18">
              </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="remember_check" name="remember_check">
              <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
              @if ($errors->all())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
              @foreach ($errors->all() as $error)
                </div>
              <div>{{ $error }} </div>
            <script>
              alert('名稱或是密碼錯誤，請確認後再次輸入。');
            </script>
          @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
        @endif
  <button type="submit" class="btn btn-primary" style="position:relative; left:15px; top: 0px; " >Submit</button>
      {{-- </form> --}}
    @show
    @yield('js')
  </body>
</html>

