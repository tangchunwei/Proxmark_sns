
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>注册</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="fly,layui,前端社区">
  <meta name="description" content="Fly社区是模块化前端UI框架Layui的官网社区，致力于为web开发提供强劲动力">
  <link rel="stylesheet" href="../../res/layui/css/layui.css">
  <link rel="stylesheet" href="../../res/css/global.css">
</head>
<body>
<div class="container">
    @if($errors->any())
        <ul class="error">
            @foreach($errors->all() as $e)
                <li>{{$e}}</li>
            @endforeach
        </ul>
    @endif
</div>
<div class="fly-header layui-bg-black">
  <div class="layui-container">
    <a class="fly-logo" href="/">
      <img src="../../res/images/logo.png" alt="layui">
    </a>
    <ul class="layui-nav fly-nav layui-hide-xs">
      <li class="layui-nav-item layui-this">
        <a href="/"><i class="iconfont icon-jiaoliu"></i>交流</a>
      </li>
      <li class="layui-nav-item">
        <a href="../case/case.html"><i class="iconfont icon-iconmingxinganli"></i>案例</a>
      </li>
      <li class="layui-nav-item">
        <a href="http://www.layui.com/" target="_blank"><i class="iconfont icon-ui"></i>框架</a>
      </li>
    </ul>
    
    <ul class="layui-nav fly-nav-user">
      <!-- 未登入的状态 -->
      <li class="layui-nav-item">
        <a class="iconfont icon-touxiang layui-hide-xs" href="user/login.html"></a>
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
      <li class="layui-nav-item layui-hide-xs">
        <a href="/app/weibo/" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" title="微博登入" class="iconfont icon-weibo"></a>
      </li>
    </ul>
  </div>
</div>

<div class="layui-container fly-marginTop">
  <div class="fly-panel fly-panel-user" pad20>
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title">
        <li><a href="{{ route('login') }}">登入</a></li>
        <li class="layui-this">注册</li>
      </ul>
      <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
        <div class="layui-tab-item layui-show">
          <div class="layui-form layui-form-pane">
            <form action="{{ route('doregist') }}" method="post" >
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">手机</label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_phone" name="mobile" required="" lay-verify="phone" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_vercode" class="layui-form-label">验证码</label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_vercode" name="mobile_code" required="" lay-verify="required" placeholder="请输入手机验证码" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid" style="padding: 0!important;">
                        <input type="button" class="layui-btn layui-btn-normal" value="获取验证码"  id="btn-send">
                    </div>
                </div>
              <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">昵称</label>
                <div class="layui-input-inline">
                  <input type="text" id="L_username" name="username" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">你在社区的名字</div>
              </div>
              <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">密码</label>
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
                <div class="layui-form-item" style="position: relative; left: -10px; height: 32px;">
                    <input type="checkbox" name="protocol" lay-skin="primary" title="" checked="">
                    <div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary">
                        <i class="layui-icon layui-icon-ok "></i>
                    </div>
                    <a href="/instructions/terms.html" target="_blank" style="position: relative; top: 4px; left: 5px; color: #999;">同意用户服务条款</a>
                </div>
              <div class="layui-form-item">
                <button class="layui-btn" lay-filter="*" >立即注册</button>
              </div>
              <div class="layui-form-item fly-form-app">
                <span>或者直接使用社交账号快捷注册</span>
                <a href="" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-qq" title="QQ登入"></a>
                <a href="" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-weibo" title="微博登入"></a>
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

    var seconds=60;
    var si;  // 保存定时器

    $("#btn-send").click(function(){

        // 获取手机号码
        var mobile = $("input[name=mobile]").val();

        // 执行AJAX发到服务器
        $.ajax({
            type:"GET",     // GET方式
            url:"{{ route('ajax-send-modbile-code') }}",    // AJAX提交的地址
            data:{mobile:mobile},                           // 提交的参数（手机号码）
            success:function(data) {                        // AJAX成功之后执行的代码

                // 设置按钮失效
                $("#btn-send").attr('disabled',true);

                // 每1秒执行一次
                si = setInterval(function(){
                    seconds--;
                    if(seconds==0)
                    {
                        // 生效
                        $("#btn-send").attr('disabled',false);
                        seconds=60;
                        $("#btn-send").val("发送验证码");
                        // 关闭定时器
                        clearInterval( si );
                    }
                    else{
                        $("#btn-send").val("还剩："+(seconds)+"可以再次发送验证码");
                    }
                }, 1000);
            }
        });
    });
    </script>
</body>
</html>