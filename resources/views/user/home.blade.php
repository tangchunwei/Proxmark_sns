@extends('layouts.main')

@section('title','Proxmark3 主页')

@section('content')

<div class="fly-home fly-panel" style="background-image: url();">
  @if($user->bgface)
  <img src="{{ Storage::url($user->bgface) }}" alt=" {{ $user->name }}">
  @else
    <img src="/images/face.jpg" alt="">
  @endif
  <i class="iconfont icon-renzheng" title="Fly社区认证"></i>
  <h1>
    {{ $user->name }}
    <i class="iconfont icon-nan"></i>
    <!-- <i class="iconfont icon-nv"></i>  -->
    <i class="layui-badge fly-badge-vip">VIP3</i>
    <!--
    <span style="color:#c00;">（管理员）</span>
    <span style="color:#5FB878;">（社区之光）</span>
    <span>（该号已被封）</span>
    -->
  </h1>

  <p style="padding: 10px 0; color: #5FB878;">认证信息：layui 作者</p>

  <p class="fly-home-info">
    <i class="iconfont icon-kiss" title="飞吻"></i><span style="color: #FF7200;">66666 飞吻</span>
    <i class="iconfont icon-shijian"></i><span>{{ $user->created_at}} 加入</span>
    <i class="iconfont icon-chengshi"></i><span>来自{{ $user->city}}</span>
  </p>
  @if($user->signature=="")
  <p class="fly-home-sign">(这个人很懒，什么都没有留下)</p>
  @else
  <p class="fly-home-sign">({{ $user->signature }})</p>
  @endif


</div>

<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md6 fly-home-jie">
      <div class="fly-panel">
        <h3 class="fly-panel-title">{{ $user->name }} 最近的提问</h3>
        <ul class="jie-row">
          @foreach($data as $value)
                @if($value->is_jing)
              <li>
                <span class="fly-jing">精</span>
                <a href="{{ route('tie_detail',['id'=>($value->id)]) }}" class="jie-title"> {{ $value->title }}</a>
                <i>{{ substr($value->created_at,0,10)}}</i>
                <em class="layui-hide-xs">{{ $value->display }}阅/{{ $value->discuss }}答</em>
              </li>
              @else
              <li>
                <a href="{{ route('tie_detail',['id'=>($value->id)]) }}" class="jie-title"> {{ $value->title }}</a>
                <i>{{ substr($value->created_at,0,10)}}</i>
                <em class="layui-hide-xs">{{ $value->display }}阅/{{ $value->discuss }}答</em>
              </li>
              @endif
          @endforeach
          <!-- <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><i style="font-size:14px;">没有发表任何求解</i></div> -->
        </ul>
      </div>
    </div>
    
    <div class="layui-col-md6 fly-home-da">
      <div class="fly-panel">
        <h3 class="fly-panel-title">{{ $user->name }} 最近的回答</h3>
        <ul class="home-jieda">
            @foreach($reanswer as $value)
          <li>
          <p>
          <span>{{ $value->created_at }}</span>
          在<a href="{{ route('tie_detail',['id'=>($value->id)]) }}" target="_blank">{{ $value->tie->title }}</a>中回答：
          </p>
          <div class="home-dacontent">
              {!! clean($value->content) !!}
          </div>
        </li>
            @endforeach
          <!-- <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>没有回答任何问题</span></div> -->
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