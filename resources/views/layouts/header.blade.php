<div class="fly-panel fly-column">
  <div class="layui-container">
    <ul class="layui-clear">
      <li class="layui-hide-xs layui-this"><a href="/">首页</a></li> 
      <li><a href="jie/index.html">信息</a></li> 
      <li><a href="jie/index.html">固件开发</a></li> 
      <li><a href="jie/index.html">硬件开发</a></li> 
      <li><a href="jie/index.html">软件开发</a></li> 
      <li><a href="jie/index.html">市场</a></li> 
      <li><a href="jie/index.html">非临近发展</a></li> 
      <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><span class="fly-mid"></span></li> 
    @if(session('id'))
      <!-- 用户登入后显示 -->
      <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="user/index.html">我发表的贴</a></li> 
      <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="user/index.html#collection">我收藏的贴</a></li> 
    @endif
    </ul> 
    
    <div class="fly-column-right layui-hide-xs"> 
      <span class="fly-search"><i class="layui-icon"></i></span> 
      <a href="{{ route('tie_add') }}" class="layui-btn">发表新帖</a> 
    </div> 
    <div class="layui-hide-sm layui-show-xs-block" style="margin-top: -10px; padding-bottom: 10px; text-align: center;"> 
      <a href="{{ route('tie_add') }}" class="layui-btn">发表新帖</a>
    </div> 
  </div>
</div>