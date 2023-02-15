<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="用户登录">
<meta name="description" content="用户登录">
<title>用户注册</title>
<link rel="stylesheet" type="text/css" href="../css/general.css">
<link rel="stylesheet" type="text/css" href="../css/login.css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/general.js"></script>
<script src="../js/jquery.validate.min.js"></script>
</head>
<body style="background: url(../images/banner1.jpg) no-repeat center center;background-size:cover;">
<div class="header" >
  <div class="w900 mt30 cut">
    <div class="logo" style="margin-left: 26%"><a href=""><img src="../static/images/logo.png" ></a></div>
  </div>
</div>

<div class="container w900 mt20">
  <div class="wbox cut">
    <div class="login-banner fl cut"></div>
    <form method="post" action="doregist.php" id="regform" enctype="multipart/form-data">
      <input type="password" value="" class="hide">
      <div class="login ml530">
        <div class="c666" style="margin-left: 35%">Register</div>
        <dl class="username mt20">
          <dt><span style="font-size:5px"></span><i class="icon"></i></dt>
          <dd><input name="username" id="username" type="text" placeholder="Username" required></dd>
        </dl>
        <dl class="pwd mt20">
          <dt><span style="font-size:5px"></span><i class="icon"></i></dt>
          <dd><input name="password" id="password" type="password" placeholder="Password" required></dd>
        </dl>
        <dl class="pwd mt20">
          <dt><span style="font-size:5px"></span><i class="icon"></i></dt>
          <dd><input name="email" id="email"  type="text" placeholder="Email" required></dd>
        </dl>
        
        <div class="ck module mt20 cut">
          <div class="fl"></div>
          <div class="fr"></div>
        </div>
        <input class="form-submit aln-c radius4 mt20"  type="submit"  style="margin-left:35%" value="注&nbsp;册">
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">
   $('#regform').submit(function(){
     var username=document.getElementById("username");
        var password=document.getElementById("password");
        var qrpassword=document.getElementById("qrpassword");
        var email=document.getElementById("email");

        if(username.value==""){
            alert("用户名不能为空");
            return false;
        }else if(username.value.lenth<2||username.value.lenth>8){
            alert("用户名长度不符合要求\n用户名长度为2-8个字符");
            return false;
        }else if(password.value != qrpassword.value){
            alert("密码与确认密码不同");
            return false;
        }else if(password.value.lenth<6||password.value.lenth>12){
            alert("密码长度不符合要求\n密码长度为6-12个字符");
            return false;
        }
        else if(email.value.indexOf(".")<0||email.value.indexOf("@")<0){
            alert("邮箱名错误")
            return false;
      }) 
  </script>
</body>
</html>
