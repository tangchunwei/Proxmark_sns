 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="fly,layui,前端社区">
  <meta name="description" content="Fly社区是模块化前端UI框架Layui的官网社区，致力于为web开发提供强劲动力">
  <link rel="stylesheet" href="/res/layui/css/layui.css">
  <link rel="stylesheet" href="/res/css/global.css">
  
</head>
<body>

<div class="fly-header layui-bg-black">
  <div class="layui-container">
    <a class="fly-logo" href="/">
      <img src="/res/images/logo.png" alt="layui">
    </a>
    <ul class="layui-nav fly-nav layui-hide-xs">
      <li class="layui-nav-item layui-this">
        <a href="/"><i class="iconfont icon-shouye"></i>国内交流</a>
      </li>
      <li class="layui-nav-item">
        <a href="http://proxmark.org/forum/index.php" target='_brank'><i class="iconfont icon-jiaoliu"></i>国外社区</a>
      </li>
      <li class="layui-nav-item">
        <a href="http://proxmark.org" target='_brank'><i class="iconfont icon-iconmingxinganli"></i>淘宝链接</a>
      </li>
    </ul>
    
    <ul class="layui-nav fly-nav-user">
      
      @if(!session('id'))
      <!-- 未登入的状态 -->
      <li class="layui-nav-item">
        <a class="iconfont icon-touxiang layui-hide-xs" href="{{ route('login') }}"></a>
      </li>
      <li class="layui-nav-item">
        <a href="{{ route('login') }}">登入</a>
      </li>
      <li class="layui-nav-item">
        <a href="{{ route('regist') }}">注册</a>
      </li>
      <li class="layui-nav-item layui-hide-xs">
        <a href="/app/qq/" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" title="QQ登入" class="iconfont icon-qq"></a>
      </li>
      @else
      <!-- 登入后的状态 -->

      <li class="layui-nav-item">
        <a class="fly-nav-avatar" href="javascript:;">
          <cite class="layui-hide-xs">{{ session('name') }}</cite>
          <i class="iconfont icon-renzheng layui-hide-xs" title="认证信息：layui 作者"></i>
          <i class="layui-badge fly-badge-vip layui-hide-xs">VIP3</i>
          <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg">
        </a>
        <dl class="layui-nav-child">
          <dd><a href="{{ route('user.set') }}"><i class="layui-icon">&#xe620;</i>基本设置</a></dd>
          <dd><a href="{{ route('user.message') }}"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
          <dd><a href="{{ route('user.home') }}"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a></dd>
          <hr style="margin: 5px 0;">
          <dd><a href="{{ route('logout') }}" style="text-align: center;">退出</a></dd>
        </dl>
      </li>
    @endif
    </ul>
  </div>
</div>


@yield('content')

</body>
</html>