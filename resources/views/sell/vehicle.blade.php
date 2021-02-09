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

<div class="container row">
    @foreach ($shop as $item)
        <div class="col-4">
            {{-- Bootstrap Kitchen sink --}}
            <div class="card" style="width: 18rem;">
                <a href="/sellgoods/{{$item->id}}"><img src="{{$item->shop_idtophoto_shop_id->path}}" class="card-img-top" alt="{{$item->title}}"></a>
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</td></h5>
                    <p class="card-text">{{$item->finalprice}}</p>                    
                </div>
            </div>
        </div>
    @endforeach
</div>

@stop
@section('js')
<script>



</script>
@endsection