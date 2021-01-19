<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <title>JS Bin</title>
</head>
<body>
<div class=red-div style="color:red;background:red;width:30px;height:30px"></div>
<div class=blue-div style="color:blue;background:blue;width:30px;height:30px"></div>
<button class="blue_button">Red</button>
<button class="red_button">Blue</button>
<table>
    <thead>
        <td>Name</td>
        <td>value</td>
    </thead>
    <tbody>
        <tr>
            <th>Ann</th>
            <th class="calcann" value="123">123</th>
        </tr>
        <tr>            
            <th>ben</th>
            <th class="calcben" value="321">321</th>
        </tr>
            <th>total?</th>
            <th class="total" vlaue="1"><h1>1</h1></th>
    </tbody>
</table>
<button id="calc">calculator Ann+Ben</button>
<button class="calc_button">change Ann & Ben</button>

</body>
</html>


<script> 
    $(".red_button").on('click',function(){
       $(".red-div").toggle(); //if show then hide, if hide then show.
       $(".blue-div").show();
    })
    
    $(".blue_button").click(function(){ //=on.('click',function(){})
        $(".blue-div").hide();
        alert('you are hiding the blue box.');
    })
    
    $("#calc").click(function(){
        var a=parseInt($(".calcann").attr('value')); //.attr(name) 取得屬性值，.attr(name, value) 設定 value 值，HTML 的特性，但一般只用於字串
        var b=parseInt($(".calcben").attr('value')); //同理，.prop(name) 取得屬性值，.prop(name, value) 設定 value 值，DOM 的屬性，抓取時一般用於boolen判斷但基本上可為任何類型的值
        var c=a+b
        $(".total").html(c); //在前面指定位置處(".total")填入html()內之資料
        console.log(a+b);
        console.log(c*10);
    })
    
    $(".calc_button").click(function(){      
        parseInt($(".calcann").attr('value','100000'));
        var q=parseInt($(".calcann").attr('value'));
        parseInt($(".calcben").attr('value','11111'));
        var w=parseInt($(".calcben").attr('value'));
        console.log(q);
        console.log(w);
        $(".total").html();
        // var h=$(".total").html(); //在前面指定位置處(".total")抓取屬性格之外的html之資料，ex:text
        // console.log(g);
        // console.log(h);
    })
    
    $aaa=JSON.stringify($(".calcben").attr('value','11111'));
    $bbb=json_decode($(".calcben").attr('value','11111'))
    console.log($aaa);
    console.log($bbb);
    // var a=parseInt($(".calcann").attr('value'));
    // var b=parseInt($(".calcben").attr('value'));
    // var c=a+b
    // var d=$(".total").html(c); //在前面指定位置處(".total")填入html()內之資料
    
</script>
  
$(".touch")

