@extends('layouts.nav')

@section('title')
修改商品(全版)
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
                    {{-- <li>{{$aside->shoptoclassify->title}}</li> --}}
                @endforeach
                </ul>
            </aside>
        </div>

        <div class="col-6">
            <div class="swiper-container swiper gallery-top swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
            <div class="swiper-wrapper">
                {{-- @foreach ($data as $pic)
                <div  class="swiper-slide" style="  height: 600px; background-image:url({{url($pic->path)}})"></div>
                @endforeach --}}
                @for ($i = 1; $i < 5; $i++)
                    <div  class="swiper-slide" style="  height: 600px; background-image:url(userfiles/images/PIC{{$i}}.jpg)"></div>
                @endfor
            </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <div class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-free-mode swiper-container-thumbs">
                <div class="swiper-wrapper">
                {{-- @foreach ($data as $pic)
                    <div class="swiper-slide" style="width: 100px ;height: 200px; background-image:url({{url($pic->path)}})"></div>
                @endforeach --}}
                @for ($i = 1; $i < 5; $i++)
                    <div class="swiper-slide" style="width: 100px ;height: 200px; background-image:url(userfiles/images/PIC{{$i}}.jpg)"></div>    
                @endfor
            </div>

    </div>
</div>
  
        {{-- {{dd($shop[0])}} --}}


        <div class="col-5">
            {{-- <a style="display: inline-block; margin-top: 14px; margin-left: auto; margin-right: auto; user-select: none;" href="/ckfinder/core/connector/php/connector.php?command=ImagePreview&type=Images&currentFolder=/kittens/&fileName=longcat.jpg&size=450x450" title="瀏覽伺服器" hidefocus="true" class="cke_dialog_ui_button" role="button" aria-labelledby="cke_112_label" id="cke_113_uiElement"><span id="cke_112_label" class="cke_dialog_ui_button">瀏覽伺服器</span></a> --}}
            <form action="">      
                <div class="form-group">
                    <label for="exampleFormControlInput1"><h1><strong>標題</strong></h1></label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"><h3>關鍵字id</h3></label>
                    <input type="text" class="form-control" id="kid" name="kid">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">定價</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"><h5><strong>折扣後售價</h5></strong></label>
                    <input type="text" class="form-control" id="finalprice" name="finalprice" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">上架數量</label>
                    <input type="text" class="form-control" id="amount" name="amount">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">可購數量設定：</label>
                    <input type="text" class="form-control" id="buyamount" name="buyamount">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">detailid</label>
                    <input type="text" class="form-control" id="did" name="did">
                </div>
            <button id="buy_goods" type="button" class="btn btn-secondary" onclick="" disabled>直接購買</button>
            <button id="addcart_goods" type="button" class="btn btn-secondary" onclick=""disabled>加入購物車</button>
            <div class="row">
                <div class="form-group col-3">
                    <label for="exampleFormControlInput1">圖片1</label>
                    <input type="text" class="form-control" id="pic1" name="pic1">
                </div>
                <div class="form-group col-3">
                    <label for="exampleFormControlInput1">圖片2</label>
                    <input type="text" class="form-control" id="pic2" name="pic2">
                </div>
                <div class="form-group col-3">
                    <label for="exampleFormControlInput1">圖片3</label>
                    <input type="text" class="form-control" id="pic3" name="pic3">
                </div>
                <div class="form-group col-3">
                    <label for="exampleFormControlInput1">圖片4</label>
                    <input type="text" class="form-control" id="pic4" name="pic4">
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br>
    <hr>
<div class="container" style="padding-top: 50px">
        <div class="form-group">
            <label for="exampleFormControlSelect1">敘述</label>
            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
            {{-- 敘述--}}
            <textarea type="text/javascript" class="form-control" id="description" name="description"></textarea>
            {{-- 用關聯矩陣 --}}
            <script type="text/javascript">
                CKFinder.setupCKEditor();
                CKEDITOR.replace('description',{
                    width: '90%',
                    height: 700
                });
            </script>
        </div>
    <button type="submit" class="btn btn-primary">新增商品內容</button>
    <button type="button" class="btn btn-primary" onclick="window.location.reload()">清空商品內容</button>
</div>
            </form>
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