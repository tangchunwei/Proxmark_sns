@extends('layouts.main')

@section('title','激活邮箱')

@section('content')

<div class="layui-container fly-marginTop fly-user-main">
  <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
    <li class="layui-nav-item">
      <a href="{{ route('user.home') }}">
        <i class="layui-icon">&#xe609;</i>
        我的主页
      </a>
    </li>
    <li class="layui-nav-item">
      <a href="{{ route('user.index') }}">
        <i class="layui-icon">&#xe612;</i>
        用户中心
      </a>
    </li>
    <li class="layui-nav-item layui-this">
      <a href="{{ route('user.set') }}">
        <i class="layui-icon">&#xe620;</i>
        基本设置
      </a>
    </li>
    <li class="layui-nav-item">
      <a href="{{ route('user.message') }}">
        <i class="layui-icon">&#xe611;</i>
        我的消息
      </a>
    </li>
  </ul>

  <div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
  </div>
  <div class="site-mobile-shade"></div>
  
  <div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
  </div>
  <div class="site-mobile-shade"></div>
  
  
  <div class="fly-panel fly-panel-user" pad20>
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title">
        <li class="layui-this">
          激活邮箱
        </li>
      </ul>
      <div class="layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
        <ul class="layui-form">
          <li class="layui-form-li">
            <label for="activate">您的邮箱：</label>
            @if( $data->email )
            <span class="layui-form-text">{{ $data->email }}
                @if($data->verified==1)
              <em style="color:#999;">（已成功激活）</em>
                @else
              <em style="color:#c00;">（尚未激活）</em>
                    @endif
            </span>
              @else
              <span class="layui-form-text">请 <a href="{{ route('user.set') }}" class="layui-form-a"  style="color:#4f99cf;">绑定</a>   邮箱
            </span>
            @endif
          </li>
          <li class="layui-form-li" style="margin-top: 20px; line-height: 26px;">

            <div>
              1. 如果您未收到邮件，或激活链接失效，您可以
              <a class="layui-form-a" style="color:#4f99cf;"  href="{{ route('verification') }}?email={{$data->email}}">重新发送邮件</a>，或者
              <a class="layui-form-a" style="color:#4f99cf;" href="{{ route('user.set') }}">更换邮箱</a>；
            </div>
            <div>
              2. 如果您始终没有收到 我们 发送的邮件，请注意查看您邮箱中的垃圾邮件；
            </div>
            <div>
              3. 如果你实在无法激活邮件，您还可以联系：2239991414@qq.com
            </div>
          </li>
        </ul>
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

<script src="../../res/layui/layui.js"></script>
<script>
layui.cache.page = 'user';
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
}).use('fly');
</script>

</body>
</html>
@endsection