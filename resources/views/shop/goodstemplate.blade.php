@extends('layouts.nav')

@section('title')
商品模板
@stop
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
    height: 80%;
    width: 80%;
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
@include('ckfinder::setup')

{{-- 麵包屑nav --}}
<div class="container-fluild">
<nav aria-label="breadcrumb" >
  <ol class="breadcrumb col-2 alert-light">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
  </ol>
</nav>
{{-- aside --}}


<div class="row">
  <div class="col-1">
    <aside>
      <div name="title" id="title">推薦給您：</div>
        <ul>
          @foreach ($shop as $aside)
            {{-- <li>{{$aside->classify}}</li> --}}
            <li>{{$aside->shoptoclassify->title}}</li>
          @endforeach
        </ul>
    </aside>
  </div>


  <div class="col-6">
    <div class="swiper-container swiper gallery-top swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
      <div class="swiper-wrapper">
        @foreach ($data as $pic)
          <div  class="swiper-slide" style="  height: 600px; background-image:url({{url($pic->path)}})"></div>
        @endforeach
      </div>
<!-- Add Arrows -->
  <div class="swiper-button-next swiper-button-white"></div>
  <div class="swiper-button-prev swiper-button-white"></div>
    </div>
  <div class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-free-mode swiper-container-thumbs">
    <div class="swiper-wrapper">
      @foreach ($data as $pic)
        <div class="swiper-slide" style="width: 100px ;height: 200px; background-image:url({{url($pic->path)}})"></div>
      @endforeach
   </div>
  </div>
  </div>

{{-- {{dd($shop[0])}} --}}
  <div class="col-5">
  <div name="title" id="title"><h1><strong>{{$shop[0]->title}}</strong></h1></div>
  {{-- <div name="kid" id="kid"> {{$shop[0]->kid}}</div> --}}
  <div name="kid" id="kid"><h3>{{$shop[0]->shoptokeyword->title}}</h3></div>
  <del name="price" id="price">定價：{{$shop[0]->price}}</del>
  <div name="finalprice" id="finalprice"><h5><strong>折扣後售價：{{$shop[0]->finalprice}}</strong></h5></div>

    <div>欲購數量：
      <select name="amount" id="amount">
        @for ($i = 1; $i < 11; $i++)
          <option value =$i>{{$i}}</option>
        @endfor
      </select>
    </div>
      <div name="did" id="did"> {{$shop[0]->did}}</div>
      <button id="buy_goods" type="button" class="btn btn-primary" onclick="">直接購買</button>
      <button id="addcart_goods" type="button" class="btn btn-secondary" onclick="">加入購物車</button>
  </div>
</div>
</div>
<br><br><br><br><br>
    <hr>

  <div class="container" style="padding-top: 50px">
<div>產品敘述：</div>
<div name="description" id="description">
    {!!$shop[0]->description !!}
</div>
</div>
{{-- <textarea type="text/javascript" class="form-control" id="description" name="description" readonly>{{$shop[0]->description}}</textarea>
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.disableAutoInline = true;
        CKFinder.setupCKEditor();
        CKEDITOR.inline('description',{});
    </script> --}}

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


