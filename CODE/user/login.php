<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../css/general.css">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/general.js"></script>
</head>
<body style="background: url(../images/background.jpg) no-repeat center center;background-size:cover;">
<div class="header" >
  <div class="w900 mt30 cut">
    <div class="logo" style="margin-left: 23%"><a href="../index.php"><img src="../static/images/logo.png"  ></a></div>
  </div>
</div>
<div class="container w900 mt20" style="margin-right:500px;">
   <div class="wbox cut">
      <div class="login-banner fl cut"></div>
      <form method="post" action="dologin.php" id="login-form">
        <input type="password" value="" class="hide">
        <div class="login ml530">
          <div class="c666" style="margin-left: 35%">Login</div>
          <dl class="username mt20">
            <dt><span style="font-size:5px"></span><i class="icon"></i></dt>
            <dd><input name="username" id="username" type="text" placeholder="Username"></dd>
          </dl>
          <dl class="pwd mt20">
            <dt><span style="font-size:5px"></span><i class="icon"></i></dt>
            <dd><input name="password" id="password" type="password" placeholder="Password"></dd>
          </dl>
          <div class="ck module mt20 cut">
            <div class="fl"></div>
            <div class="fr"></div>
          </div>
          <input class="form-submit aln-c radius4 mt8" type="submit" style="margin-left:35%" value="Submit">
          <div class="c999 mt20"><a class="ml5" href="regist.php">Register</a> </div>

        </div>
      </form>
    </div>
  </div>
  </body>
</html>
