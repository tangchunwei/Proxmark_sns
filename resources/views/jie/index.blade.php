@extends('layouts.main')

@section('title','Proxmark3 社区')

@section('content')


@include('layouts.header')

<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md8">
      <div class="fly-panel" style="margin-bottom: 0;">
        
        <div class="fly-panel-title fly-filter">
          <a @if(Route::currentRouteName()=="class") class="layui-this" @endif href="{{ route('class',['class'=>$class]) }}">综合</a>
          <span class="fly-mid"></span>
          <a @if(Route::currentRouteName()=="class_share") class="layui-this" @endif href="{{ route('class_share',['class'=>$class,'type'=>'分享']) }}">分享</a>
          <span class="fly-mid"></span>
          <a @if(Route::currentRouteName()=="class_questions") class="layui-this" @endif href="{{ route('class_questions',['class'=>$class,'type'=>'提问']) }}">提问</a>
          <span class="fly-mid"></span>
          <a @if(Route::currentRouteName()=="jingtie") class="layui-this" @endif href="{{ route('jingtie',['class'=>$class]) }}">精华</a>
         
        </div>

        <ul class="fly-list"> 
          @foreach($tie as $t)
          <li>
            <a  class="fly-avatar">
              @if($t->user->mdface)
              <img src="{{ Storage::url($t->user->mdface) }}" width='44' alt="{{ $t->user->name }}">
              @else
              <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" width='44' alt="{{ $t->user->name }}">
              @endif
            </a>
            <h2>
              <a class="layui-badge">{{ $t->class }}</a>
              <a class="layui-badge layui-bg-green">{{ $t->type }}</a>
              <a href="{{ route('tie_detail',['id'=>($t->id)]) }}">{{ $t->title }}</a>
            </h2>
            <div class="fly-list-info">
              <a link>
                <cite>{{ $t->user->name }}</cite>
                <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
              </a>
              <span>{{ $t->created_at }}</span>
              
              <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
              <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
              <span class="fly-list-nums"> 
                <i class="iconfont icon-pinglun1" title="回答"></i> 66
              </span>
            </div>
            <div class="fly-list-badge">
              @if($t->is_top=="1")
              <span class="layui-badge layui-bg-black">置顶</span>
              @endif
              @if($t->is_jing=="1")
              <span class="layui-badge layui-bg-red">精帖</span>
              @endif
            </div>
          </li>
          @endforeach
          
        </ul>
        
        <!-- <div class="fly-none">没有相关数据</div> -->
    
        <div style="text-align: center">
          {{ $tie->links() }}
        </div>

      </div>
    </div>
    <div class="layui-col-md4">
      <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">本周热议</dt>

        @foreach($top10 as $t10)
        <dd>
          <a href="{{ route('tie_detail',['id'=>($t10->id)]) }}">{{ $t10->title }}</a>
          <span><i class="iconfont icon-pinglun1"></i> {{ $t10->discuss }}</span>
        </dd>
        @endforeach


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
          <a href="" target="_blank" class="fly-zanzhu" style="background-color: #393D49;">虚席以待</a>
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

<style>
    
    .active {
        background-color: #009E94;
    }

    .pagination {

        margin-top:10px;
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
<script src="/js/jquery.min.js"></script>
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
}).use('fly');
</script>


    

@endsection