@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop

@section('content')
    <p>This is my body content.</p>
@stop


<div class="gb_vc" aria-expanded="false" aria-label="主選單" role="button" 
tabindex="0"><svg focusable="false" viewBox="0 0 24 24"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path></svg></div>

<div class="gb_Kc" role="menu"><div><c-wiz jsrenderer="lJVV9" jsshadow="" jsdata="deferred-i1" jscontroller="GILUZe" jsaction="click:cOuCgd;RI2Xre:Vtdxob;"
     data-node-index="0;0" jsmodel="hc6Ubd"><nav jsaction="click:igH3i(MMRVdf),Q3Z9wc(wNMsOe),SA7gC(h9d3hd),u56up(abkpZe);" jscontroller="s2XCRc" 
     data-language-code="zh-TW" role="contentinfo"><div class="GR2kEe"><a class="yJWPX" tabindex="0" href="https://translate.google.com/about/?hl=zh-TW" 
        jsname="wNMsOe">關於 Google 翻譯</a></div><div class="GR2kEe"><a class="yJWPX" tabindex="0" href="https://policies.google.com/?hl=zh-TW" 
            jsname="abkpZe">隱私權與條款</a><a class="yJWPX" tabindex="0" href="https://support.google.com/translate/?hl=zh-TW" jsname="h9d3hd" 
            data-probe-id="help_menu_link">說明</a><a class="yJWPX" tabindex="0" jsaction="click: AmrRnd, KSdrLb;" jsname="N7Eqid">提供意見</a><a class="yJWPX" 
            tabindex="0" href="https://www.google.com/about?hl=zh-TW" jsname="MMRVdf">關於 Google
        </a></div></nav><c-data id="i1"></c-data></c-wiz><script aria-hidden="true" nonce="">window.wiz_progress&&window.wiz_progress();window.wiz_tick&&window.wiz_tick('lJVV9');</script></div></div>