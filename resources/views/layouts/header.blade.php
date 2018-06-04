<div class="fly-panel fly-column">
  <div class="layui-container">
    <ul class="layui-clear">
      <li @if(Route::currentRouteName()=="index") class="layui-hide-xs layui-this" @else class="layui-hide-xs" @endif><a href="{{ route('index') }}">首页</a></li> 
      <li @if(Route::currentRouteName()=="information" || (isset($class)&&$class=="信息")) class="layui-this" @endif><a href="{{ route('information',['class'=>'信息']) }}">信息</a></li> 
      <li @if(Route::currentRouteName()=="firmware" || (isset($class)&&$class=="固件开发")) class="layui-this" @endif><a href="{{ route('firmware',['class'=>'固件开发']) }}">固件开发</a></li> 
      <li @if(Route::currentRouteName()=="hardware" || (isset($class)&&$class=="硬件开发")) class="layui-this" @endif><a href="{{ route('hardware',['class'=>'硬件开发']) }}">硬件开发</a></li> 
      <li @if(Route::currentRouteName()=="software" || (isset($class)&&$class=="软件开发")) class="layui-this" @endif><a href="{{ route('software',['class'=>'软件开发']) }}">软件开发</a></li> 
      <li @if(Route::currentRouteName()=="market" || (isset($class)&&$class=="市场")) class="layui-this" @endif><a href="{{ route('market',['class'=>'市场']) }}">市场</a></li> 
      <li @if(Route::currentRouteName()=="development" || (isset($class)&&$class=="非临近发展'")) class="layui-this" @endif><a href="{{ route('development',['class'=>'非临近发展']) }}">非临近发展</a></li> 
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