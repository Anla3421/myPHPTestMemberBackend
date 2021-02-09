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
    width: 50%;
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
    height: 40%;
    width: 50%;
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
@include('ckfinder::setup')

<form action = "">
    <div class="container" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <br>    
        <div>
            Input or select your information
        </div>
        <br>
            <input type="hidden" name="uid" id="uid" value="">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" >標題</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleFormControlInput1" >分類</label>
                        <input type="text" class="form-control" id="classify" name="classify" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <label for="exampleFormControlSelect1">是否置頂</label>
                        <select class="form-control" id="top" name="top">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleFormControlInput1">關鍵字id</label>
                        <input type="text" class="form-control" id="kid" name="kid">
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleFormControlSelect1">價格類型</label>
                        <select class="form-control" id="type" name="type">
                            <option value="1">統一價格</option>
                            <option value="0">分種類價格</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleFormControlInput1">detailid</label>
                        <input type="text" class="form-control" id="did" name="did">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <label for="exampleFormControlInput1">數量</label>
                        <input type="text" class="form-control" id="amount" name="amount">
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleFormControlInput1">單價</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleFormControlInput1">折扣%數</label>
                        <input type="text" class="form-control" id="discount" name="discount">
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleFormControlInput1">折扣完價格</label>
                        <input type="text" class="form-control" id="finalprice" name="finalprice" readonly>
                    </div>
                </div>
    </div>

<div class="form-group">
    <label for="exampleFormControlSelect1">敘述</label>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    {{-- 敘述--}}
    <textarea type="text/javascript" class="form-control" id="description" name="description"></textarea>
    {{-- 用關聯矩陣 --}}
    <script type="text/javascript">
        CKFinder.setupCKEditor();
        CKEDITOR.replace('description',{});
    </script>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button id="create_goods" type="button" class="btn btn-primary create">Create!</button>
    <button id="update_goods" type="button" class="btn btn-primary update">Update user</button>
                    <button id="delete_goods" type="button" class="btn btn-primary create">Delete user</button>
</div>
</form>

<div class="swiper-container gallery-top swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url(/userfiles/files/1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(/userfiles/files/2.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./userfiles/files/3.PNG)"></div>
      <div class="swiper-slide" style="background-image:url(/userfiles/files/4.jpg)"></div>
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


