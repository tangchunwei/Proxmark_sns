@extends('layouts.main')

@section('title','Proxmark3 主页')

@section('content')


  <div class="layui-container fly-marginTop fly-user-main">
  <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
    <li class="layui-nav-item">
      <a href="{{ route('user.home',['id'=>session('id')]) }}">
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
    <li class="layui-nav-item ">
      <a href="{{ route('user.set') }}">
        <i class="layui-icon">&#xe620;</i>
        基本设置
      </a>
    </li>
    <li class="layui-nav-item layui-this">
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
	  <div class="layui-tab layui-tab-brief" lay-filter="user" id="LAY_msg" style="margin-top: 15px;">
	    
	    <div  id="LAY_minemsg" style="margin-top: 10px;">
        <!--<div class="fly-none">您暂时没有最新消息</div>-->
        <ul class="mine-msg">
        @foreach($replys as $r)
          <li data-id="123">
            <input type="hidden" name="id" class="id" value="{{ $r->id }}">
            <blockquote class="layui-elem-quote">
              
              用户<a href="{{ route('user.home',['id'=>$r->user->id]) }}" target="_blank"><cite>{{ $r->user->name }}</cite></a>在帖子<a target="_blank" href="{{ route('tie_detail',['id'=>($r->tie->id)]) }}"><cite>{{ $r->tie->title }}</cite></a>中@了您
            </blockquote>
            <p><span>{{ $r->created_at }}</span><a href="javascript:;" class="layui-btn layui-btn-small layui-btn-danger rpy_del">删除</a></p>
          </li>
        @endforeach
        </ul>
        <div style="text-align: center">
          {{ $replys->links() }}
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
<style>
    
    .active {
        background-color: #009E94;
    }

    .pagination {

        margin-top:35px;
        padding-bottom:5px;
    }

    .pagination li {

        display:inline-block;
        width:42px;
        border-radius:8px;
        border: 1px solid #009E94
    }

    .pagination li a {

        display:inline-block;
        width:42px;
        line-height:32px;
    }

    .pagination li span {

        display:inline-block;
        line-height:32px;
    }
  
  </style>
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
<script src="/js/jquery.min.js"></script>
<script>

    $(".rpy_del").click(function(){
        var id = $(this).parent().parent().children(".id").val();

        if(confirm("确定要删除？")){
            
            location.href="/rpy_del?id="+id;
        }
    });

</script>
@endsection