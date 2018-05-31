<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="applyFor" style="text-align: center; width: 500px; margin: 100px auto;">{{ $message }},将在<span class="loginTime" style="color: red">{{$jumpTime}}</span>秒后跳转至<a href="{{$url}}" style="color: red">{{ $name }}</a>页面</div>
</body>
</html>
<script src="/js/jquery.min.js"></script>
<script type="text/javascript">
        $(function(){
            var url = "{{$url}}"
            var loginTime = parseInt($('.loginTime').text());
            var time = setInterval(function(){
                loginTime = loginTime-1;
                $('.loginTime').text(loginTime);
                if(loginTime==0){
                    clearInterval(time);
                    window.location.href=url;
                }
            },1000);
        })
    </script>