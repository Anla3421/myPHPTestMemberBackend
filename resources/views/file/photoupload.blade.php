<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">檔案上傳</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group" >
                            <label for="file" class="col-md-4 control-label">請選擇檔案</label>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="file" class="control-label">圖片1</label>
                                    <input id="file" type="file" class="form-control" id="pic1" name="pic1" required>
                                </div>
                                <div class="form-group col-3">
                                    <label for="file" class="control-label">圖片2</label>
                                    <input id="file" type="file" class="form-control" id="pic2" name="pic2" required>
                                </div>
                                <div class="form-group col-3">
                                    <label for="file" class="control-label">圖片3</label>
                                    <input id="file" type="file" class="form-control" id="pic3" name="pic3" required>
                                </div>
                                <div class="form-group col-3">
                                    <label for="file" class="control-label">圖片4</label>
                                    <input id="file" type="file" class="form-control" id="pic4" name="pic4" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="shop_id" name="shop_id" value="4" hidden>
                                    <input type="text" class="form-control" id="shop_title" name="shop_title" value="C牌測試商品" hidden>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    確認上傳1
                                </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        {{-- </div>
    </div> --}}
</body>
</html>

