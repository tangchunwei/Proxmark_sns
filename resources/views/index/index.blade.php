@extends('layouts.main')

@section('title','Proxmark3 主页')

@section('content')


@include('layouts.header')

<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md8">
      <div class="fly-panel">
        <div class="fly-panel-title fly-filter">
          <a>置顶</a>
          <a href="#signin" class="layui-hide-sm layui-show-xs-block fly-right" id="LAY_goSignin" style="color: #FF5722;">去签到</a>
        </div>
        <ul class="fly-list">
        @foreach($top4 as $t4)
          <li>
            <a href="user/home.html" class="fly-avatar">
              @if($t4->user->mdface)
              <img src="{{ Storage::url($t4->user->mdface) }}" alt="{{ $t4->user->name }}">
              @else
              <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="{{ $t4->user->name }}">
              @endif
            </a>
            <h2>
              <a class="layui-badge">{{ $t4->class }}</a>
              <a class="layui-badge layui-bg-green">{{ $t4->type }}</a>
              <a href="{{ route('tie_detail',['id'=>($t4->id)]) }}">{{ $t4->title }}</a>
            </h2>
            <div class="fly-list-info">
              <a href="user/home.html" link>
                <cite>{{ $t4->user->name }}</cite>
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
              </a>
              <span>{{ $t4->created_at }}</span>
              
              <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
              <span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>
              <span class="fly-list-nums"> 
                <i class="iconfont icon-pinglun1" title="回答"></i> 66
              </span>
            </div>
            <div class="fly-list-badge">
              @if($t4->is_top=="1")
              <span class="layui-badge layui-bg-black">置顶</span>
              @endif
              @if($t4->is_jing=="1")
              <span class="layui-badge layui-bg-red">精帖</span>
              @endif
            </div>
          </li>
        @endforeach
          
        </ul>
      </div>








      <div class="fly-panel" style="margin-bottom: 0;">
        
        <div class="fly-panel-title fly-filter">
          <a href="{{ route('tie_list',['type'=>' ','is_jing'=>' ']) }}" class="layui-this tie_list">综合</a>
          <span class="fly-mid"></span>
          <a href="{{ route('tie_list',['type'=>'分享','is_jing'=>' ']) }}" class="tie_list">分享</a>
          <span class="fly-mid"></span>
          <a href="{{ route('tie_list',['type'=>'提问','is_jing'=>' ']) }}" class="tie_list">提问</a>
          <span class="fly-mid"></span>
          <a href="{{ route('tie_list',['type'=>'分享','is_jing'=>'1']) }}" class="tie_list">精华</a>
        
        </div>
 


        <ul class="fly-list" id="tie_list">    
          
        </ul>
   
        



      </div>
    </div>
    <div class="layui-col-md4">

      <div class="fly-panel">
        <h3 class="fly-panel-title">温馨通道</h3>
        <ul class="fly-panel-main fly-list-static">
          <li>
            <a href="http://fly.layui.com/jie/4281/" target="_blank">layui 的 GitHub 及 Gitee (码云) 仓库，欢迎Star</a>
          </li>
          <li>
            <a href="http://fly.layui.com/jie/5366/" target="_blank">
              layui 常见问题的处理和实用干货集锦
            </a>
          </li>
          <li>
            <a href="http://fly.layui.com/jie/4281/" target="_blank">layui 的 GitHub 及 Gitee (码云) 仓库，欢迎Star</a>
          </li>
          <li>
            <a href="http://fly.layui.com/jie/5366/" target="_blank">
              layui 常见问题的处理和实用干货集锦
            </a>
          </li>
          <li>
            <a href="http://fly.layui.com/jie/4281/" target="_blank">layui 的 GitHub 及 Gitee (码云) 仓库，欢迎Star</a>
          </li>
        </ul>
      </div>


      <div class="fly-panel fly-signin">
        <div class="fly-panel-title">
          签到
          <i class="fly-mid"></i> 
          <a href="javascript:;" class="fly-link" id="LAY_signinHelp">说明</a>
          <i class="fly-mid"></i> 
          <a href="javascript:;" class="fly-link" id="LAY_signinTop">活跃榜<span class="layui-badge-dot"></span></a>
          <span class="fly-signin-days">已连续签到<cite>16</cite>天</span>
        </div>
        <div class="fly-panel-main fly-signin-main">
          <button class="layui-btn layui-btn-danger" id="LAY_signin">今日签到</button>
          <span>可获得<cite>5</cite>飞吻</span>
          
          <!-- 已签到状态 -->
          <!--
          <button class="layui-btn layui-btn-disabled">今日已签到</button>
          <span>获得了<cite>20</cite>飞吻</span>
          -->
        </div>
      </div>

      <div class="fly-panel fly-rank fly-rank-reply" id="LAY_replyRank">
        <h3 class="fly-panel-title">回贴周榜</h3>
        <dl>
          <!--<i class="layui-icon fly-loading">&#xe63d;</i>-->
          <dd>
            <a href="user/home.html">
              <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
            </a>
          </dd>
          <dd>
            <a href="user/home.html">
              <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
            </a>
          </dd>
         
        </dl>
      </div>

      <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">本周热议</dt>
        <dd>
          <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
          <span><i class="iconfont icon-pinglun1"></i> 16</span>
        </dd>
        <dd>
          <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
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
      
      <div class="fly-panel fly-link">
        <h3 class="fly-panel-title">友情链接</h3>
        <dl class="fly-panel-main">
          <dd><a href="http://www.layui.com/" target="_blank">layui</a><dd>
          <dd><a href="http://layim.layui.com/" target="_blank">WebIM</a><dd>
          <dd><a href="http://layer.layui.com/" target="_blank">layer</a><dd>
          <dd><a href="http://www.layui.com/laydate/" target="_blank">layDate</a><dd>
          <dd><a href="mailto:xianxin@layui-inc.com?subject=%E7%94%B3%E8%AF%B7Fly%E7%A4%BE%E5%8C%BA%E5%8F%8B%E9%93%BE" class="fly-link">申请友链</a><dd>
        </dl>
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
 
<script src="../res/layui/layui.js"></script>
<script src="/js/jquery.min.js"></script>
<script>
layui.cache.page = '';
layui.cache.user = {
  username: '游客'
  ,uid: -1
  ,avatar: '../res/images/avatar/00.jpg'
  ,experience: 83
  ,sex: '男'
};
layui.config({
  version: "3.0.0"
  ,base: '../res/mods/' //这里实际使用时，建议改成绝对路径
}).extend({
  fly: 'index'
}).use('fly');
</script>

<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_30088308'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "w.cnzz.com/c.php%3Fid%3D30088308' type='text/javascript'%3E%3C/script%3E"));</script>
<script>

    $(function(){

      // 前端防XSS攻击
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

        var disallow_load = true;  // 是否不允许加载
		    var ajax_tie_url = "{{ route('tie_index') }}";

        function load_data(){
					
          $.ajax({
    
            type:"GET",
            url:ajax_tie_url,
            dataType:"json",
            success:function(data){
    
              if(data.next_page_url==null){
    
                $(window).off('scroll');
              }else {
    
                ajax_tie_url = data.next_page_url;
              }
    
              var html = "";
              $(data.data).each(function(k,v){
    
                html += '<li class="tie_zi">\
                    <a href="user/home.html" class="fly-avatar">';
                if(v.user.mdface){
                    html += '<img src="/uploads/'+ v.user.mdface +'" alt="'+ v.user.name +'">';
                }else {
                    html += '<img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="'+ v.user.name +'">';
                }

                html += '</a>\
                    <h2>\
                      <a class="layui-badge">'+v.class+'</a>\
                      <a class="layui-badge layui-bg-green">'+v.type+'</a>\
                      <a href="/tie_detail/'+ v.id +'">' + htmlspecialchars(v.title) + '</a>\
                    </h2>\
                    <div class="fly-list-info">\
                      <a href="user/home.html" link>\
                        <cite>'+ v.user.name +'</cite>\
                        <!--\
                        <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>\
                        <i class="layui-badge fly-badge-vip">VIP3</i>\
                        -->\
                      </a>\
                      <span>'+ v.created_at +'</span>  \
                      <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>\
                      <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->\
                      <span class="fly-list-nums"> \
                        <i class="iconfont icon-pinglun1" title="回答"></i> 66\
                      </span>\
                    </div>';
                    html += '<div class="fly-list-badge">';
                    if(v.is_top=="1"){
                      
                      html += '<span class="layui-badge layui-bg-black">置顶</span>';
                    }
                    if(v.is_jing=="1"){

                    html += '<span class="layui-badge layui-bg-red">精帖</span>';
                    }
                    html += '</div>';       
                    html += '</li>';
              });
    
              $("#tie_list").append(html);

              disallow_load = false;
            }
    
    
          });
        }

        load_data();

        $(window).on('scroll',function(){

            if(disallow_load){

                return;
            }

            var st = $(window).scrollTop();
            var wh = $(window).height();
            var dh = $(document).height();

            if(st + wh >= dh) {

                var img = $("<img src='/images/loading.gif'>");
                $('#tie_list').append(img);

                disallow_load = true;

                setTimeout(function(){

                    load_data();
                    img.remove();
                },2000);
            }
        });
        

        $(".tie_list").click(function(e){
            $(window).off('scroll');
            disallow_load = false;
            
            e.preventDefault(); // 阻止链接跳转
            var url = this.href; // 保存点击的地址
            ajax_tie_url = url;

            $(".fly-panel-title .layui-this").removeClass("layui-this");
    
            $(this).addClass("layui-this");

            $(".tie_zi").remove();
            load_data(); 

            $(window).on('scroll',function(){

                if(disallow_load){

                    return;
                }

                var st = $(window).scrollTop();
                var wh = $(window).height();
                var dh = $(document).height();
                console.log(st,wh,dh);
                if(st + wh >= dh) {

                    var img = $("<img src='/images/loading.gif'>");
                    $('#tie_list').append(img);

                    disallow_load = true;

                    setTimeout(function(){

                        load_data();
                        img.remove();
                    },2000);
                }
            });
        }); 
    });


</script>
@endsection