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
    width: 80%;
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
    height: 100%;
    width: 100%;
  }

  .gallery-thumbs {
    height: 50%;
    box-sizing: border-box;
    padding: 10px 10;
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
<div class="container-fulid">
  <h1><em><strong>Welcome</strong></em></h1>    
    <br><br><br>
    <?php
    echo random_int(1,100);
    ?>
    @if ($photo!=null)
    <h3><ins>小編隨選~快去看看</ins></h3>
    <div class="row">
      <div class="col-1"></div>
      <div class="col-5">
        <div class="swiper-container swiper gallery-top swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
          <div class="swiper-wrapper">
              @foreach ($photo as $pic)
                <a href="sellgoods/{{$pic->shop_id}}" class="swiper-slide" style="  height: 600px; background-image:url({{url($pic->path)}})"></a>
              @endforeach    
          </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-free-mode swiper-container-thumbs">
    </div>
  </div>
    <div class="col-5">
        <div class="swiper-container swiper gallery-top swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
          <div class="swiper-wrapper">
              @foreach ($photo2 as $pic2)
                <a href="sellgoods/{{url($pic2->path)}}" class="swiper-slide" style="  height: 600px; background-image:url({{url($pic2->path)}})"></a>
              @endforeach                            
          </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
        {{-- <div class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-free-mode swiper-container-thumbs">
      </div> --}}
    </div>
  </div>
  @endif
</div>

<div class="container-fulid">
  <div class="row">
    <div name="title" id="title"><h3><strong>推薦給您：</strong></h3></div>
        <div>
        @foreach ($classify as $aside)
            <li><a href="{{$aside->title}}"><strong>{{$aside->title}}</strong></a></li>
            <br>
            {{-- <li>{{$aside->shoptoclassify->title}}</li> --}}
        @endforeach
      </div>
  </div>
</div>

    
  <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

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
@endsection
@section('js')
<script>

</script>
@endsection