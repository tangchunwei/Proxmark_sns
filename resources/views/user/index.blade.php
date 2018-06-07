@extends('layouts.main')

@section('title','Proxmark3 主页')

@section('content')

<div class="layui-container fly-marginTop fly-user-main">
  <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
    <li class="layui-nav-item  ">
      <a href="{{ route('user.home') }}">
        <i class="layui-icon">&#xe609;</i>
        我的主页
      </a>
    </li>
    <li class="layui-nav-item  layui-this">
      <a href="{{ route('user.index') }}">
        <i class="layui-icon">&#xe612;</i>
        用户中心
      </a>
    </li>
    <li class="layui-nav-item">
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
    <!--
    <div class="fly-msg" style="margin-top: 15px;">
      您的邮箱尚未验证，这比较影响您的帐号安全，<a href="activate.html">立即去激活？</a>
    </div>
    -->
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title" id="LAY_mine">
        <li data-type="mine-jie" lay-id="index" class="layui-this">我发的帖<span></span></li>
        <li data-type="collection" data-url="/collection/find/" lay-id="collection">我收藏的帖<span></span></li>
        {{--用户发表的帖子--}}
      </ul>
      <div class="layui-tab-content" style="padding: 20px 0;">
        <div class="layui-tab-item layui-show">
          <ul class="mine-view jie-row">
              @foreach($data as $value)
            <li>
              <a class="jie-title" href="{{ route('tie_detail',['id'=>($value->id)]) }}" target="_blank">{{ $value->title }}</a>
              <i>发表于{{ $value->created_at }}</i>
              {{--<a class="mine-edit" href="">编辑</a>--}}
              <em>{{ $value->display }}阅/{{ $value->discuss }}答</em>
            </li>
              @endforeach

          {{--用户发表的帖子--}}
          <div id="LAY_page"></div>
        </div>
        <div class="layui-tab-item">
          {{--用户收藏的帖子--}}
          <ul class="mine-view jie-row">
              @foreach($Collection as $value)
            <li>
              <a class="jie-title" href="{{ route('tie_detail',['id'=>($value->tie->id)]) }}" target="_blank">{{ $value->tie->title }}</a>
              <i>收藏于{{ $value->created_at }}</i>
            </li>
              @endforeach
          </ul>
          {{--用户收藏的帖子--}}
          <div id="LAY_page1"></div>
        </div>
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