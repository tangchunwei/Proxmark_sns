@extends('layouts.main')

@section('title')
    {{ $tie->title }}
@endsection

@section('content')


@include('layouts.header')

<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md8 content detail">
      <div class="fly-panel detail-box">
        <h1>{{ $tie->title }}</h1>
        <div class="fly-detail-info">
          <!-- <span class="layui-badge">审核中</span> -->
          <span class="layui-badge fly-detail-column">{{ $tie->class }}</span>

          <a class="layui-badge layui-bg-green">{{ $tie->type }}</a>
          
          @if($tie->is_top=="1")
          <span class="layui-badge layui-bg-black">置顶</span>
          @endif
          @if($tie->is_jing=="1")
          <span class="layui-badge layui-bg-red">精帖</span>
          @endif
          
          <span class="fly-list-nums"> 
            <a href="#comment"><i class="iconfont" title="回答">&#xe60c;</i> 66</a>
            <i class="iconfont" title="人气">&#xe60b;</i> {{ $tie->display }}
          </span>
        </div>
        <div class="detail-about">
          <a class="fly-avatar" href="../user/home.html">
            @if(Storage::url($tie->user->mdface))
            <img src="{{ Storage::url($tie->user->mdface) }}" alt="{{ $tie->user->name }}">
            @else
            <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="{{ $tie->user->name }}">
            @endif
          </a>
          <div class="fly-detail-user">
            <a href="../user/home.html" class="fly-link">
              <cite>{{ $tie->user->name }}</cite>
              <i class="iconfont icon-renzheng" title="认证信息："></i>
              <i class="layui-badge fly-badge-vip">VIP3</i>
            </a>
            
          </div>
          <div class="detail-hits" id="LAY_jieAdmin" data-id="123">
              <span>{{ $tie->created_at }}</span>          
          </div>
        </div>
        <div class="detail-body photos">
            {!! clean($tie->content) !!}
        </div>
      </div>

      <div class="fly-panel detail-box" id="flyReply">
        <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
          <legend>回帖</legend>
        </fieldset>

        <div class="layui-form layui-form-pane">
          @if(session('id'))
          <form>
            {{ csrf_field() }}
            <input type='hidden' name='tie_id' value='{{ $tie->id }}'>
            <div class="layui-form-item layui-form-text">
              <a name="comment"></a>
              <div class="layui-input-block">
                <textarea id="discuss" name="discuss" placeholder="请输入内容" style="height: 150px;"></textarea>
              </div>
            </div>
            <div class="layui-form-item">
              <input type="button" value="提交回复" class="layui-btn" id="btn-discuss">
            </div>
          </form>
          @else
          <h3 style="text-align:center;border:1px solid skyblue;height:38px;line-height:38px;"><a style="color:red;" href="{{ route('login') }}">登录</a>之后，可以发表评论</h3>
          @endif
        </div>

        <ul class="jieda" id="jieda">
          
          
          <!-- 无数据时 -->
          <!-- <li class="fly-none">消灭零回复</li> -->
        </ul>
        
        
      </div>
    </div>
    <div class="layui-col-md4">
      <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">本周热议</dt>
        <dd>
          <a href="">基于 layui 的极简社区页面模版</a>
          <span><i class="iconfont icon-pinglun1"></i> 16</span>
        </dd>
   
        <!-- 无数据时 -->
        <!--
        <div class="fly-none">没有相关数据</div>
        -->
      </dl>

      <div class="fly-panel">
        <div class="fly-panel-title">
          这里可作为广告区域
        </div>
        <div class="fly-panel-main">
          <a href="http://layim.layui.com/?from=fly" target="_blank" class="fly-zanzhu" time-limit="2017.09.25-2099.01.01" style="background-color: #5FB878;">LayIM 3.0 - layui 旗舰之作</a>
        </div>
      </div>

      <div class="fly-panel" style="padding: 20px 0; text-align: center;">
        <img src="../../res/images/weixin.jpg" style="max-width: 100%;" alt="layui">
        <p style="position: relative; color: #666;">微信扫码关注 layui 公众号</p>
      </div>

    </div>
  </div>
</div>

<div class="fly-footer">
  <p><a href="http://fly.layui.com/" target="_blank">Fly社区</a> 2017 &copy; <a href="http://www.layui.com/" target="_blank">layui.com 出品</a></p>
  <p>
    <a href="http://fly.layui.com/jie/3147/" target="_blank">付费计划</a>
    <a href="http://www.layui.com/template/fly/" target="_blank">获取Fly社区模版</a>
    <a href="http://fly.layui.com/jie/2461/" target="_blank">微信公众号</a>
  </p>
</div>
<style>

    img {

        max-width: 650px;
    }

</style>

<link href="/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/ueditor/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

<!-- 编辑器源码文件 -->
<script>
UM.getEditor('discuss', {
	initialFrameWidth:"100%",
	initialFrameHeight:"150"
});
</script>

<script src="../../res/layui/layui.js"></script>
<script>
layui.cache.page = 'jie';
layui.cache.user = {
  username: '游客'
  ,uid: -1
  ,avatar: '../../res/images/avatar/00.jpg'
  ,experience: 83
  ,sex: '男'
};
layui.config({
  version: "3.0.0"
  ,base: '../../res/mods/'
}).extend({
  fly: 'index'
}).use(['fly', 'face'], function(){
  var $ = layui.$
  ,fly = layui.fly;
  //如果你是采用模版自带的编辑器，你需要开启以下语句来解析。
  /*
  $('.detail-body').each(function(){
    var othis = $(this), html = othis.html();
    othis.html(fly.content(html));
  });
  */
});
</script>
<script src="/js/jquery.min.js"></script>
<script>

    $(function(){

        function htmlspecialchars(str) {

            var s = "";
            if (str.length == 0) return "";
            for   (var i=0; i<str.length; i++)
            {
              switch (str.substr(i,1))
              {
                case "<": s += "&lt;"; break;
                case ">": s += "&gt;"; break;
                case "&": s += "&amp;"; break;
                case " ":
                  if(str.substr(i + 1, 1) == " "){
                    s += " &nbsp;";
                    i++;
                  } else s += " ";
                  break;
                case "\"": s += "&quot;"; break;
                case "\n": s += "<br>"; break;
                default: s += str.substr(i,1); break;
              }
            }
            return s;
        }

        // 加载评论
        var ajax_get_url = "{{ route('discuss_index',['tie_id'=>$tie->id]) }}";
        var allow = true;  // 防止重复加载

        function load_data(){

            if(!allow){

              return;
            }

            allow = false;

            var img = $("<img src='/images/loading.gif'>");

            $(".jieda").append(img);

            setTimeout(function(){


              $.ajax({	

                type:"GET",
                url:ajax_get_url,
                dataType:"json",
                success:function(data){

                  if(data.next_page_url==null){

                    $(window).off("scroll");

                  }else {

                    ajax_get_url = data.next_page_url;
                  }

                  var html = "";
                  $(data.data).each(function(k,v){

                    html += '<li data-id="111" class="jieda-daan">\
            <a name="item-1111111111"></a>\
            <div class="detail-about detail-about-reply">\
              <a class="fly-avatar" href="">\
                <img src="/uploads/'+ v.user.mdface +'" alt=" ">\
              </a>\
              <div class="fly-detail-user">\
                <a href="" class="fly-link">\
                  <cite>'+ v.user.name +'</cite>\
                  <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>\
                  <i class="layui-badge fly-badge-vip">VIP3</i>\
                </a> \
                @if(session('id')=='+ v.user_id +')\
                <span>(楼主)</span>\
                @endif\
              </div>\
              <div class="detail-hits">\
                <span>'+ v.created_at +'</span>\
              </div>\
              <i class="iconfont icon-caina" title="最佳答案"></i>\
            </div>\
            <div class="detail-body jieda-body photos">'+ v.content +'</div>\
            <div class="jieda-reply">\
              <span class="jieda-zan zanok" type="zan">\
                <i class="iconfont icon-zan"></i>\
                <em>66</em>\
              </span>\
              <span type="reply">\
                <i class="iconfont icon-svgmoban53"></i>\
                回复\
              </span>\
              <div class="jieda-admin">\
                <span type="edit">编辑</span>\
                <span type="del">删除</span>\
                <!-- <span class="jieda-accept" type="accept">采纳</span> -->\
              </div>\
            </div>\
          </li>';         
                  });

                  // 显示到页面中
                  $(".jieda").append(html);

                  allow = true;
                  img.remove();
                }
              });

            },1000);    
        }

        load_data();

        $(window).on('scroll',function(){

            var wh = $(window).height();
            var sh = $(window).scrollTop();
            var dh = $(document).height();

            if(wh+sh >= dh){

              load_data();
            }
        });

        // 评论
        $('#btn-discuss').click(function(){
    
            var discuss = $.trim($('textarea[name=discuss]').val());
            var tie_id = $("input[name=tie_id]").val();
            var _token = $("input[name=_token]").val();

            if(discuss==""){

                alert("评论内容为空！");
                return;
            } 

            if(discuss.length > 500){

                alert("最多只能输入500字！");
                return;
            }

            $.ajax({

                type:"post",
                url:"/discuss",
                data:{content:discuss,tie_id:tie_id,_token:_token},
                dataType:"json",
                success:function(data){
                   
                    $(".edui-body-container").html('');
                    $("textarea[name=discuss]").val('');
                }
            });
            
        });


    });

    


</script>
@endsection