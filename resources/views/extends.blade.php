@extends('layouts.nav')

@section('title')

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


@stop
@section('js')
<script>



</script>
@endsection


