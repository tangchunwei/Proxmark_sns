@extends('layouts.main')

@section('title','个人设置')

@section('content')
  <style>
    .img-container {
      width: 240px;
      height: 240px;
      float:left;
    }
    .img-container #pre_image {
      width: 100%;
    }
    .img-preview {
      float: left;
      overflow: hidden;
      margin-left: 20px;
    }

    .preview-lg {
      width: 240px;
      height: 240px;
    }

    .preview-md {
      width: 80px;
      height: 80px;
    }

    .preview-sm {
      width: 35px;
      height: 35px;
    }
  </style>

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
      <ul class="layui-tab-title" id="LAY_mine">
        <li class="layui-this" lay-id="info">我的资料</li>
        <li lay-id="avatar">头像</li>
        <li lay-id="pass">密码</li>
        <li lay-id="bind">帐号绑定</li>
      </ul>
      <div class="layui-tab-content" style="padding: 20px 0;">
        <div class="layui-form layui-form-pane layui-tab-item layui-show">
            <div class="container">
                @if($errors->any())
                    <ul class="error">
                        @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            {{--修改用户信息--}}
          <form action="{{route('changemessage')}}" method="post">
              {{ csrf_field() }}
            <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">邮箱</label>
              <div class="layui-input-inline">
                <input type="text" id="L_email" name="email" required lay-verify="email" autocomplete="off" value="{{ session('email') }}" class="layui-input">
              </div>
                @if($data->verified==1)
              <div class="layui-form-mid layui-word-aux">您的邮箱已激活，也可以作为登入名</div>
                    @else
                    <div class="layui-form-mid layui-word-aux">您的邮箱未激活，请<a href="{{ route('user.activate') }}" style="font-size: 12px; color: #4f99cf;">激活</a>。</div>
                @endif
            </div>
            <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">昵称</label>
              <div class="layui-input-inline">
                <input type="text" id="L_username" name="name" required lay-verify="required" autocomplete="off" value="{{ session('name') }}" class="layui-input">
              </div>
              <div class="layui-inline">
                <div class="layui-input-inline">
                    @if(session('sex')==0)
                  <input type="radio" name="sex" value="0" checked title="男">
                  <input type="radio" name="sex" value="1" title="女">
                    @else
                        <input type="radio" name="sex" value="0"  title="男">
                        <input type="radio" name="sex" value="1" checked title="女">
                    @endif
                </div>
              </div>
            </div>
            <div class="layui-form-item">
              <label for="L_city" class="layui-form-label">城市</label>
              <div class="layui-input-inline">
                <input type="text" id="L_city" name="city" autocomplete="off" value="{{ session('city') }}" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label for="L_sign" class="layui-form-label">签名</label>
              <div class="layui-input-block">
                <textarea placeholder="随便写些什么刷下存在感" id="L_sign"  name="signature" autocomplete="off" class="layui-textarea"  style="height: 80px;">{{ session('signature') }}</textarea>
              </div>
            </div>
            <div class="layui-form-item">
              <button class="layui-btn" key="set-mine" lay-filter="*">确认修改</button>
            </div>
          </div>
          </form>
          {{--修改用户信息--}}

          {{--修改头像--}}

                  <div class="layui-form layui-form-pane layui-tab-item">
                    <form action="{{ route('setface') }}" method="POST" enctype="multipart/form-data">
                      <div class="layui-form-item">
                                  {{ csrf_field() }}
                                  <div class="form-div">
                                    <input type="file" name="face">
                                  </div>
                                  <!-- 预览图片区域 -->
                                  <div class="img-container">
                                    <img id="pre_image">
                                  </div>
                                  <!-- 三个缩略图预区域 -->
                                  <div class="docs-preview clearfix">
                                    <div class="img-preview preview-lg"></div>
                                    <div class="img-preview preview-md"></div>
                                    <div class="img-preview preview-sm"></div>
                                  </div>
                                  <!-- 保存裁切参数的四个框 -->
                                  <input type="hidden" name="x">
                                  <input type="hidden" name="y">
                                  <input type="hidden" name="w">
                                  <input type="hidden" name="h">
                      </div>
                      <input type="submit" value="确认修改" class="layui-btn">
                    </form>
                  </div>
          {{--修改头像--}}
          
          <div class="layui-form layui-form-pane layui-tab-item">
              <div class="container">
                  @if($errors->any())
                      <ul class="error">
                          @foreach($errors->all() as $e)
                              <li>{{$e}}</li>
                          @endforeach
                      </ul>
                  @endif
              </div>
              {{--修改密码--}}
            <form action="{{ route('changepwd') }}" method="post">
                {{{ csrf_field() }}}
              <div class="layui-form-item">
                <label for="L_nowpass" class="layui-form-label">当前密码</label>
                <div class="layui-input-inline">
                  <input type="password" id="L_nowpass" name="oldpass" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">新密码</label>
                <div class="layui-input-inline">
                  <input type="password" id="L_pass" name="password" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">6到16个字符</div>
              </div>
              <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">确认密码</label>
                <div class="layui-input-inline">
                  <input type="password" id="L_repass" name="password_confirmation" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">

                <button class="layui-btn" key="set-mine" lay-filter="*" >确认修改</button>
              </div>
            </form>
              {{--修改密码--}}
          </div>
          
          <div class="layui-form layui-form-pane layui-tab-item">
            <ul class="app-bind">
              <li class="fly-msg app-havebind">
                <i class="iconfont icon-qq"></i>
                <span>已成功绑定，您可以使用QQ帐号直接登录Fly社区，当然，您也可以</span>
                <a href="javascript:;" class="acc-unbind" type="qq_id">解除绑定</a>
                
                <!-- <a href="" onclick="layer.msg('正在绑定微博QQ', {icon:16, shade: 0.1, time:0})" class="acc-bind" type="qq_id">立即绑定</a>
                <span>，即可使用QQ帐号登录Fly社区</span> -->
              </li>
              <li class="fly-msg">
                <i class="iconfont icon-weibo"></i>
                <!-- <span>已成功绑定，您可以使用微博直接登录Fly社区，当然，您也可以</span>
                <a href="javascript:;" class="acc-unbind" type="weibo_id">解除绑定</a> -->
                
                <a href="" class="acc-weibo" type="weibo_id"  onclick="layer.msg('正在绑定微博', {icon:16, shade: 0.1, time:0})" >立即绑定</a>
                <span>，即可使用微博帐号登录Fly社区</span>
              </li>
            </ul>
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
<script src="/js/jquery.min.js"></script>
<script src="/res/layui/layui.js"></script>
    <link rel="stylesheet" href="/css/cropper.min.css">
    <script src="/js/cropper.min.js"></script>
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
          version: "2.0.0"
          ,base: '../../res/mods/'
        }).extend({
          fly: 'index'
        }).use('fly');
</script>
    <script>

        var preImg = $("#pre_image");
        // 获取裁切时的四个框
        var x = $("input[name=x]");
        var y = $("input[name=y]");
        var w = $("input[name=w]");
        var h = $("input[name=h]");
        // 选择图片时预览图片 并 调用cropper插件
        $("input[name=face]").change(function(){
            // 先消毁，清除一下插件，否则连续调用插件时会失败
            preImg.cropper("destroy");
            // this.files[0]：获取当前图片并转成URL地址
            var url = getObjectUrl( this.files[0] );
            console.log( url )
            // 设置url到预览图片上
            preImg.attr('src', url);
            // 调出插件
            preImg.cropper({
                aspectRatio: 1,         // 裁切的框形状
                preview:'.img-preview',    // 显示预览的位置
                viewMode:3,                // 显示模式：图片不能无限缩小，但可以放大
                // 裁切时把参数保存到表单中
                crop: function(event) {
                    x.val( event.detail.x );
                    y.val( event.detail.y );
                    w.val( event.detail.width );
                    h.val( event.detail.height );
                }
            });
        });
        // 预览时需要使用下面这个函数转换一下
        function getObjectUrl(file) {
            var url = null;
            if (window.createObjectURL != undefined) {
                url = window.createObjectURL(file)
            } else if (window.URL != undefined) {
                url = window.URL.createObjectURL(file)
            } else if (window.webkitURL != undefined) {
                url = window.webkitURL.createObjectURL(file)
            }
            return url
        }

    </script>
</body>
</html>

@endsection