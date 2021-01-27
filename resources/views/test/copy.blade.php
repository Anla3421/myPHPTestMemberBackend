<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-tw"><head>
    
    <meta name="title" content="繪 · 幸福 5F電梯墅 - 垣慶建設股份有限公司">
    <meta name="keywords" content="公司年鑑, 歷年建案, 2017年, 繪 · 幸福 5F電梯墅, 垣慶建設股份有限公司">
    
    <meta name="description" content="                ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="Content-Type" content="text/html" ;="" charset="utf-8">
    <link rel="shortcut icon" href="./images/favicon.ico">
    <link rel="bookmark" href="./images/favicon.ico">
    
    <title>
        繪 · 幸福 5F電梯墅 -
        垣慶建設股份有限公司</title>
    <link href="./style.php?ts=1611711722" rel="stylesheet" media="screen">
    <link href="./styles/rwd_yc/theme/common.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="./styles/rwd_yc/theme/bootstrap-image-gallery.min.css">
    <link href="./includes/js/theme/ui-lightness/jquery-ui.css" rel="stylesheet" media="screen">
    <link href="./includes/js/theme/colorbox/colorbox.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="./includes/js/jquery.js"></script>
    <script type="text/javascript" src="./includes/js/jquery-ui.js"></script>
    <script type="text/javascript" src="./includes/js/ajaxupload.js"></script>
    <script type="text/javascript" src="./includes/js/jquery.blockUI.js"></script>
    <script type="text/javascript" src="./styles/rwd_yc/js/superfish.js"></script>
    <script type="text/javascript" src="./styles/rwd_yc/js/trunk8.js"></script>
    <script type="text/javascript" src="./styles/rwd_yc/js/jquery.jcarousel.js"></script>
    <script type="text/javascript" src="./includes/js/bootstrap.js"></script>
    <script type="text/javascript" src="./includes/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./includes/js/npm.js"></script>
    <script type="text/javascript" src="./styles/rwd_yc/js/bootstrap-image-gallery.min.js"></script>
    <script type="text/javascript" src="./styles/rwd_yc/js/jssor.slider.mini.js"></script>
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script type="text/javascript" src="./styles/rwd_yc/js/jquery.bcat.bgswitcher.js"></script>
    <script type="text/javascript" src="./styles/rwd_yc/js/imgLiquid-min.js"></script><style type="text/css">.imgLiquid img {visibility:hidden}</style>
    <script language="javascript">
        <!--

/**
* Window popup
*/
function popup(url, width, height, name)
{
    if (!name)
    {
        name = '_popup';
    }

    window.open(url.replace(/&amp;/g, '&'), name, 'height=' + height + ',resizable=yes,scrollbars=yes, width=' + width);
    return false;
}

/**
* Share Function
*/
function share(obj, target, title, url) {
    if(!url) {
        url = window.location.href;
    }
    url = encodeURIComponent(url);
    
    if(!title) {
        
        title = '繪 · 幸福 5F電梯墅 - 垣慶建設股份有限公司';
        
    } else {
        title += ' - 垣慶建設股份有限公司';
    }
    
    switch(target) {
        case 'facebook':
            var shareUrl = 'http://www.facebook.com/share.php?u=' + url + '&t=' + encodeURIComponent(title);
            popup(shareUrl, 800, 640);
            return;
        break;
        
        case 'plurk':
            var shareUrl = 'http://www.plurk.com/?status=' + url + encodeURIComponent(' (' + title  + ')') + '&qualifier=shares';
        break;
        
        case 'twitter':
            var shareUrl = 'http://twitter.com/share?url=' + url + '&text=' + encodeURIComponent(title);
        break;
        case 'googleplus':
            var shareUrl =  'https://plus.google.com/share?url='    + url + '&t=' + encodeURIComponent(title);
            break;
            
            
    }
    
    if(obj.tagName.toLowerCase() == 'a') {
        obj.target = '_blank';
        obj.href = shareUrl;
        return;
    }
    popup(shareUrl, 800, 640);
}

// JavaScript Document
var pageList = {
	timeoutInterval: false,
	page_ary: {
		"about": "<div class='list_item'><a href='./content.php?cn=about-1'>願景</a></div><div class='line'></div><div class='list_item'><a href='./content.php?cn=about-2'>理念</a></div><div class='line'></div><div class='list_item'><a href='./content.php?cn=about-3'>競爭優勢</a></div>",
		"item": "",
		"contact": "",
		"news": ""
	},
	swapMenu: function (id) {
		if(pageList.timeoutInterval) {
			clearInterval(pageList.timeoutInterval);
		}
		
		subMenu = pageList.page_ary[id];
		if(subMenu != '') {		
			$('#sub-menu-items .items').html(subMenu);
			
			position = $('#icon-' + id).position();
			var target_left = position.left + ($('#icon-' + id).width() - $('#sub-menu-items').width()) / 2;
			
			minLeft = $('.menubar li:first').position().left;
			maxLeft = $('.menubar li:first').position().left + $('.menubar').width() - $('#sub-menu-items').width();
			
			target_left = Math.max(target_left, minLeft);
			target_left = Math.min(maxLeft, target_left);
			
			$('#sub-menu-items').show();
			$('#sub-menu-items').css({
				'left':	(target_left + 'px')
			});
			
			$('#sub-menu-items').mouseout(function() {
				pageList.setOut();
			});
			$('#icon-' + id).mouseout(function() {
				pageList.setOut();
			});
			$('#sub-menu-items').mouseover(function() {
				clearInterval(pageList.timeoutInterval);
			});
		} else {
			$('#sub-menu-items').hide();
		}
		
		if(!$.browser.msie)
			event.stopPropagation();
	}, 
	hideMenu: function() {
		if(pageList.timeoutInterval) {
			clearInterval(pageList.timeoutInterval);
		}
		$('#sub-menu-items').hide();
	},
	setOut: function() {
		if(pageList.timeoutInterval) {
			clearInterval(pageList.timeoutInterval);
		}
		pageList.timeoutInterval = setTimeout(pageList.hideMenu, 900);
	}
};
-->
</script>
</head>
<body>
    <script language="javascript">
        <!--
var onload_functions = [];
var onUnload_functions = [];
-->
</script>

    
        <a name="top"></a>
        <div class="container-fluid">
            <div class="header">
                <div class="row">
                    <div class="col-md-offset-1 col-md-2 ">
                        <div class="logo">
                            <a href="./index.php">
                                
                                <img class="img-responsive" src="./image.php?id=config_site_logo_d9c613aeccd21aa34c5afcaf2269a924.png" width="180" height="160">
                                
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="header_user">
                            <!--<ul class="nav nav-pills">
                                <li role="presentaition"><a href="./index.php"><span class="glyphicon glyphicon-home"></span> 首頁</a></li>
                                
                                <li role="presentaition"><a href="./ucp.php?mode=login">
                                        <span class="glyphicon glyphicon-log-in"></span> 登入
                                        </a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <div class="clearer"></div>
            </div>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <div class="navbar-title" style="display: none;">
                            <center>
                            <p style="color:white;margin-top: -3%">YUAN CHING</p>
                            <h2 style="color:white;font-weight: 800; margin-top: -1%">元慶地產</h2>
                            <h2 style="color:white;font-weight: 800; margin-top: -1%">垣慶建設</h2>
                            <p style="font-size:1em;color:white; margin-top: -10px !important;">YUAN-CHING CONSTRUCTION CO., LTD.</p>

                            </center>
                        </div>
                        <button style="padding-top: -20px;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li> <a href="#"> YUAN CHING </a></li>
                            <li id="icon-about" class="menu_about"><a href="./content.php?cn=about" onmouseover="pageList.swapMenu('about');"><span></span><span class="text">關於垣慶建設．元慶地產</span></a></li>
                            <li id="icon-item" class="menu_item"><a href="./content.php?cn=item" onmouseover="pageList.swapMenu('item');"><span></span><span class="text">公司年鑑</span></a></li>
                            <li id="icon-contact" class="menu_contact"><a href="./content.php?cn=contact" onmouseover="pageList.swapMenu('contact');"><span></span><span class="text">聯絡我們</span></a></li>
                            <li id="icon-news" class="menu_news"><a href="./content.php?cn=news" onmouseover="pageList.swapMenu('news');"><span></span><span class="text">最新消息</span></a></li>
                        </ul>
                    </div>
                </div>
        </nav></div>
        
  
        <div id="page_body">
            <div class="container">
                
   
<div id="content">
   
     
        
                <div class="item_cat">
                 <div class="col-md-3">
                    
                    
                    
                    <div class="all_cat">
                    
                    

  
    <div class="portal_search">
 <form action="" method="post" onsubmit="return checkSearchForm(this);">

     
 <img style="width:225px;height:40px; padding-left:20px; padding-top:10px;" src="./styles/rwd_yc/theme/images/search.png"> <br>
	<div class="input-group">
         
        <span class="input-group-addon" style="background:#6B3A09"> <span class="glyphicon glyphicon-search" style="color:#fff; ;"></span></span><input type="text" class="form-control" name="itemName"> 
		 
		<input type="submit" name="search" style="background:url(./styles/rwd_yc/theme/images/search1.png)  no-repeat; display:none;" value="          ">
		 
 	</div>
		
	</form>


	</div>
   </div>
  <div class="clear"></div>

<!--
  <script type="text/javascript">

function checkSearchForm(formObj) {
	if(!$(formObj).find('input[name="itemName"]').val()) {
		return false;
	}
	return true;

}
-->


<div class="col-md-13">
<div class="portal-cat">
<ul class="list-unstyled">

    <li class="main_cat"><a href="./content.php?cn=item&amp;cid=2">  歷年建案</a></li>
       <div class="clear"></div>
        <ul class="list-unstyled">
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=30">2017年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=5">2015年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=4">2014年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=6">2013年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=7">2012年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=8">2011年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=9">2010年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=10">2009年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=17">2008年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=19">2007年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=20">2005年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=21">2004年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=22">2003年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=23">2002年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=24">2001年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=25">2000年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=16">1998年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=15">1997年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=14">1996年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=13">1994年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=12">1993年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=11">1992年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=28">1991年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=27">1973年</a></li>
                <div class="clear-lit"></div>
                
                <li class="sub_cat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:10px;height:10px; margin-top:-5px;" src="./styles/rwd_yc/theme/images/libg.png"><a href="./content.php?cn=item&amp;cid=26">1971年</a></li>
                <div class="clear-lit"></div>
            
         </ul>   
    
</ul>

                    </div>
            	</div>
                </div> 
              
                  <div class="navlink">
                      <a href="./index.php">首頁</a> 
                &gt; <a href="./content.php?cn=item">公司年鑑</a> 

              
                  &gt; <a href="./content.php?cn=item&amp;cid=2">歷年建案</a> 

              
                  &gt; <a href="./content.php?cn=item&amp;cid=30">2017年</a> 

              
                  &gt; <a href="./content.php?cn=item&amp;cid=30&amp;tid=59">繪 · 幸福 5F電梯墅</a> 

              
                  
                 </div>    
              
                  <div class="clear"></div>       
        

                <script type="text/javascript">
                    $(document).ready(function(){
                   if($( window ).width()>800){
                        $('.navbar-title').hide();
                   }else if( $(window ).width()<420 ){
                        $('.navbar-title').show();

                   }
                   });

                </script>   
    <script language="javascript">
	<!--
	$(document).ready(function(){
		$("a[rel=colorbox]").colorbox({photo: true});
	});
	-->
	</script>
 
   
     </div>
  <div class="col-md-9">
    <div class="item_block">
      	<div class="item_view">
        <div class="col-md-5">
           					<div class="clear"> </div>
            	<div class="item_view_img">
               	 	
                	  	<img id="show_image" src="./content.php?cn=item&amp;tid=59&amp;action=image" alt="繪 · 幸福 5F電梯墅">       
                	

               	</div>     
        </div> 
              
            
                 					<div class="clear"></div>
               			<div class="share">
            				<span class="text">分享至  : 
		           	 		<a href="#" onclick="share(this, 'facebook');"><img src="./styles/rwd_yc/theme/images/icon-facebook.png" title="{ SHARE_WITH_FACEBOOK }"></a> 
				            <a href="#" onclick="share(this, 'plurk');"><img src="./styles/rwd_yc/theme/images/icon-plurk.png" title="{ SHARE_WITH_PLURK }"></a>
				            <a href="#" onclick="share(this, 'twitter');"><img src="./styles/rwd_yc/theme/images/icon-twitter.png" title="{ SHARE_WITH_TWITTER }"></a>
				        <!--    <a href="#" onclick="share(this, 'googleplus');"><img src="./styles/rwd_yc/theme/images/icon-googleplus.png" title="{ SHARE_WITH_GOOGLEPLUS }" /></a> -->
				            </span>
            			</div>
            	              													 <div class="clear"></div>
            							<div class="item_view_name">建案名稱: 繪 · 幸福 5F電梯墅</div>
            	               											<div class="clear"></div>
          
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous 
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


            
            				<div class="item_view_block">
            					<ul class="list-unstyled">

             		    		
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=407" alt="179168.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=407&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=408" alt="179169.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=408&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=409" alt="179170.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=409&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=410" alt="179171.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=410&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=411" alt="179175.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=411&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=412" alt="179176.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=412&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=413" alt="179177.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=413&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=414" alt="179178.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=414&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=415" alt="179179.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=415&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=416" alt="179180.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=416&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=417" alt="179181.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=417&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li>
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=418" alt="179182.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=418&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=419" alt="179183.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=419&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=420" alt="179184.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=420&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=421" alt="179185.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=421&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=422" alt="179186.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=422&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=423" alt="179187.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=423&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=424" alt="179188.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=424&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=425" alt="179189.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=425&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=426" alt="179190.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=426&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=427" alt="179191.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=427&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=428" alt="179192.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=428&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=429" alt="179193.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=429&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=430" alt="179194.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=430&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=431" alt="179195.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=431&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=432" alt="179198.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=432&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=433" alt="179199.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=433&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=434" alt="179200.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=434&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=435" alt="179201.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=435&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=436" alt="179202.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=436&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=437" alt="179203.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=437&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=438" alt="179204.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=438&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=439" alt="179205.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=439&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=440" alt="179206.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=440&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=441" alt="179207.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=441&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=442" alt="179208.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=442&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=443" alt="179209.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=443&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=444" alt="179210.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=444&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=445" alt="179213.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=445&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=446" alt="179214.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=446&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=447" alt="179216.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=447&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
                		 			 <div class="attachBlock">
                   					 <li style="display: none;">
                   					 <div id="links">
				                    <a href="./content.php?cn=item&amp;action=play&amp;a=448" alt="179217.jpg" rel="colorbox" data-gallery="">
				                    <img src="./content.php?cn=item&amp;action=play&amp;a=448&amp;thumb=m" style="width: 90px; height: 90px; margin-top: 0px; margin-left: 0px;">
				                    </a>
				                    </div>
				                    </li></div>
				                    
				                 	
				                 	
				                </ul>
                 				
        					 
        				</div>

           				
           
         										 
         										 	 

        
        <div class="item_detail col-md-5">
        	
            	<div class="item_view_price " style="background: url(./images/01.jpg)no-repeat;">
	            	
        				<strong>建案日期:  2017 年</strong>
        		</div>

        	</div>
        			
			<div class="item_view_cart"> 
		            	
					
		      

     	 <div class="item_view_des     ">
   


     	 <p>&nbsp;</p>

<p><img alt="" class="img-responsive" src="./image.php?id=150623-385xau" style="height:58px; width:825px"></p>

<p>&nbsp;</p>

<p><a href="http://youtrust.com.tw/1050116-fix1.jpg"><img alt="" class="img-responsive" src="./image.php?id=170608-1z7zc5" style="height:1017px; width:1200px"></a></p>

<p>&nbsp;</p>

<div class="embed-responsive embed-responsive-4by3"><iframe frameborder="0" height="450" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.373221445506!2d120.23789271496756!3d23.01006478495941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346e76d75476fc1f%3A0x33c198021285ce14!2zNzEw5Y-w5Y2X5biC5rC45bq35Y2A5Y2X5bel6KGXNDXomZ8!5e0!3m2!1szh-TW!2stw!4v1496891128714" style="border:0" width="600"></iframe></div>

<p>&nbsp;</p>
          
		 
		</div>
		</div>
		 
		 
		</div>

	
              		 
  <div class="clear"></div>

    
		<div class="clear"></div> 
			</div>
			</div>
	 
 </div>

<script type="text/javascript">
	$(function(){
		 
		var $showImage = $('.item_view .item_view_img img');
		
		 
		$('#links a ').mouseover(function(){
		 
			var $this = $(this), 
				_src = $this.attr('href');

			if($showImage.attr('src') != _src){
				$showImage.stop(false, true).fadeTo(0, 0).attr('src', _src).stop(false, true).fadeTo(400, 1);
			}
		}) 
	});
</script>


<script language="javascript">

<!--
 	
														 
	$('.item_view .item_view_img  ').load(function() {
		var obj = $(this);
		var block_w = obj.parent('.item_view_img img').width();
		var block_h = obj.parent('.item_view_img img').height();
		
		var width = obj.width();
		var height = obj.height();
		
		w_rate = (block_w / width);
		h_rate = (block_h / height);
	
		/*
 		run item_view
		if(width <= block_w && height <= block_h) {
			new_width = width;
			new_height = height;
		} else */if (w_rate <= h_rate) {
			new_width = Math.floor(width * h_rate);
			new_height = block_h;
		} else {
			new_width = block_w;
			new_height = Math.floor(height * w_rate);
		}
		
		var left = Math.floor((block_w-new_width)/2) + 'px';
		var top = Math.floor((block_h-new_height)/2) + 'px';
		
		var cssSetting = {
			'width': new_width,
			'height': new_height,
			'margin-top': top, 
			'margin-left': left
		};
		
		obj.css(cssSetting);
	});
	
	$('.attachBlock img').load(function() {
		var obj = $(this);
		var block_w = obj.parent('a').width();
		var block_h = obj.parent('a').height();
		
		var width = obj.width();
		var height = obj.height();
		
		w_rate = (block_w / width);
		h_rate = (block_h / height);
		/*
		if(width <= block_w && height <= block_h) {
			new_width = width;
			new_height = height;
		} else */
		if (w_rate <= h_rate) {
			new_width = Math.floor(width * h_rate);
			new_height = block_h;
		} else {
			new_width = block_w;
			new_height = Math.floor(height * w_rate);
		}
		
		var left = Math.floor((block_w-new_width)/2) + 'px';
		var top = Math.floor((block_h-new_height)/2) + 'px';
		
		var cssSetting = {
			'width': new_width,
			'height': new_height,
			'margin-top': top, 
			'margin-left': left
		};
		
		obj.css(cssSetting);
	});

-->
</script>


<script language="javascript">
<!--

var itemMgr = {
	addCart: function(obj) {

		var blockObj = $(obj).parents('.item_block');
		
		var $url = $(obj).attr('href').replace(/&amp;/gi, '&');
		//var $url = url.replace(/&amp;/gi, '&');
		$url += '&ajaxMode=1';
		
		$.ajax({
			url: $url,
			cache: false, 
			dataType: 'json',
			success: function(data){
				
				$('#cartMsg').html(data.msg);
				//¥¢±Ñ
				if(data.error || !itemCartMgr.add) {
					$.blockUI({
						message: $('#cartForm'),
						css: { 
							border: 'none', 
							padding: '15px', 
							backgroundColor: '#000', 
							'-webkit-border-radius': '10px', 
							'-moz-border-radius': '10px', 
							opacity: .85, 
							cursor: 'default',
							color: '#fff' 
						},
						overlayCSS:  { 
							backgroundColor: '#000',
							opacity: .5,
							cursor: 'default'
						}
					});
				}
				//¦¨¥\
				if(itemCartMgr.add && !data.error) {
					itemCartMgr.add(data);
					
					var cloneObj = $('<div class="item_block">' + $(blockObj).html() + '</div>');
					cloneObj.css({'position': 'absolute'});
					cloneObj.insertBefore(blockObj);
					cloneObj.css({'top': blockObj.offset().top, 'left': blockObj.offset().left});
					
					cloneObj.animate({
						opacity: 0.1,
						left: $('#itemCartList').offset().left,
						top: $('#itemCartList').offset().top,
						height: 'toggle',
						width: 'toggle'
					}, 1000, function() {
						$(this).remove();
					});
					
				}
			},
			error: function(e) {
				alert('Connect Fault!');
				
			}
		});
	}
}

-->
</script>	


<div id="cartForm" style="display: none;">
	<div id="cartMsg"></div>
    
    <a href="#" onclick="$.unblockUI();return false;">繼續購物</a> <a href="./ucp.php?i=item&amp;mode=cart">前往購物車</a>
</div>
</div>





        </div>
        
     
        
        <div class="clearer"></div>
	
    
    <div class="footer"></div>
	
     <div class="clear"></div>
<!--page_body-->
<div class="container-fluid">
<div id="page_footer">
    <div class="page_footer_line">
    
    <p style="text-align:center">&nbsp;</p>

<p style="text-align:center"><span style="font-size:18px">垣 慶 建 設 股 份 有 限 公 司 </span><strong>YUAN-CHING CONSTRUCTION CO., LTD.</strong><span style="font-size:20px">&nbsp;</span><span style="font-size:16px"> 地 址 : 台南市北區開元路212巷52號</span><span style="font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="font-size:16px">電&nbsp; 話 : (0 6) -2751103</span></p>

<p style="text-align:center">&nbsp;</p>
    
    </div>

</div>
<div style="text-align: center;">

</div>


</div></body></html>