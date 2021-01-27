@extends('layouts.nav')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- csrf for Ajax method post --}}
{{-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> --}}
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- Demo styles -->
<style>
  html,
  body {
    position: relative;
    height: 100%;
  }

  body {
    background: rgb(255, 255, 255);
    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #000;
    margin: 0;
    padding: 0;
  }

  /* 下方縮圖頁大小 */
  .swiper-container {
    width: 30%;
    height: 15px;
    margin-left: auto;
    margin-right: auto;
  }

  .swiper-slide {
    background-size: cover;
    background-position: center;
  }
  
  /* 上方展示頁大小 */
  .gallery-top { 
    height: 30%;
    width: 30%;
  }

  .gallery-thumbs {
    height: 20%;
    box-sizing: border-box;
    padding: 10px 0;
  }

  .gallery-thumbs .swiper-slide {
    height: 100%;
    opacity: 0.4;
  }

  .gallery-thumbs .swiper-slide-thumb-active {
    opacity: 1;
  }
</style>
@endsection
@section('body')

<router-link to="/">go to home</router-link>
<router-link to="/login">go to login</router-link>

<nav class="menu">
    <ul>
      <li><a href="{{url('/')}}">Home</a></li>
      <li><a href="#">{{$shop->classify}}</a></li>
      <li><a href="{{url('shop/$shop->id')}}">{{$shop->title}}</a></li>
    </ul>
  </nav>

<div class="swiper-container gallery-top swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
    <div class="swiper-wrapper">
        @foreach ($photo as $pic)
      <div class="swiper-slide" style="background-image:url({{url('$pic->path')}})"></div>
            
        @endforeach
      {{-- <div class="swiper-slide" style="background-image:url(/userfiles/files/1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(/userfiles/files/2.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./userfiles/files/3.PNG)"></div>
      <div class="swiper-slide" style="background-image:url(/userfiles/files/4.jpg)"></div> --}}
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
</div>
  <div class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-free-mode swiper-container-thumbs">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url(/userfiles/files/1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./userfiles/files/2.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./userfiles/files/3.PNG)"></div>
      <div class="swiper-slide" style="background-image:url(/userfiles/files/4.jpg)"></div>
    </div>
  </div>
            <div class="title"> $shop->title</div>

            <select name="amount" id="amount">
                @php for ($i=1; $i <20 ; $i++) { 
                    <option value =$i>$i </option>
                }
                @endphp

            </select>
            

            <div class="price">$shop->price</div>
            
            <div class="container">
                {{$shop->description ||html()}}


            </div>
  


<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: true,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop: true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
</script>
@stop
@section('js')
<script>








</script>
@endsection


