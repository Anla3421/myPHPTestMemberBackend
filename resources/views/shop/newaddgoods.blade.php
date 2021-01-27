@extends('layouts.nav')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- csrf for Ajax method post --}}
{{-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> --}}
@endsection
@section('body')
@include('ckfinder::setup')

<form action = "">
    <div class="container" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div>
                    Input or select your information
                    <br><br>
                    <input type="hidden" name="uid" id="uid" value="">


                    <div class="form-group">
                        <label for="exampleFormControlInput1">標題</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">是否置頂</label>
                        <select class="form-control" id="top" name="top">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">數量</label>
                        <input type="text" class="form-control" id="amount" name="amount">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">單價</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">折扣%數</label>
                        <input type="text" class="form-control" id="discount" name="discount">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">折扣完價格</label>
                        <input type="text" class="form-control" id="finalprice" name="finalprice" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">關鍵字id</label>
                        <input type="text" class="form-control" id="kid" name="kid">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">價格類型</label>
                        <select class="form-control" id="type" name="type">
                            <option value="1">統一價格</option>
                            <option value="0">分種類價格</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">detailid</label>
                        <input type="text" class="form-control" id="did" name="did">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="create_goods" type="button" class="btn btn-primary create">Create!</button>
                    <button id="update_goods" type="button" class="btn btn-primary update">Update user</button>
                    <button id="delete_goods" type="button" class="btn btn-primary create">Delete user</button>
</form>
@stop
@section('js')
<script>








</script>
@endsection


