@extends('layouts.nav')

@section('title')
汽車類
@stop
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">


@endsection
@section('body')
{{-- 麵包屑nav --}}
<div class="container-fluild">
    <nav aria-label="breadcrumb" >
        <ol class="breadcrumb alert-light">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </nav>

<table class="table">
    <thead>
        <tr>
            <th scope="col" hidden>#</th>
        </tr>
    </thead>
    
    <tbody>    
        <tr>
            <th scope="row" >品名</th>
                @foreach ($shop as $item)
                    <td>{{$item->title}}</td>
                @endforeach
        </tr>
        <tr>
            <th scope="row" >圖片</th>
                @foreach ($shop as $item)
                    <td><a href="/sellgoods/{{$item->id}}"><img src="{{$item->shop_idtophoto_shop_id->path}}" alt="{{$item->title}}" srcset="" width="300px" height="300px"></a></td>    
                @endforeach
        </tr>
        <tr>
            <th scope="row" >價格</th>
                @foreach ($shop as $item)
                    <td>{{$item->finalprice}}</td>
                @endforeach
        </tr>
        </tbody>
</table>

@stop
@section('js')
<script>



</script>
@endsection