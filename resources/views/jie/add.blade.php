@extends('layouts.main')

@section('title','发表新帖')

@section('content')

<div class="layui-container fly-marginTop">
  <div class="fly-panel" pad20 style="padding-top: 5px;">
    <!--<div class="fly-none">没有权限</div>-->
    <div class="layui-form layui-form-pane">
      <div class="layui-tab layui-tab-brief" lay-filter="user">
        <ul class="layui-tab-title">
          <li class="layui-this">发表新帖<!-- 编辑帖子 --></li>
        </ul>
        <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
          <div class="container">
            @if($errors->any())
              <ul class="error">
                @foreach($errors->all() as $e)
                  <li>{{$e}}</li>
                @endforeach
              </ul>
            @endif
          </div>
          <div class="layui-tab-item layui-show">
            <form action="{{ route('tie_doadd') }}" method="post">
              {{ csrf_field() }}
              <div class="layui-row layui-col-space15 layui-form-item">
                <div class="layui-col-md3">
                  <label class="layui-form-label">所在专栏</label>
                  <div class="layui-input-block">
                    <select lay-verify="required" id="class" name="class" lay-filter="column"> 
                      <option></option> 
                      <option value="信息">信息</option> 
                      <option value="固件开发">固件开发</option> 
                      <option value="硬件开发">硬件开发</option> 
                      <option value="软件开发">软件开发</option> 
                      <option value="市场">市场</option> 
                      <option value="非临近发展">非临近发展</option>
                    </select>
                  </div>
                </div>

                <div class="layui-col-md9">
                  <label for="L_title" class="layui-form-label">标题</label>
                  <div class="layui-input-block">
                    <input type="text" id="L_title" name="title" required lay-verify="required" autocomplete="off" class="layui-input">
                   
                  </div>
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">类型</label>
                <div class="layui-input-block">
                  <input type="radio" name="type" value="分享" title="分享" checked>                  
                  <input type="radio" name="type" value="提问" title="提问">
                </div>
              </div>

              <div class="layui-form-item layui-form-text">
                <div class="layui-input-block">
                  <textarea style="margin-top:20px;" id="L_content" name="content" required lay-verify="required" placeholder="详细描述" class="layui-textarea fly-editor" style="height: 260px;"></textarea>
                </div>
              </div>
              
              <div class="layui-form-item">

                <label for="L_vercode" class="layui-form-label">人类验证</label>
                <div class="layui-input-inline">
                  <input type="text" id="L_vercode" name="answer" required lay-verify="required" placeholder="请回答后面的问题" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid">
                  @foreach($questions as $v)
                    <span style="color: #c00;">{{ $v->question }}</span>
                  @endforeach
                </div>
              </div>
              <div class="layui-form-item">

                <button class="layui-btn" lay-filter="*" lay-submit>立即发布</button>
              </div>
            </form>
          </div>
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

    .layui-form-select dl {

         z-index:1000;
    }

</style>
<script src="../../res/layui/layui.js"></script>
<script>
layui.cache.page = 'jie';

layui.config({
  version: "3.0.0"
  ,base: '../../res/mods/'
}).extend({
  fly: 'index'
}).use('fly');
</script>

<link href="/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/ueditor/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="ueditor.all.js"></script>
<script>
UM.getEditor('L_content', {
	initialFrameWidth:"100%",
	initialFrameHeight:"300"
});
</script>

@endsection